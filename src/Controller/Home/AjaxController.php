<?php

namespace App\Controller\Home;

use App\Controller\Home\HomesController;

class AjaxController extends HomesController {

    public function initialize() {
        parent::initialize();
        $this->viewBuilder()->disableAutoLayout();
        $this->loadComponent('products');
    }

    public function updateCart() {
        $this->autoRender = FALSE;
        if ($this->request->is('ajax')) {
            $req = $this->request->getData();
            $cart = $this->session->read('cart');
            if (array_key_exists($req['productId'], $cart) == true) {
                if ($req['quantity'] <= 0) {
                    unset($cart[$req['productId']]);
                } else {
                    $cart[$req['productId']] = $req['quantity'];
                }
            } else {
                $cart[$req['productId']] = $req['quantity'];
            }
            $this->session->write('cart', $cart);
        }
    }

    public function addCart() {
        $this->autoRender = FALSE;
        if ($this->request->is('ajax')) {
            $req = $this->request->getData();
            $cart = ($this->session->check('cart') == true) ? $this->session->read('cart') : [];
            if (array_key_exists($req['productId'], $cart) == true) {
                $cart[$req['productId']] = $cart[$req['productId']] + 1;
            } else {
                $cart[$req['productId']] = 1;
            }
            $this->session->write('cart', $cart);
        }
    }

    public function deleteCart() {
        $this->autoRender = FALSE;
        if ($this->request->is('ajax')) {
            $req = $this->request->getData();
            $cart = ($this->session->check('cart') == true) ? $this->session->read('cart') : [];
            if (array_key_exists($req['productId'], $cart) == true) {
                unset($cart[$req['productId']]);
            }
            $this->session->write('cart', $cart);
        }
    }

    public function searchproduct() {
        if ($this->request->is('ajax')) {
            $req = $this->request->getData();
            $lstProduct=  $this->products->selectAll(['searchName'=>$req['searchName']]);    
            $this->set('searchName',$req['searchName']);
            $this->set('lstProduct',$lstProduct);
        }
    }

}
