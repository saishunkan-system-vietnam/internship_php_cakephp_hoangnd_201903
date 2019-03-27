<?php

namespace App\Controller\Home;

use App\Controller\Home\HomesController;

class ProductsController extends HomesController {  

    public function initialize() {
        parent::initialize(); 
        $this->loadComponent('products');
    }

    public function index() {
        $this->autoRender=FALSE;
        $lstProduct = $this->products->selectAll();
        $this->set('lstProduct', $lstProduct);
    }   
}
