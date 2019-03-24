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
            $session=$this->request->getSession();     
//            if($session->check('add')){
//                echo 'chua ton tai add';
//            } else {
//            echo 'da ton tai add';    
//            }
//                $lstImg=($session->check('lstImg')===true)?$session->read('lstImg'):[];
//                //var_dump($lstImg);die();
//                $Img= array_merge($lstImg,[['name'=>$req['file']['name'],'tmp_name'=>$req['file']['tmp_name']]]);
//                $session->write('lstImg',$Img);    
            
                var_dump($req);
        }
    }

}
