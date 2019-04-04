<?php

namespace App\Controller\Manager;

use App\Controller\Manager\ManagersController;

class HomesController extends ManagersController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('orders');
    }

    public function index() {
        $lstOrders = $this->orders->selectAll(['status' => 0]);   
        $this->set('lstOrders',$lstOrders);
    }


}
