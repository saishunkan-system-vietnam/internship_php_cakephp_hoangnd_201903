<?php

namespace App\Controller\Home;

use App\Controller\Home\HomesController;

class OrderController extends HomesController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('products');
        $this->loadComponent('orders');
        $this->loadComponent('orderdetails');
        $this->loadComponent('users');
        $this->loadComponent('subaddress');
        $this->loadModel('Users');
        $this->loadComponent('validation');
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
        if ($this->request->isPost()) {
            $req = $this->request->getData();
            if ($this->session->check('usernameId') == true) {
                
            } else {
                $validation = $this->Users->newEntity($req, ['validate' => 'Order']);
                $validationError = $validation->errors();
                if (!empty($validationError)) {
                    //có lỗi
                    $errName = $this->validation->getmessage($validationError, 'name');
                    $errPhonenumber = $this->validation->getmessage($validationError, 'phonenumber');
                    $errAddress = $this->validation->getmessage($validationError, 'address');
                    $this->set('errName', $errName);
                    $this->set('errPhonenumber', $errPhonenumber);

                    $this->set('errAddress', $errAddress);
                } else {
                    //không lỗi                 
                    
                    if ($this->users->add($req) !== FALSE) {
                        $user = $this->users->minmax('max', 'id');
                        if ($this->subaddress->add(['address' => $req['address'], 'users_id' => $user['id']]) !== FALSE) {
                            $subaddress = $this->subaddress->where(['users_id' => $user['id']]);
                            $subaddress=  array_pop($subaddress);
                            if ($this->orders->add(['users_id' => $user['id'], 'status' => 0, 'note' => '', 'subaddress_id' => $subaddress['id'], 'date_time' => date('Y-m-d H:i:s')]) !== FALSE) {
                                $order = $this->orders->max(['subaddress_id' => $subaddress['id']]);   
                                foreach ($cart as $key => $value) {                                    
                                    $this->orderdetails->add(['orders_id' => $order['id'], 'products_id' => $key, 'quantity' => $value]);
                                }
                                $this->set('successful', 'Order successful');
                            }
                        }
                    }
                }
            }
        }
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
