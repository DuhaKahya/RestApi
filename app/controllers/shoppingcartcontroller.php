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

    public function create()
    {
        try {

            $articleId = $_POST['articleId'];
            $quantity = $_POST['quantity'];

            // Voeg het artikel toe aan het winkelwagentje met behulp van de ShoppingCartService
            $this->service->addToCart($articleId, $quantity);

            $shoppingCart = $this->createObjectFromPostedJson("Models\\ShoppingCart");
            $this->service->insert($shoppingCart);

        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($shoppingCartItem);
    }

    public function update($id)
    {
        try {
            $shoppingCartItem = $this->createObjectFromPostedJson("Models\\ShoppingCart");
            $this->service->update($shoppingCartItem, $id);
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
