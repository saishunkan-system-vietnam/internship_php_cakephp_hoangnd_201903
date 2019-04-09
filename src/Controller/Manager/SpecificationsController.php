<?php

namespace App\Controller\Manager;

use App\Controller\Manager\ManagersController;

class SpecificationsController extends ManagersController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('products');
        $this->loadComponent('specifications');        
        $this->loadComponent('productspecifications');
    }

    public function index() {
        if ($this->request->is('post')) {
            $req = $this->request->getData();
            $this->specifications->add(['name' => $req['name'], 'parent_id' => 0]);
        }
        $lstSpecification = $this->specifications->where(['parent_id' => 0]);
        $this->set('lstSpecification', $lstSpecification);
    }

    public function addoptions($id = null) {
        $specification = $this->specifications->get($id);
        $this->set('specification', $specification);

        if ($this->request->is('post')) {
            $req = $this->request->getData();
            $this->specifications->add(['name' => $req['name'], 'parent_id' => $specification['id']]);
        }
        $lstSpecification = $this->specifications->where(['parent_id' => $specification['id']]);
        $this->set('lstSpecification', $lstSpecification);
    }

    public function edit($id = null) {
        $specification = $this->specifications->get($id);
        $this->set('specification', $specification);
        if ($this->request->is('post')) {
            $req = $this->request->getData();
            $return = $this->specifications->update(['name' => $req['name'], 'id' => $id]);
            if ($return != FALSE) {
                return $this->redirect(['action' => 'index']);
            }
        }
    }

    public function delete($id = null) {
        $specification = $this->specifications->get($id);
        $this->set('specification', $specification);
        if ($this->request->is('post')) {
            $return = $this->specifications->delete($id);
            if ($return != FALSE) {
                return $this->redirect(['action' => 'index']);
            } else {
                $this->set('errDelete', 'Không thể xóa option này.');
            }
        }
    }

    public function editOptionDetail($id = null) {
        $specification = $this->specifications->get($id);
        $this->set('specification', $specification);
        $lstSpecification = $this->specifications->where(['parent_id' => 0]);
        if (count($lstSpecification) > 0) {
            $option = $this->specifications->getOptionParent($lstSpecification);
            $this->set('option', $option);
        }
        if ($this->request->is('post')) {
            $req = $this->request->getData();
            $return = $this->specifications->update(['name' => $req['name'], 'parent_id' => $req['optionName'], 'id' => $id]);
            if ($return != FALSE) {
                return $this->redirect(['action' => 'addoptions', $specification['parent_id']]);
            }
        }
    }

    public function deleteOptionDetail($id = null) {
        $specification = $this->specifications->get($id);
        $this->set('specification', $specification);
        $specificationParent = $this->specifications->get($specification['parent_id']);
        $this->set('specificationParent', $specificationParent);
        if ($this->request->is('post')) {
            $return = $this->specifications->delete($id);
            if ($return != FALSE) {
                return $this->redirect(['action' => 'addoptions', $specificationParent['id']]);
            }
        }
    }

    public function addProductOption($id = null) {   
        if ($id == null) {
            $lstProduct = $this->products->selectAll();
            $this->set('lstProduct', $lstProduct);
        } else {
            $product = $this->products->get($id);
            $this->set('product', $product);
            $lstSpecification = $this->specifications->where(['parent_id' => 0]);
            $option = [];
            foreach ($lstSpecification as $key => $value) {
                $option[$key] = $this->specifications->getOptionParent($this->specifications->where(['parent_id' => $value['id']]));
            }
            $this->set('lstSpecification', $lstSpecification);
            $this->set('option', $option);
            if ($this->request->is('post')) {
                $req = $this->request->getData();
                $option=$this-> productspecifications->max(['products_id'=>$id],'options')['options']+1;
                foreach ($lstSpecification as $value){
                  $this-> productspecifications->add(['products_id'=>$id,'specifications_id'=>$req[$value['id']],'options'=>$option]);
                }
            }
        }
    }

}
