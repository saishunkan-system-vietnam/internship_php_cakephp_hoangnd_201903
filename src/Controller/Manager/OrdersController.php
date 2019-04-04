<?php

namespace App\Controller\Manager;

use App\Controller\Manager\ManagersController;

class OrdersController extends ManagersController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('orders');
        $this->loadComponent('orderdetails');
    }

//    public function index() {
//        $lstOrders = $this->orders->selectAll(['status' => 0]);   
//        $this->set('lstOrders',$lstOrders);
//    }

    public function view($id = null) {
        $lstOrders = $this->orders->selectAll(['id' => $id, 'status' => 0]);
        $lstOrderDetails = $this->orderdetails->selectAll(['orders_id' => $id]);
        $this->set('lstOrderDetails', $lstOrderDetails );
        $this->set('lstOrders', $lstOrders);
    }

}
