<?php

namespace App\Controller\Manager;

use App\Controller\Manager\ManagersController;

class CategoriesController extends ManagersController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('validation');
        $this->loadComponent('categories');
        $this->loadModel('Categories');
    }

    public function index() {
        $this->set('lstProducer', $this->categories->selectAll());
    }

    public function add() {
        if ($this->request->isPost()) {
            $reqCategory = $this->request->getData();
            if (isset($reqCategory['addproducer'])) {
                $reqCategory['parent_id'] = 0;
            }
            if (isset($reqCategory['addsubproducer'])) {
                $reqCategory['name'] = $reqCategory['namesub'];
            }
            $validation = $this->Categories->newEntity($reqCategory, ['validate' => 'Add']);
            $validationError = $validation->errors();
            if (empty($validationError)) {
                $result = $this->categories->add(['name' => $reqCategory['name'], 'parent_id' => 0]);
                $message = ($result === true) ? 'Add successful!' : 'Add fail';
                $this->set((isset($reqCategory['addproducer']) ? 'messageProducer' : 'messageSubproducer'), $message);
            } else {
                $errName = $this->validation->getmessage($validationError, 'name');
                $errParent_id = $this->validation->getmessage($validationError, 'parent_id');
                $this->set((isset($reqCategory['addproducer']) ? 'erroNameProducer' : 'erroNameSubproducer'), $errName);
                $this->set('errProducer', $errParent_id);
            }
        }
        $optionSelectSubproducer = $this->categories->getSelectOption($this->categories->selectAll());
        $this->set('option', $optionSelectSubproducer);        
    }

    public function editproducer($id = null) {
        $producer = $this->categories->get($id);
        $this->set('producer', $producer);
        if ($this->request->isPost()) {
            $reqCategory = $this->request->getData();
            if ($reqCategory['name'] !== $producer['name']) {
                $reqCategory['parent_id'] = 0;
                $validation = $this->Categories->newEntity($reqCategory, ['validate' => 'Add']);
                $validationError = $validation->errors();
                if (empty($validationError)) {
                    $result = $this->categories->update(['id' => $id, 'name' => $reqCategory['name'], 'parent_id' => 0]);
                    if ($result === false) {
                        $this->set('editFail', 'Edit fail!');
                    } else {
                        $this->redirect(['action' => 'index']);
                    }
                } else {
                    $errName = $this->validation->getmessage($validationError, 'name');
                    $this->set('errName', $errName);
                }
            } else {
                $this->redirect(['action' => 'index']);
            }
        }
    }

    public function editsubproducer($id = null) {
        $optionSelectSubproducer = $this->categories->getSelectOption($this->categories->selectAll());
        $this->set('option', $optionSelectSubproducer);
        $subproducer = $this->categories->get($id);
        $this->set('subproducer', $subproducer);
        if ($this->request->isPost()) {
            $reqCategory = $this->request->getData();
            if ($reqCategory['name'] !== $subproducer['name']) {
                $validation = $this->Categories->newEntity($reqCategory, ['validate' => 'Add']);
                $validationError = $validation->errors();
                if (empty($validationError)) {
                    $result = $this->categories->update(['id' => $id, 'name' => $reqCategory['name'], 'parent_id' => $reqCategory['parent_id']]);
                    if ($result === false) {
                        $this->set('editFail', 'Edit fail!');
                    } else {
                        $this->redirect(['action' => 'index']);
                    }
                } else {
                    $errName = $this->validation->getmessage($validationError, 'name');
                    $this->set('errName', $errName);
                }
            } else {
                $this->redirect(['action' => 'index']);
            }
        }
    }

    public function delete($id=null) {
        $category=$this->categories->get($id);
        $this->set('category',$category);
        if($category['parent_id']===0){
            $this->set('producer',$category['name']);
            $this->set('titleDelete','Confirm delete producer')  ;  
        }  else {
            $this->set('producer',  $this->categories->get($category['parent_id'])['name']);
             $this->set('titleDelete','Confirm delete subproducer')  ;
        }
        if($this->request->isPost()){
            $result = $this->categories->delete($id);
            if($result===true){
                $this->redirect(['action'=>'index']);
            }
        }
    }

}
