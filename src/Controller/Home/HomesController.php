<?php

namespace App\Controller\Home;

use Cake\Controller\Controller;

class HomesController extends Controller {

    private $session;

    public function initialize() {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        
         $this->viewBuilder()->setLayout('homesLayout');   
       
        $this->loadComponent('Csrf'); 
        
    }  

   

}
