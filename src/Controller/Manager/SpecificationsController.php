<?php

namespace App\Controller\Manager;

use App\Controller\Manager\ManagersController;

class SpecificationsController extends ManagersController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('specifications');
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
            $return = $this->specifications->update(['name' => $req['name'],'id'=>$id]);
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
        $specificationParent=$this->specifications->get($specification['parent_id']);
        $this->set('specificationParent', $specificationParent);
        if ($this->request->is('post')) {
            $return = $this->specifications->delete($id);
            if ($return != FALSE) {
                return $this->redirect(['action' => 'addoptions',$specificationParent['id']]);
            }
        }
    }

    public function addProductOption() {
        
    }

}
