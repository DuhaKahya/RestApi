<?php

namespace Services;

use Repositories\ContactRepository;

class ContactService {

    private $contactRepository;

    public function __construct() {
        $this->contactRepository = new ContactRepository();
    }

    public function create($contact) {
        return $this->contactRepository->create($contact);
    }

}