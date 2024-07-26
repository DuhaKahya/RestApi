<?php

namespace Controllers;

use Exception;
use Services\CategoryService;

class CategoryController extends Controller
{
    private $service;

    // initialize services
    function __construct()
    {
        $this->service = new CategoryService();
    }

    public function getAll()
    {
        $categories = $this->service->getAll();

        $this->respond($categories);
    }

    public function getOne($id)
    {
        $this->checkForJwt();

        $category = $this->service->getOne($id);

        if (!$category) {
            $this->respondWithError(404, "Category not found");
            return;
        }

        $this->respond($category);
    }

    public function create()
    {
        try {
            $this->checkForJwt();

            $category = $this->createObjectFromPostedJson("Models\\Category");
            $this->service->insert($category);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($category);
    }

    public function update($id)
    {
        try {
            $this->checkForJwt();

            $category = $this->createObjectFromPostedJson("Models\\Category");
            $this->service->update($category, $id);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($category);
    }

    public function delete($id)
    {
        try {
            $this->checkForJwt();

            $this->service->delete($id);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond(true);
    }
}
