<?php

namespace App\Controller\Manager;

use App\Controller\Manager\ManagersController;

class ProductsController extends ManagersController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('categories');
        $this->loadComponent('Csrf');
    }

    public function index() {
        
    }
    
    public function add(){
        $option=  $this->categories->getSelectOption();
        $this->set('option',$option);
        $subOption=  $this->categories->getSubSelectOption();
        $this->set('subOption',$subOption);
        if($this->request->getData()){
            
        }
    }

}
