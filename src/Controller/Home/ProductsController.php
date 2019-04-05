<?php

namespace App\Controller\Home;

use App\Controller\Home\HomesController;

class ProductsController extends HomesController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('products');
    }

    public function index() {
        if($this->request->is('post')){
            die();
            $req=  $this->request->getData();
            var_dump($req);
        }
        $countProduct = $this->products->count(['keySearch'=>'a']);
        $pageNumber = ($countProduct % 4 == 0) ? $countProduct / 4 : (int) ($countProduct / 4) + 1;
        $this->set('countProduct', $countProduct);
        $this->set('pageNumber', $pageNumber);
    }

    public function view($id = null) {
        $product = $this->products->selectAll(['id' => $id]);
        $this->set('product', array_pop($product));
    }

}
