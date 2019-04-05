<?php

namespace App\Controller\Manager;

use App\Controller\Manager\ManagersController;

class OrdersController extends ManagersController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('orders');
        $this->loadComponent('orderdetails');
    }

    public function index() {
        $lstOrders = $this->orders->selectAll();
        $this->set('lstOrders', $lstOrders);
    }

    public function view($id = null) {
        $lstOrders = $this->orders->selectAll(['id' => $id]);
        $lstOrderDetails = $this->orderdetails->selectAll(['orders_id' => $id]);
        $this->set('lstOrderDetails', $lstOrderDetails);
        $this->set('lstOrders', $lstOrders);
        if ($this->request->is('post')) {
            $req = $this->request->getData();
            $result = $this->orders->update(['note' => $req['note'], 'status' => $req['status'], 'id' => $id]);
            if ($result != FALSE) {
                return $this->redirect(['action' => 'index']);
            }
        }
    }

}
