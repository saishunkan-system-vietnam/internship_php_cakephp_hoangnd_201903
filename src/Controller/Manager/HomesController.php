<?php

namespace App\Controller\Manager;

use App\Controller\Manager\ManagersController;

class HomesController extends ManagersController {

    public function index() {
        
    }

    public function add() {
        $this->autoRender=FALSE;
        echo 'add phone';
    }

}
