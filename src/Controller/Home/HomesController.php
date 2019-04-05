<?php

namespace App\Controller\Home;

use Cake\Controller\Controller;

class HomesController extends Controller {

    protected $session;

    public function initialize() {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        
         $this->viewBuilder()->setLayout('homesLayout');   
       
        $this->loadComponent('Csrf'); 
        $this->session=  $this->request->getSession();
        $this->set('quantity', $this->totalCart());
        $username=($this->session->check('username')==true)?$this->session->read('username'):'';
        $this->set('username',$username);
    }  

    private function totalCart(){
         $cart = ($this->session->check('cart') == true) ? $this->session->read('cart') : [];         
         return count($cart);
    }

}
