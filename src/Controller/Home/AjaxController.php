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
            //đọc giỏ hàng
            $cart = $this->session->read('cart');


            if (array_key_exists($req['productId'], $cart) == true) {

                //nếu số lượng <=0 xóa sản phẩm khỏi giỏ hàng ngược lại lưu số lượng sản phẩm mới vào giỏ hàng
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

            //check exits cart nếu tồn tại lấy ra giở hàng cũ ngược lại tạo mới giở hàng
            $cart = ($this->session->check('cart') == true) ? $this->session->read('cart') : [];

            //kiểm tra sản phẩm có tồn tại trong giỏ hàng chưa nếu có tăng số lượng sản phẩm thêm 1 ngược lại cho sản phẩm một sản phẩm mới vào giỏ hàng
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
        $this->autoRender = FALSE;
        if ($this->request->is('ajax')) {
            $req = $this->request->getData();
            $lstProduct = $this->products->selectAll(['searchName' => $req['searchName']]);
            $resultSearch['key'] = $req['searchName'];
            $resultSearch['lstProduct'] = $lstProduct;
            $this->session->write('resultSearch', $resultSearch);
            $this->set('searchName', $req['searchName']);
            $this->set('lstProduct', $lstProduct);
        }
    }

    public function loadpage() {
        if ($this->request->is('ajax')) {             
            $req=  $this->request->getData();  
            if (isset($req["key"]) and $req["key"]!="") {
                $lstProduct = $this->products->selectAll(['keySearch' => $req['key'], 'limit' => 4,'offset'=>($req['page']-1)*4,'joinLeft' => 1]);
                $this->set('key', $req['key']);
                $this->set('lstProduct', $lstProduct);
            } else {
                $lstProduct = $this->products->selectAll(['limit' => 4,'offset'=>($req['page']-1)*4,'joinLeft' => 1]);
            }
            $this->set('lstProduct', $lstProduct);
        }
    }

}
