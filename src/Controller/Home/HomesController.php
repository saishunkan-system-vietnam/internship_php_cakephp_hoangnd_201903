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
        
        
    }  

    private function totalCart(){
         $cart = ($this->session->check('cart') == true) ? $this->session->read('cart') : [];
         $total=0;
         if(count($cart)>0){
             foreach ($cart as $v){
                 $total+=$v;
             }
         }
         return $total;
    }

}
