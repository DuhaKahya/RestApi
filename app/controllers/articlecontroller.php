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

        if (!$articles) {
            $this->respondWithError(404, "Articles not found");
            return;
        }

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
            $this->checkForJwt();

            $article = $this->createObjectFromPostedJson("Models\\Article");

            if (!$article) {
                $this->respondWithError(400, "Invalid article data");
                return;
            }

            $article = $this->articleService->insert($article);

            $this->respond([
                'message' => 'Article created successfully',
                'article' => $article
            ]);

        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }

    public function update($id)
    {
        try {
            $this->checkForJwt();

            $article = $this->createObjectFromPostedJson("Models\\Article");

            if (!$article) {
                $this->respondWithError(400, "Invalid article data");
                return;
            }

            $updatedArticle = $this->articleService->update($article, $id);

            $this->respond([
                'message' => 'Article updated successfully',
                'article' => $updatedArticle
            ]);

        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $this->checkForJwt();

            $success = $this->articleService->delete($id);

            $this->respond(["message" => "Article deleted successfully"]);

        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }

    public function insert()
    {
        try {
            $this->checkForJwt();

            $shoppingCart = $this->createObjectFromPostedJson("Models\\ShoppingCart");

            if (!$shoppingCart) {
                $this->respondWithError(400, "Invalid shopping cart data");
                return;
            }

            $this->shoppingcartService->insert($shoppingCart);

            $this->respond($shoppingCart);

        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }
}
?>
