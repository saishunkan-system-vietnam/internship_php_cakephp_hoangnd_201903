<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class productgroupsComponent extends Component {

    private $Groups;
    private $ProductGroups;

    public function initialize(array $config) {
        parent::initialize($config);
        $this->Groups = TableRegistry::getTableLocator()->get('Groups');
        $this->ProductGroups = TableRegistry::getTableLocator()->get('ProductGroups');
    }

    public function getAllGroups() {
        return $this->Groups->find()->toArray();
    }

    public function getGroups($id) {
        return $this->Groups->get($id);
    }

    public function addGroups(array $reqGroup) {
        $newGroup = $this->Groups->newEntity();
        $newGroup->name = $reqGroup['name'];
        return $this->Groups->save($newGroup);
    }

    public function updateGroups(array $reqGroup) {
        $group = $this->Groups->get($reqGroup['id']);
        $group->name = $reqGroup['name'];
        return $this->Groups->save($group);
    }

    public function deleteGroups($id) {  
        try {  
            $group = $this->Groups->get($id);            
            if($this->Groups->delete($group)){
                print_r("a");die;
            }else{
                die('b');
            }
            
            return $result;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function selectProductGroups($req) {
        $lstProductGroups = $this->ProductGroups->find()->toArray();
        if (!empty($req)) {
            if (isset($req['groups_id'])) {
                foreach ($lstProductGroups as $key => $value) {
                    if ($value['groups_id'] != $req['groups_id']) {
                        unset($lstProductGroups[$key]);
                    }
                }
            }
            if (isset($req['products_id'])) {
                foreach ($lstProductGroups as $key => $value) {
                    if ($value['products_id'] != $req['products_id']) {
                        unset($lstProductGroups[$key]);
                    }
                }
            }
        }
        return $lstProductGroups;
    }

    public function addProductGroups($req) {
        $newProductGroups = $this->ProductGroups->newEntity();
        $newProductGroups->products_id = $req['products_id'];
        $newProductGroups->groups_id = $req['groups_id'];
        return $this->ProductGroups->save($newProductGroups);
    }

    public function updateProductGroups($req) {
        $productGroups = $this->ProductGroups->get($req['id']);
        $products_id = (isset($req['products_id'])) ? $req['products_id'] : $productGroups['products_id'];
        $groups_id = (isset($req['groups_id'])) ? $req['groups_id'] : $productGroups['groups_id'];
        $productGroups->products_id = $products_id;
        $productGroups->groups_id = $groups_id;
        return $this->ProductGroups->save($productGroups);
    }

    public function deleteProductGroups($id) {
        $productGroups = $this->ProductGroups->get($id);
        return $this->ProductGroups->delete($productGroups);
    }

    public function firstProductGroups($req = null) {
            $productGroup = $this->ProductGroups->find()->where([
                        'groups_id' => $req['groups_id'],
                        'and' => ['products_id' => $req['products_id']]
                    ])->first();
            return $productGroup;
    }

    public function where($req = NULL) {
        $lstProductGroup = $this->ProductGroups->find()->toArray();
        if (!empty($req)) {
            if (count($productGroup) > 0) {
                if (isset($req['products_id'])) {
                    foreach ($lstProductGroup as $key => $value) {
                        if ($value['products_id'] != $req['products_id']) {
                            unset($lstProductGroup[$key]);
                        }
                    }
                }
                if (isset($req['groups_id'])) {
                    foreach ($lstProductGroup as $key => $value) {
                        if ($value['groups_id'] != $req['groups_id']) {
                            unset($lstProductGroup[$key]);
                        }
                    }
                }
            }
        }
        return $lstProductGroup;
    }

}
