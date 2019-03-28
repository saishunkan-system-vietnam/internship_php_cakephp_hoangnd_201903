<?php

namespace App\Controller\Home;

use App\Controller\Home\HomesController;

class OrderController extends HomesController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('products');
        $this->loadComponent('users');
    }

    public function index() {
        $cart = ($this->session->check('cart') == true) ? $this->session->read('cart') : [];
        if (count($cart) > 0) {
            $totalAllPrice = 0;
            $totalItem = 0;
            $lstCart = $this->getLstCart($cart);
            foreach ($lstCart as $item) {
                $totalAllPrice+=$item['totalprice'];
                $totalItem+=$item['quantity'];
            }
            $this->set('totalPrice', $totalAllPrice);
            $this->set('totalItem', $totalItem);
        }
        $this->set('lstCart', $lstCart);
    }

    public function edit($name = null, $id = null) {
        $cart = $this->session->read('cart');
        if ($name === 'subtraction') {
            $cart[$id] = $cart[$id] - 1;
            if ($cart[$id] <= 0) {
                unset($cart[$id]);
            }
        }
        if ($name === 'addtraction') {
            $cart[$id] = $cart[$id] + 1;
        }
        if ($name === 'delete') {
            unset($cart[$id]);
        }
        $this->session->write('cart', $cart);
        return $this->redirect(['action' => 'index']);
    }

    public function buyconfirm($id = null) {

        if ($id != null) {
            $cart[$id] = 1;
        } else {
            $cart = $this->session->read('cart');
        }

        if ($this->session->check('usernameId')) {
            $users = $this->users->get($this->session->read('usernameId'));
            $this->set('user', $users);
        } else {
            
        }
    }

    public function cart($id = null) {

        if ($id != null) {
            $cart[$id] = 1;
        } else {
            $cart = $this->session->read('cart');
        }

        $cart = ($this->session->check('cart') == true) ? $this->session->read('cart') : [];
        if (array_key_exists($id, $cart) == true) {
            $cart[$id] = $cart[$id] + 1;
        } else {
            $cart[$id] = 1;
        }
        $this->session->write('cart', $cart);
        return $this->redirect(['controller' => 'Products', 'action' => 'view', $id]);
    }

    private function getLstCart($cart) {
        $lstCart = [];
        foreach ($cart as $key => $value) {
            $product = $this->products->selectAll(['id' => $key]);
            $product = array_pop($product);
            $toltalprice = ($value * $product['price']);
            $lstCart[$key] = ['name' => $product['name'], 'price' => $product['price'], 'quantity' => $value, 'image' => $product['Images']['name'], 'totalprice' => $toltalprice];
        }
        return $lstCart;
    }

}
