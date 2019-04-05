<?php

namespace App\Controller\Home;

use App\Controller\Home\LogedController;

class UsersController extends LogedController {

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
