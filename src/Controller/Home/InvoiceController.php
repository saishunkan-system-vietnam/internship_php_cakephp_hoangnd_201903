<?php

namespace App\Controller\Home;

use App\Controller\Home\HomesController;

class InvoiceController extends HomesController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('products');
    }

    public function index() {
      
    }
}
