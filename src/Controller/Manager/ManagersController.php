<?php

namespace App\Controller\Manager;

use Cake\Controller\Controller;

class ManagersController extends Controller {

    public function initialize() {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->viewBuilder()->setLayout('managerLayout');
    }
    
    
    public function logout(){
        
    }

}
