<?php

namespace App\Controller\Manager;

use App\Controller\Manager\ManagersController;

class SpecificationsController extends ManagersController {

    public function initialize() {
        parent::initialize();
    }

    public function index() {
        $lstProduct = $this->products->selectAll();
        $this->set('lstProduct', $lstProduct);
    }

   

}
