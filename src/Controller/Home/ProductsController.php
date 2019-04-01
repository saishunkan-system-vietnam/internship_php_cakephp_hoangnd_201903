<?php

namespace App\Controller\Home;

use App\Controller\Home\HomesController;

class ProductsController extends HomesController {    
   
    public $paginate=[
        'limit'=>1,
        'order'=>[
            'Products.name'=>'asc'
        ]
    ];

    public function initialize() {
        parent::initialize();
        $this->loadComponent('products');
        $this->loadComponent('Paginator');
    }

    public function index() {
        $lstProduct = $this->products->selectAll();
        $this->set('lstProduct', $lstProduct);         
    }

    public function view($id = null) {
        $product = $this->products->selectAll(['id' => $id]);
        $this->set('product', array_pop($product));
    }   
}
