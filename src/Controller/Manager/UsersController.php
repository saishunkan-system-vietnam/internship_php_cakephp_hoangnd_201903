<?php

namespace App\Controller\Manager;

use App\Controller\Manager\ManagersController;

class UsersController extends ManagersController {

    public function initialize() {
        parent::initialize();       
    }

    public function index() {
      
    }  

    public function logout() {
        $this->autoRender = FALSE;
        $this->session->destroy('usernameId');
        $this->session->destroy('username');
        $this->session->destroy('roles');
        $this->redirect('/home/login');
    }
    
}
