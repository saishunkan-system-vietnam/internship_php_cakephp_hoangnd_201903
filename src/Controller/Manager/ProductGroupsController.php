<?php

namespace App\Controller\Manager;

use App\Controller\Manager\ManagersController;

class ProductGroupsController extends ManagersController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('productgroups');
        $this->loadComponent('categories');
        $this->loadComponent('products');
        $this->loadComponent('validation');
        $this->loadModel('Groups');
    }

    public function index() {
        if ($this->request->isPost()) {
            $reqGroup = $this->request->getData();
            $validation = $this->Groups->newEntity($reqGroup);
            $validationError = $validation->errors();
            if (empty($validationError)) {
                $result = $this->productgroups->addGroups($reqGroup);
                $message = ($result == true) ? 'Add successful!' : 'Add fail';
                $this->set('message', $message);
            } else {
                $error = $this->validation->getmessage($validationError);
                $this->set('error', $error);
            }
        }
        $lstGroups = $this->productgroups->getAllGroups();
        $this->set('lstGroups', $lstGroups);
    }

    public function edit($id) {
        $group = $this->productgroups->getGroups($id);
        $this->set('group', $group);
        if ($this->request->isPost()) {
            $reqGroup = $this->request->getData();
            if ($reqGroup['name'] !== $group['name']) {
                $reqGroup['id'] = $id;
                $validation = $this->Groups->newEntity($reqGroup);
                $validationError = $validation->errors();
                if (empty($validationError)) {
                    $result = $this->productgroups->updateGroups($reqGroup);
                    if ($result == TRUE) {
                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->set('error', 'Apply fail');
                    }
                } else {
                    $error = $this->validation->getmessage($validationError);
                    $this->set('error', $error);
                }
            } else {
                return $this->redirect(['action' => 'index']);
            }           
        }
    }

    public function delete($id) {
        $group = $this->productgroups->getGroups($id);
        $this->set('group', $group);
        if ($this->request->isPost()) {
            $result = $this->productgroups->deleteGroups($id);
            if ($result == true) {
                return $this->redirect(['action' => 'index']);
            } else {
                $this->set('error', 'Delete fail');
            }
        }
    }

    public function group($id = NULL) {

        if ($this->request->is('post')) {           
            $req = $this->request->getData();
            if (isset($req['selectProducts'])) {               
                $lstSelectProducts = $req['selectProducts'];
                
                if (isset($req['add'])) {
                    foreach ($lstSelectProducts as $value) {
                        if (empty($this->productgroups->firstProductGroups(['products_id' => $value, 'groups_id' => $id]))) {
                            $this->productgroups->addProductGroups(['products_id' => $value, 'groups_id' => $id]);
                        }
                    }
                }
                if (isset($req['remove']) && count($req['selectProducts']) > 0) {
                    foreach ($lstSelectProducts as $value) {
                        $productGroups = $this->productgroups->firstProductGroups(['products_id' => $value, 'groups_id' => $id]);
                        if(!empty($productGroups)){
                            $this->productgroups->deleteProductGroups($productGroups['id']);
                        }
                    }
                }
            }             
        }

        $group = $this->productgroups->getGroups($id);
        $this->set('group', $group);

        $option = $this->categories->getSelectOption();
        $this->set('option', $option);
        $lstGroups = $this->productgroups->getAllGroups();
        $optionGroup = [];
        foreach ($lstGroups as $value) {
            $optionGroup = array_merge($optionGroup, [$value['id'] => $value['name']]);
        }
        $lstProduct = $this->products->selectAll();
        $arrGroup = [];
        foreach ($lstProduct as $key => $value) {
            $productGroup = $this->productgroups->selectProductGroups(['groups_id' => $id, 'products_id' => $value['id']]);           
            $arrGroup[$key] = (count($productGroup) > 0) ? 1 : 0;
        }
        $this->set('arrGroup', $arrGroup);
        $this->set('lstProduct', $lstProduct);
        $this->set('optionGroup', $optionGroup);
    }

}
