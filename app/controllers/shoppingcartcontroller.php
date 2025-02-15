<?php

namespace Controllers;

use Exception;
use Services\ShoppingCartService;
use Services\OrderService;

class ShoppingCartController extends Controller
{
    private $shoppingCartService;
    private $orderService;

    // initialize services
    function __construct()
    {
        $this->shoppingCartService = new ShoppingCartService();
        $this->orderService = new OrderService();
    }

    public function getAllCartItems()
    {

        $this->checkForJwt();

        $shoppingCartItems = $this->shoppingCartService->getAll();

        if (!$shoppingCartItems) {
            $shoppingCartItems = [];
        }

        $this->respond($shoppingCartItems);
    }

    public function getCartOfUser($id)
    {
        $this->checkForJwt();

        $shoppingCartItems = $this->shoppingCartService->getCartOfUser($id);

        if (!$shoppingCartItems) {
            $shoppingCartItems = [];
        }

        $this->respond($shoppingCartItems);
    }


    public function getOne($id)
    {
        $this->checkForJwt();

        $shoppingCartItem = $this->shoppingCartService->getOne($id);

        if (!$shoppingCartItem) {
            $this->respondWithError(404, "Shopping cart item not found");
            return;
        }

        $this->respond($shoppingCartItem);
    }

    public function update($id)
    {
        try {
            $this->checkForJwt();

            $status = 'paid';
            $this->shoppingCartService->updateStatus($id, $status);

            // Update stock in articles table
            $item = $this->shoppingCartService->getOne($id);

            $this->shoppingCartService->updateStock($item->articleid, $item->quantity);

            // Create order
            $order = $this->createObjectFromPostedJson("Models\\Orders");
            $order->shoppingcartid = $id;
            $this->orderService->insert($order);
            

        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }
        
        $this->respond(true);
    }

    

    public function create()
    {
        try {
            $this->checkForJwt();
            $shoppingCartItem = $this->createObjectFromPostedJson("Models\\ShoppingCart");
            $this->shoppingCartService->create($shoppingCartItem);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($shoppingCartItem);
    }

    public function delete($id)
    {
        try {
            $this->checkForJwt();
            $this->shoppingCartService->delete($id);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond(true);
    }
}
