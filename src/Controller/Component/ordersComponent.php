<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class ordersComponent extends Component {

    private $Orders;

    public function initialize(array $config) {
        parent::initialize($config);
        $this->Orders = TableRegistry::getTableLocator()->get('Orders');
    }

    public function add($req){
        $newOrder=  $this->Orders->newEntity();
        $newOrder->date_time=$req['date_time'];
        $newOrder->note=$req['note'];
        $newOrder->status=$req['status'];
        $newOrder->users_id=$req['users_id'];
        return  $this->Orders->save($newOrder);       
    }
     public function update($req){
        $Order=  $this->Orders->get($req['id']);
        $Order->date_time=$req['date_time'];
        $Order->note=$req['note'];
        $Order->status=$req['status'];
        $Order->users_id=$req['users_id'];
        return  $this->Orders->save($Order);       
    }
    public function delete($id){
        $Order=  $this->Orders->get($id); 
        return  $this->Orders->delete($Order);     
    }
    public function where($req=null){
        $lstOrders=  $this->Orders->find();
        return $lstOrders;
    }

}
