<?php

namespace App\Controller\Manager;

use App\Controller\Manager\ManagersController;

class ProductGroupsController extends ManagersController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('productgroups');
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
        if($this->request->isPost()){
           $result= $this->productgroups->deleteGroups($id);
           if($result==true){
               return $this->redirect(['action'=>'index']);
           }  else {
                $this->set('error', 'Delete fail');
           }
        }
        
    }
    
    public function group(){
        $lstGroups = $this->productgroups->getAllGroups();
        $this->set('lstGroups',$lstGroups);
    }

}
