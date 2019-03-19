<?php

namespace App\Controller\Manager;

use App\Controller\Manager\ManagersController;

class CategoriesController extends ManagersController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('categories');
    }

    public function index() {
        
    }

    public function add() {
        $optionSelectSubproducer= $this->categories->getSelectOption($this->categories->selectAll());
        $this->set('option',$optionSelectSubproducer);
        if ($this->request->isPost()) {
            $reqCategory = $this->request->getData();
            if (isset($reqCategory['addproducer'])) {
                $result = $this->categories->add(['name' => $reqCategory['name'], 'parent_id' => 0]);
                $message = ($result === true) ? 'Add successful!' : 'Add fail';
                $this->Flash->success($message);
            }
            if (isset($reqCategory['addsubproducer'])) {
                $result = $this->categories->add(['name' => $reqCategory['namesub'], 'parent_id' => $reqCategory['parent_id']]);
                $message = ($result === true) ? 'Add successful!' : 'Add fail';
                $this->Flash->success($message);
            }
        }
    }

}
