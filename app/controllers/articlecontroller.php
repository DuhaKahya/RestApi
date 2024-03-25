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
        $offset = NULL;
        $limit = NULL;

        if (isset($_GET["offset"]) && is_numeric($_GET["offset"])) {
            $offset = $_GET["offset"];
        }
        if (isset($_GET["limit"]) && is_numeric($_GET["limit"])) {
            $limit = $_GET["limit"];
        }

        $articles = $this->articleService->getAll($offset, $limit);

        $this->respond($articles);
    }

    public function getOne($id)
    {
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
            $shoppingCart = $this->createObjectFromPostedJson("Models\\ShoppingCart");
            $this->shoppingcartService->insert($shoppingCart);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
            return;
        }

        $this->respond($shoppingCart);
    }
    
}
