<?php

namespace App\Controller;

use App\Controller\AppController;

class HomesController extends LoggedController
{
    //public $components=array('test');

    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('homeLayout');
    }

    public function index()
    {

    }

    public function logout()
    {
        $this->autoRender=false;
        $this->session->destroy('username');
        $this->session->destroy('roles');
        $this->redirect('/login');
    }


}
