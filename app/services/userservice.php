<?php
namespace Services;

use Repositories\UserRepository;

class UserService {

    private $userService;

    function __construct()
    {
        $this->userService = new UserRepository();
    }

    public function checkUsernamePassword($username, $password) {
        return $this->userService->checkUsernamePassword($username, $password);
    }

    public function getAll() {
        return $this->userService->getAll();
    }

    public function insert($user) {
        $this->userService->insert($user);
    }


    public function authenticateUser($username, $password) {
        $authenticatedUser = $this->userService->getUserByUsernameAndPassword($username, $password);
        return $authenticatedUser;
    }
}

?>