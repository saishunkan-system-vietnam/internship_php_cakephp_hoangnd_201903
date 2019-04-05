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
            $cartold=$cart;
            if (array_key_exists($id, $cart) == true) {
                $cart = [$id => $cart[$id]];
            } else {
                $cart = [$id => 1];
            }
        }
        $this->getCart($cart);
        $user = ($this->session->check('usernameId') == true) ? $this->users->get($this->session->read('usernameId')) : [];
        $this->set('user', $user);
        if (count($user) > 0) {
            $subaddress_default = $this->subaddress->where(['users_id' => $user['id'], 'default' => true]);
            $subaddress = $this->subaddress->where(['users_id' => $user['id']]);
            $optionSubaddress = [];
            foreach ($subaddress as $item) {
                $optionSubaddress = array_merge($optionSubaddress, [['value' => $item['id'], 'text' => $item['address']]]);
            }

            $this->set('subaddress_default', $subaddress_default);
            $this->set('optionSubaddress', $optionSubaddress);
        }

        //kiểm tra người dùng xác nhận mua hàng
        if ($this->request->isPost()) {
            $req = $this->request->getData();

            //kiểm tra khách hàng có login tài khoản hay không
            if ($this->session->check('usernameId') == true) {
                $addressID = array_pop($subaddress_default)['id'];

                //kiểm tra khác hàng có thay đổi địa chỉ mua hàng mặc định hay không
                if (isset($req['address']) and $req['address'] != '') {
                    $getSubaddress = $this->subaddress->where(['users_id' => $user['id'], 'address' => $req['address']]);
                    if (count($getSubaddress) == 0) {
                        if ($this->subaddress->add(['address' => $req['address'], 'users_id' => $user['id']]) != FALSE) {
                            $getSubaddress = $this->subaddress->where(['users_id' => $user['id'], 'address' => $req['address']]);
                        }
                    }
                    $addressID = array_pop($getSubaddress);
                }
                //ngược lại kiểm tra khách hàng có thay đổi địa chỉ mua hàng băng
                elseif (isset($req['addressOption']) and $req['addressOption'] != '') {
                    $getSubaddress = $this->subaddress->get($req['addressOption']);
                    $addressID = $getSubaddress['id'];
                }

                //kiểm tra add order nếu thành công thì add order details
                if ($this->orders->add(['users_id' => $user['id'], 'status' => 0, 'subaddress_id' => $addressID, 'date_time' => date('Y-m-d H:i:s')]) !== FALSE) {
                    $order = $this->orders->max(['subaddress_id' => $addressID]);
                    foreach ($cart as $key => $value) {
                        $this->orderdetails->add(['orders_id' => $order['id'], 'products_id' => $key, 'quantity' => $value]);
                        unset($cartold[$key]);
                    }
                    $this->set('successful', 'Order successful');
                    if (count($cartold) > 0) {
                        $this->session->write('cart', $cartold);
                    } else {
                        $this->session->delete('cart', $cart);
                    }
                    return $this->redirect(['action' => 'buysuccess', $order['id']]);
                }
            }
            //khách hàng không đăng nhập tài khoản
            else {
                $validation = $this->Users->newEntity($req, ['validate' => 'Order']);
                $validationError = $validation->errors();

                //kiểm tra validate form nhập liệu
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
                    //add thông tin order vào csdl
                    if ($this->users->add($req) !== FALSE) {
                        $user = $this->users->minmax('max', 'id');
                        if ($this->subaddress->add(['address' => $req['address'], 'users_id' => $user['id']]) !== FALSE) {
                            $subaddress = $this->subaddress->where(['users_id' => $user['id']]);
                            $subaddress = array_pop($subaddress);
                            if ($this->orders->add(['users_id' => $user['id'], 'status' => 0, 'note' => '', 'subaddress_id' => $subaddress['id'], 'date_time' => date('Y-m-d H:i:s')]) !== FALSE) {
                                $order = $this->orders->max(['subaddress_id' => $subaddress['id']]);
                                foreach ($cart as $key => $value) {
                                    $this->orderdetails->add(['orders_id' => $order['id'], 'products_id' => $key, 'quantity' => $value]);
                                    unset($cartold[$key]);
                                }
                                $this->set('successful', 'Order successful');
                                if (count($cartold) > 0) {
                                    $this->session->write('cart', $cartold);
                                } else {
                                    $this->session->delete('cart', $cart);
                                }
                                return $this->redirect(['action' => 'buysuccess', $order['id']]);
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

    public function buysuccess($id = null) {
        if ($id != null) {
            $order = $this->orders->get($id);
            $address = $this->subaddress->get($order['subaddress_id']);
            $user = $this->users->get($address['users_id']);
            $orderDetails = $this->orderdetails->where(['orders_id' => $order['id']]);
            $totalPrice = 0;
            $lstProducForOrderDetails = [];
            foreach ($orderDetails as $key => $value) {
                $product = $this->products->selectAll(['id' => $value['products_id']]);
                $lstProducForOrderDetails[$key] = array_pop($product);
                $totalPrice+=$value['quantity'] * $lstProducForOrderDetails[$key]['price'];
            }
            $this->set('totalPrice', $totalPrice);
            $this->set('order', $order);
            $this->set('orderDetails', $orderDetails);
            $this->set('lstProducForOrderDetails', $lstProducForOrderDetails);
            $this->set('address', $address);
            $this->set('user', $user);
        }
    }

}
