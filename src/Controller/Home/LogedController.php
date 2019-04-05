<?php

namespace App\Controller\Home;

use App\Controller\Home\HomesController;

class LogedController extends HomesController {

    public function initialize() {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('roles');       
        $this->session = $this->request->getSession();
        if ($this->session->check('username') === false) {
           $this->redirect(['controller'=>'Login','action'=>'index']);
        }

        $this->loadComponent('Csrf');
    }  
}
