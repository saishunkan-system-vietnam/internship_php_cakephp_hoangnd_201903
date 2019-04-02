<?php

namespace App\Controller\Home;

use App\Controller\Home\HomesController;

class ProductsController extends HomesController {

    public $paginate = [
        'limit' => 1,
        'order' => [
            'Products.name' => 'asc'
        ]
    ];

    public function initialize() {
        parent::initialize();
        $this->loadComponent('products');
        $this->loadComponent('Paginator');
    }

    public function index() {
        if ($this->session->check('resultSearch') == true) {
            $resultSearch = $this->session->read('resultSearch');
            $nameSearch = $resultSearch['key'];
            $lstProduct = $resultSearch['lstProduct'];
            $this->set('nameSearch', $nameSearch);
            $this->session->delete('resultSearch');
        } else {
            $lstProduct = $this->products->selectAll();
        }
        $this->set('lstProduct', $lstProduct);
    }

    public function view($id = null) {
        $product = $this->products->selectAll(['id' => $id]);
        $this->set('product', array_pop($product));
    }

}
