<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class orderdetailsComponent extends Component {

    private $OrderDetail;

    public function initialize(array $config) {
        parent::initialize($config);
        $this->OrderDetail = TableRegistry::getTableLocator()->get('OrderDetails');
    }

    public function get($id) {
        return $this->OrderDetail->get($id);
    }

    public function add($req) {
        $newOrderDetail = $this->OrderDetail->newEntity();
        $newOrderDetail->orders_id = $req['orders_id'];
        $newOrderDetail->products_id = $req['products_id'];
        $newOrderDetail->quantity = $req['quantity'];
        return $this->OrderDetail->save($newOrderDetail);
    }

    public function update($req) {
        $orderDetail = $this->OrderDetail->get($req['id']);
        $orderDetail->orders_id = $req['orders_id'];
        $orderDetail->products_id = $req['products_id'];
        $orderDetail->quantity = $req['quantity'];
        return $this->OrderDetail->save($orderDetail);
    }

    public function delete($id) {
        $orderDetail = $this->OrderDetail->get($id);
        return $this->OrderDetail->delete($orderDetail);
    }
    
    public function where($req=null){
        $lstOrderDetail=  $this->OrderDetail->find()->toArray();
        
        return $lstOrderDetail;
    }

}
