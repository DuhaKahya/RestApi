<?php

namespace Controllers;

use Exception;
use Services\ArticleService;

class ArticleController extends Controller
{
    private $service;

    function __construct()
    {
        $this->service = new ArticleService();
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

        $articles = $this->service->getAll($offset, $limit);

        $this->respond($articles);
    }

    public function getOne($id)
    {
        $article = $this->service->getOne($id);

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
            $article = $this->service->insert($article);
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
            $article = $this->service->update($article, $id);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
            return;
        }

        $this->respond($article);
    }

    public function delete($id)
    {
        try {
            $this->service->delete($id);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
            return;
        }

        $this->respond(true);
    }
}
