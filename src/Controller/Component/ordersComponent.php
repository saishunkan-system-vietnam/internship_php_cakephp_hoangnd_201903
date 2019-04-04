<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class ordersComponent extends Component {

    private $Orders;
    private $Users;
    private $Subaddress;

    public function initialize(array $config) {
        parent::initialize($config);
        $this->Orders = TableRegistry::getTableLocator()->get('Orders');
        $this->Users = TableRegistry::getTableLocator()->get('Users');
        $this->Subaddress = TableRegistry::getTableLocator()->get('Subaddress');
    }

    public function get($id) {
        return $this->Orders->get($id);
    }

    public function add($req) {
        $newOrder = $this->Orders->newEntity();
        $newOrder->date_time = $req['date_time'];
        $newOrder->note = $req['note'];
        $newOrder->status = $req['status'];
        $newOrder->subaddress_id = $req['subaddress_id'];
        return $this->Orders->save($newOrder);
    }

    public function update($req) {
        $Order = $this->Orders->get($req['id']);
        $Order->date_time = $req['date_time'];
        $Order->note = $req['note'];
        $Order->status = $req['status'];
        $Order->subaddress_id = $req['subaddress_id'];
        return $this->Orders->save($Order);
    }

    public function delete($id) {
        $Order = $this->Orders->get($id);
        return $this->Orders->delete($Order);
    }

    public function where($req = null) {
        $lstOrders = $this->Orders->find()->toArray();
        if ($req != null && count($lstOrders) > 0) {
            if (isset($req['status'])) {
                foreach ($lstOrders as $key => $value) {
                    if ($value['status'] != $req['status']) {
                        unset($lstOrders[$key]);
                    }
                }
            }
        }
        return $lstOrders;
    }

    public function max($req = null) {
        $lstOrders = $this->Orders->find()->where(['subaddress_id' => $req['subaddress_id']])->max('id')->toArray();
        return $lstOrders;
    }

    public function selectAll($req = null) {
        $lstOrders = $this->Orders->find()
                ->select($this->Orders)
                ->select($this->Subaddress)
                ->select($this->Users)
                ->join([
                    'Subaddress'=>[
                        'table'=>'subaddress',
                        'type'=>'INNER',
                        'conditions'=>'Subaddress.id=Orders.subaddress_id'
                    ]
                    
                ])->join([
                    'Users'=>[
                        'table'=>'users',
                        'type'=>'INNER',
                        'conditions'=>'Users.id=Subaddress.users_id'
                    ]
                ])->toArray();
        
        if ($req != null && count($lstOrders) > 0) {
            if (isset($req['status'])) {
                foreach ($lstOrders as $key => $value) {
                    if ($value['status'] != $req['status']) {
                        unset($lstOrders[$key]);
                    }
                }
            }
            if (isset($req['id'])) {
                foreach ($lstOrders as $key => $value) {
                    if ($value['id'] != $req['id']) {
                        unset($lstOrders[$key]);
                    }
                }
            }
        }
         
        return $lstOrders;
    }

}
