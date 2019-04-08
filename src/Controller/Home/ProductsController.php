<?php

namespace App\Controller\Home;

use App\Controller\Home\HomesController;

class ProductsController extends HomesController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('products');
    }

    public function index() {
        $this->set("title","Trang chủ");
        $req = $this->request->getQuery();
        $key="";
        if (isset($req["key"]) and $req["key"]!="") {           
            $countProduct = $this->products->count(['keySearch' => $req["key"]]);
            $key=$req["key"];
            $this->set("title","Tìm kiếm");
        } else {
            $countProduct = $this->products->count(['keySearch' => 'a']);            
        }
        $pageNumber = ($countProduct % 4 == 0) ? $countProduct / 4 : (int) ($countProduct / 4) + 1;
        $this->set('countProduct', $countProduct);
        $this->set('pageNumber', $pageNumber);
        $this->set("key",$key);
    }

    public function view($id = null) {        
        $product = $this->products->selectAll(['id' => $id]);
        $product= array_pop($product);
        $this->set('product',$product);
        $this->set("title",$product['name']);
       
    }

}
