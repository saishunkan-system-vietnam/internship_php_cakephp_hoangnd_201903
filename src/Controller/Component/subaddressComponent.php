<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class subaddressComponent extends Component {

    private $Subaddress;

    public function initialize(array $config) {
        parent::initialize($config);
        $this->Subaddress = TableRegistry::getTableLocator()->get('Subaddress');
    }

    public function get($id) {
        return $this->Subaddress->get($id);
    }

    public function add($req) {
        $default_address = (isset($req['default_address'])) ? $req['default_address'] : 0;
        $newSubAddress = $this->Subaddress->newEntity();
        $newSubAddress->address = $req['address'];
        $newSubAddress->users_id = $req['users_id'];
        $newSubAddress->default_address = $default_address;
        return $this->Subaddress->save($newSubAddress);
    }

//    public function update($req) {
//      
//    }

    public function delete($id) {
        $SubAddress = $this->Subaddress->get($id);
        return $this->Subaddress->delete($SubAddress);
    }

    public function where($req = null) {
        $lstUser = $this->Subaddress->find()->toArray();
        if (count($lstUser) && !empty($req)) {
            if (isset($req['id'])) {
                foreach ($lstUser as $key => $value) {
                    if ($value['id'] != $req['id']) {
                        unset($lstUser[$key]);
                    }
                }
            }
            if (isset($req['default'])) {
                foreach ($lstUser as $key => $value) {
                    if ($value['default_address'] != $req['default']) {
                        unset($lstUser[$key]);
                    }
                }
            }
            if (isset($req['users_id'])) {
                foreach ($lstUser as $key => $value) {
                    if ($value['users_id'] != $req['users_id']) {
                        unset($lstUser[$key]);
                    }
                }
            }
            if (isset($req['address'])) {
                foreach ($lstUser as $key => $value) {
                    if ($value['address'] != $req['address']) {
                        unset($lstUser[$key]);
                    }
                }
            }
            return $lstUser;
        }
    }

}
