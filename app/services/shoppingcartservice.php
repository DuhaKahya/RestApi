<?php

namespace Services;

use Repositories\ShoppingCartRepository;
use Repositories\ArticleRepository;

class ShoppingCartService {

    private $shoppingCartRepository;
    private $articleRepository;

    public function __construct() {
        $this->shoppingCartRepository = new ShoppingCartRepository();
        $this->articleRepository = new ArticleRepository(); 
    }

    public function getAll() {
        return $this->shoppingCartRepository->getAll();
    }

    public function insert($shoppingCart) {
        return $this->shoppingCartRepository->insert($shoppingCart);
    }

    public function delete($id) {
        return $this->shoppingCartRepository->delete($id);
    }

    public function getOne($id) {
        return $this->shoppingCartRepository->getOne($id);
    }

    public function updateStatus($id, $status) {
        $this->shoppingCartRepository->updateStatus($id, $status);
    }

    public function updateStock($articleId, $quantity) {
        $this->shoppingCartRepository->updateStock($articleId, $quantity);
    }

    public function getCartOfUser($userId) {
        return $this->shoppingCartRepository->getCartOfUser($userId);
    }


}

   
?>
