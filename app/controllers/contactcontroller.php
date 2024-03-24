<?php

namespace Controllers;

use Exception;
use Services\ContactService;

class ContactController extends Controller
{
    private $service;

    function __construct()
    {
        $this->service = new ContactService();
    }

    public function create()
    {
        try {
            $contact = $this->createObjectFromPostedJson("Models\\Contact");
            $contact = $this->service->create($contact);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
            return;
        }

        $this->respond($contact);
    }


}
