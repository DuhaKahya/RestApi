<?php

use Repositories\ShoppingCartRepository;
use Repositories\OrderRepository;

class OrderService{

    private $orderRepository;
    private $shoppingCartRepository;

    public function __construct() {
        $this->orderRepository = new OrderRepository();
        $this->shoppingCartRepository = new ShoppingCartRepository();
    }

    public function getAll() {
        return $this->orderRepository->getAll();
    }

    public function insert($orders) {
        $this->orderRepository->insert($orders);
    }

    public function getShoppingCartById($id) {
        return $this->shoppingCartRepository->getShoppingCartById($id);
    }
    
}