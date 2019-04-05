<?php

namespace App\Controller\Manager;

use App\Controller\Manager\ManagersController;

class HomesController extends ManagersController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('orders');      
        $this->loadComponent('orderdetails');
    }

    public function index() {
        $lstOrders = $this->orders->selectAll(['status' => 0]);
        $this->set('lstOrders', $lstOrders);
    }

    public function view($id = null) {
        $lstOrders = $this->orders->selectAll(['id' => $id, 'status' => 0]);
        $lstOrderDetails = $this->orderdetails->selectAll(['orders_id' => $id]);
        $this->set('lstOrderDetails', $lstOrderDetails);
        $this->set('lstOrders', $lstOrders);
           if($this ->request->is('post')){
            $req=  $this->request->getData();
            var_dump($req);
            if(isset($req['btnHuy'])){
                $result=  $this->orders->update(['note'=>$req['note'],'status'=>3,'id'=>$id]);
                if($result!=FALSE){
                    return $this->redirect(['action'=>'index']);
                }
            }
            if(isset($req['btnXacNhan'])){
                 $result=  $this->orders->update(['note'=>$req['note'],'status'=>1,'id'=>$id]);
                if($result!=FALSE){
                    return $this->redirect(['action'=>'index']);
                }
            }
        }
    }  
}
