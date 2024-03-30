<?php

namespace Controllers;

use Exception;
use Services\ShoppingCartService;

class ShoppingCartController extends Controller
{
    private $service;

    // initialize services
    function __construct()
    {
        $this->service = new ShoppingCartService();
    }

    public function getAll()
    {
        $offset = NULL;
        $limit = NULL;

        if (isset($_GET["offset"]) && is_numeric($_GET["offset"])) {
            $offset = $_GET["offset"];
        }
        if (isset($_GET["limit"]) && is_numeric($_GET["limit"])) {
            $limit = $_GET["limit"];
        }

        $shoppingCartItems = $this->service->getAll($offset, $limit);

        $this->respond($shoppingCartItems);
    }

    public function getOne($id)
    {
        $shoppingCartItem = $this->service->getOne($id);

        if (!$shoppingCartItem) {
            $this->respondWithError(404, "Shopping cart item not found");
            return;
        }

        $this->respond($shoppingCartItem);
    }

    public function update($id)
    {
        try {
            $status = 'paid';
            $this->service->updateStatus($id, $status);

            // Update stock in articles table
            $item = $this->service->getOne($id);

            $this->service->updateStock($item->articleid, $item->quantity);

            

        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }
        
        $this->respond(true);
    }

    

    public function create()
    {
        try {
            $shoppingCartItem = $this->createObjectFromPostedJson("Models\\ShoppingCart");
            $this->service->create($shoppingCartItem);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($shoppingCartItem);
    }

    public function delete($id)
    {
        try {
            $this->service->delete($id);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond(true);
    }
}
