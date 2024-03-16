<?php

use Repositories\ContactPageRepository;

class ContactPageService {

    private $contactPageRepository;

    public function __construct() {
        $this->contactPageRepository = new ContactPageRepository();
    }

    public function getAll() {
        return $this->contactPageRepository->getAll();
    }

    public function insert($contactPage) {
        $this->contactPageRepository->insert($contactPage);
    }

}