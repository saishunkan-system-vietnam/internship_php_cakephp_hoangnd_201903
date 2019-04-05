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
        $customerNote=(isset($req['customer_note']))?$req['customer_note']:'';
        $note=(isset($req['note']))?$req['note']:'';
        $newOrder->date_time = $req['date_time'];
        $newOrder->note =$note ;
        $newOrder->customer_note = $customerNote;
        $newOrder->status = $req['status'];
        $newOrder->subaddress_id = $req['subaddress_id'];
        return $this->Orders->save($newOrder);
    }

    public function update($req) {
        $Order = $this->Orders->get($req['id']);
        $note = (isset($req['note'])) ? $req['note'] : $Order['note'];
        $status=(isset($req['status'])) ? $req['status'] : $Order['status'];
        $date=(isset($req['date_time'])) ? $req['date_time'] : $Order['date_time'];
        $subaddress=(isset($req['subaddress_id'])) ? $req['subaddress_id'] : $Order['subaddress_id'];
        
        
        $Order->date_time = $date;
        $Order->note = $note;
        $Order->status = $status;
        $Order->subaddress_id =$subaddress;
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
                            'Subaddress' => [
                                'table' => 'subaddress',
                                'type' => 'INNER',
                                'conditions' => 'Subaddress.id=Orders.subaddress_id'
                            ]
                        ])->join([
                    'Users' => [
                        'table' => 'users',
                        'type' => 'INNER',
                        'conditions' => 'Users.id=Subaddress.users_id'
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
