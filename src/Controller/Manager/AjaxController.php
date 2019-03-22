<?php

namespace App\Controller\Manager;

use App\Controller\AppController;

class AjaxController extends AppController {

    public function initialize() {
        parent::initialize();        
        $this->viewBuilder()->disableAutoLayout();
        $this->loadComponent('categories');
    }

    function getsubproducer() {
         if ($this->request->is('ajax')) {
            $req = $this->request->getData();            
            $subOption = $this->categories->getSubSelectOption($req['producer_id']);      
            $this->set('subOption', $subOption);
        }
    }
    
    function saveimagesinram(){
        if ($this->request->is('ajax')) {
            $req = $this->request->getData();            
          
        }
    }

}
