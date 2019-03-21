<?php

namespace App\Controller\Manager;

use App\Controller\Manager\ManagersController;

class ProductsController extends ManagersController {

    protected $token;

    public function initialize() {
        parent::initialize();
        $this->loadComponent('validation');
        $this->loadComponent('categories');
        $this->loadComponent('products');
        $this->loadModel('Products');
    }

    public function index() {
        $lstProduct = $this->products->selectAll();       
        $this->set('lstProduct', $lstProduct);
    }

    public function add() {
        $option = $this->categories->getSelectOption();
        $this->set('option', $option);
        if ($this->request->isPost()) {            
            $reqProduct = $this->request->getData();            
            $validation = $this->Products->newEntity($reqProduct);
            $validationError = $validation->errors();            
            if (empty($validationError)) {
                $result = $this->products->add($reqProduct);
                if ($result === FALSE) {
                    $this->set('error', 'Add fail.');
                } else {
                    $this->redirect(['action' => 'index']);
                }
            } else {
                $errName = $this->validation->getmessage($validationError, 'name');
                $errSubproducer = $this->validation->getmessage($validationError, 'categories_id');                
                $this->set('errName', $errName);
                $this->set('errSubproducer', $errSubproducer);                
            }
        }
    }
    
    public function edit($id) {
        $option = $this->categories->getSelectOption();
        $this->set('option', $option);         
        $product=  $this->products->get($id);
        $this->set('product',$product);
        $subproducer=  $this->categories->get($product['categories_id']);
        $producer=$this->categories->get($subproducer['parent_id']);
        $optionSubproducer=$this->categories->getSubSelectOption($producer['id']);
        $this->set('optionSubproducer',$optionSubproducer);
        $this->set('producer',$producer);
        $this->set('subproducer',$subproducer);
        if ($this->request->isPost()) {
            $reqProduct = $this->request->getData();           
            $validation = $this->Products->newEntity($reqProduct);
            $validationError = $validation->errors();
            if (empty($validationError)) {
                $reqProduct['id']=$id;
                $result = $this->products->update($reqProduct);
                if ($result === FALSE) {
                    $this->set('error', 'Add fail.');
                } else {
                    $this->redirect(['action' => 'index']);
                }
            } else {
                $errName = $this->validation->getmessage($validationError, 'name');
                $errSubproducer = $this->validation->getmessage($validationError, 'categories_id');
                $this->set('errName', $errName);
                $this->set('errSubproducer', $errSubproducer);
            }
        }
    }
    
    public function delete($id) {
        
       $product=  $this->products->get($id);
       $subproducer=  $this->categories->get($product['categories_id']);
       $producer=$this->categories->get($subproducer['parent_id']);
       $this->set('product',$product);
        $this->set('subproducer',$subproducer); 
        $this->set('producer',$producer);    
        if ($this->request->isPost()) {
            $result = $this->products->delete($id);
            if ($result === true) {
                $this->redirect(['action' => 'index']);
            }
        } 
    }

}
