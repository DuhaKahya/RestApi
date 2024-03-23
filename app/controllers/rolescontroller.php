<?php

namespace Controllers;

use Exception;
use Services\RolesService;

class RolesController extends Controller
{
    private $service;

    // initialize services
    function __construct()
    {
        $this->service = new RolesService();
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

        $roles = $this->service->getAll($offset, $limit);

        $this->respond($roles);
    }

    public function getOne($id)
    {
        $role = $this->service->getOne($id);

        if (!$role) {
            $this->respondWithError(404, "Role not found");
            return;
        }

        $this->respond($role);
    }

    public function create()
    {
        try {
            $role = $this->createObjectFromPostedJson("Models\\Role");
            $this->service->insert($role);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($role);
    }

    public function update($id)
    {
        try {
            $role = $this->createObjectFromPostedJson("Models\\Role");
            $this->service->update($role, $id);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($role);
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

?>
