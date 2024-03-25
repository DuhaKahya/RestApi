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
        $this->shoppingCartRepository->insert($shoppingCart);
    }

    public function getArticleById($id) {
        return $this->articleRepository->getArticleById($id);
    }

    public function delete($id) {
        $this->shoppingCartRepository->delete($id);
    }
    
    public function getShoppingCartById($id) {
        return $this->shoppingCartRepository->getShoppingCartById($id);
    }

    public function updateStatus($id, $status) {
        $this->shoppingCartRepository->updateStatus($id, $status);
    }

    public function updateStock($id) {

        $shoppingCart = $this->shoppingCartRepository->getShoppingCartById($id);

         if ($shoppingCart->getStatus() == 'unpaid') {
        $article = $this->articleRepository->getArticleById($shoppingCart->getArticleid());
        $newStock = $article->getStock() - $shoppingCart->getQuantity();
        $article->setStock(max(0, $newStock)); // Ensure stock doesn't go negative

        // Assuming you have an updateStock method in your article repository
        $this->articleRepository->updateStock($article);
    }
        
    }

   

   
}
