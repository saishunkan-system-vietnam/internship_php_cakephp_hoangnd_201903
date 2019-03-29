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
        $this->getCart($cart);
    }

    public function buyconfirm($id = null) {
        $cart = ($this->session->check('cart') == true) ? $this->session->read('cart') : [];
        if ($id != null) {
            if (array_key_exists($id, $cart) == true) {
                $cart = [$id => $cart[$id]];
            } else {
                $cart = [$id => 1];
            }
        }
        $this->getCart($cart);
        $users = ($this->session->check('usernameId') == true) ? $this->users->get($this->session->read('usernameId')) : [];
        $this->set('user', $users);
    }

    private function getCart($cart) {
        $lstCart = [];
        if (count($cart) > 0) {
            $totalAllPrice = 0;
            $totalItem = 0;
            foreach ($cart as $key => $value) {
                $product = $this->products->selectAll(['id' => $key]);
                $product = array_pop($product);
                $toltalprice = ($value * $product['price']);
                $totalAllPrice+=$toltalprice;
                $totalItem+=$value;
                $lstCart[$key] = ['name' => $product['name'], 'price' => $product['price'], 'quantity' => $value, 'image' => $product['Images']['name'], 'totalprice' => $toltalprice];
            }
            $this->set('totalPrice', $totalAllPrice);
            $this->set('totalItem', $totalItem);
        }
        $this->set('lstCart', $lstCart);
    }

}
