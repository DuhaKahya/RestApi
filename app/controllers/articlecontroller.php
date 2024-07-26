<?php

namespace Controllers;

use Exception;
use Services\ArticleService;
use Services\ShoppingCartService;

class ArticleController extends Controller
{
    private $articleService;
    private $shoppingcartService;

    function __construct()
    {
        $this->articleService = new ArticleService();
        $this->shoppingcartService = new ShoppingCartService();
    }

    public function getAll()
    {

        $articles = $this->articleService->getAll();

        $this->respond($articles);
    }

    public function getOne($id)
    {
        $this->checkForJwt();

        $article = $this->articleService->getOne($id);

        if (!$article) {
            $this->respondWithError(404, "Article not found");
            return;
        }

        $this->respond($article);
    }

    public function create()
    {
        try {
            $this->checkForJwt();

            $article = $this->createObjectFromPostedJson("Models\\Article");
            $article = $this->articleService->insert($article);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
            return;
        }

        $this->respond($article);
    }

    public function update($id)
    {
        try {
            $this->checkForJwt();

            $article = $this->createObjectFromPostedJson("Models\\Article");
            $article = $this->articleService->update($article, $id);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
            return;
        }

        $this->respond($article);
    }

    public function delete($id)
    {
        try {
            $this->checkForJwt();

            $this->articleService->delete($id);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
            return;
        }

        $this->respond(true);
    }

    public function insert()
    {
        try {
            $this->checkForJwt();

            $shoppingCart = $this->createObjectFromPostedJson("Models\\ShoppingCart");
            $this->shoppingcartService->insert($shoppingCart);
            
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
            return;
        }

        $this->respond($shoppingCart);
    }

    
}
