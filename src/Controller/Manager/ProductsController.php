<?php

namespace App\Controller\Manager;

use App\Controller\Manager\ManagersController;

class ProductsController extends ManagersController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('validation');
        $this->loadComponent('categories');
        $this->loadComponent('products');
        $this->loadModel('Products');
        $this->loadComponent('images');
        $this->loadComponent('ajaxmanagers');
        $this->loadComponent('productgroups');
        $this->loadComponent('orders');
        $this->loadComponent('specifications');
        $this->loadComponent('productspecifications');
    }

    public function index() {
        $lstProduct = $this->products->selectAll();
        $this->set('lstProduct', $lstProduct);
    }

    public function add() {
        $option = $this->categories->getSelectOption();
        $this->set('option', $option);
        $lstSpecification = $this->specifications->where(['parent_id' => 0]);
        $optionSpecification = [];
        foreach ($lstSpecification as $key => $value) {
            $optionSpecification[$key] = $this->specifications->getOptionParent($this->specifications->where(['parent_id' => $value['id']]));
        }
        $this->set('lstSpecification', $lstSpecification);
        $this->set('optionSpecification', $optionSpecification);
        if ($this->request->isPost()) {
            $reqProduct = $this->request->getData();
            $result = $this->products->add($reqProduct);
            if ($result === FALSE) {
                $this->set('error', 'Add fail.');
            } else {
                $productAdded = $this->products->max('id');
                foreach ($lstSpecification as $value) {
                    foreach ($reqProduct[$value['id']] as $k => $v) {
                        $this->productspecifications->add(['products_id' => $productAdded['id'], 'specifications_id' => $v, 'options' => $k, 'price_option' => $reqProduct['price'][$k]]);
                    }
                }
                $this->redirect(['action' => 'index']);
            }
        }
    }

    public function edit($id) {
        $option = $this->categories->getSelectOption();
        $this->set('option', $option);
        $product = $this->products->get($id);
        $this->set('product', $product);    
        $subproducer = $this->categories->get($product['categories_id']);
        $producer = $this->categories->get($subproducer['parent_id']);        
        $optionSubproducer = $this->categories->getSubSelectOption($producer['id']);
        $this->set('optionSubproducer', $optionSubproducer);
        $this->set('producer', $producer);
        $this->set('subproducer', $subproducer);
        
        
        $lstSpecification = $this->specifications->where(['parent_id' => 0]);
         
         //lấy list specification
        $optionSpecification = [];
        foreach ($lstSpecification as $key => $value) {
            $optionSpecification[$key] = $this->specifications->getOptionParent($this->specifications->where(['parent_id' => $value['id']]));
        }
        $this->set('lstSpecification', $lstSpecification);
        $this->set('optionSpecification', $optionSpecification);
        
        //láy option of product
        $optionProductSpecifition=$this->productspecifications->where(['products_id'=>$id]);
        
        foreach ($optionProductSpecifition as $value){
            
        }
        $groupOption=$this->productspecifications->group($id);
        
//        echo '<pre>';
//        var_dump($countOption);
//        die;
        $this->set('groupOption', $groupOption);
        $this->set('optionProductSpecifition', $optionProductSpecifition);
        if ($this->request->isPost()) {
            $reqProduct = $this->request->getData();
            $validation = $this->Products->newEntity($reqProduct);
            $validationError = $validation->errors();
            if (empty($validationError)) {
                $reqProduct['id'] = $id;
                $result = $this->products->update($reqProduct);
                if ($result === FALSE) {
                    $this->set('error', 'Add fail.');
                } else {
                    $this->redirect(['action' => 'index']);
                }
            } else {
                $this->setValidation($validationError);
            }
        }
    }

    public function delete($id) {
        $product = $this->products->get($id);
        $subproducer = $this->categories->get($product['categories_id']);
        $producer = $this->categories->get($subproducer['parent_id']);
        $this->set('product', $product);
        $this->set('subproducer', $subproducer);
        $this->set('producer', $producer);
        if ($this->request->isPost()) {
            $exitOrder = $this->orders->where(['products_id' => $id]);
            if (count($exitOrder) > 0) {
                $this->set('errDelete', 'không thể xóa sản phẩm này');
            } else {
                $result = $this->products->delete($id);
                if ($result === true) {
                    $this->redirect(['action' => 'index']);
                }
            }
        }
    }

    public function setValidation($validationError) {
        $errName = $this->validation->getmessage($validationError, 'name');
        $errSubproducer = $this->validation->getmessage($validationError, 'categories_id');
        $errQuantity = $this->validation->getmessage($validationError, 'quantity');
        $errPrice = $this->validation->getmessage($validationError, 'price');
        $this->set('errName', $errName);
        $this->set('errSubproducer', $errSubproducer);
        $this->set('errQuantity', $errQuantity);
        $this->set('errPrice', $errPrice);
    }

    //function add image of product
    public function addimage($id = null) {
        $product = $this->products->get($id);
        $this->set('product', $product);
        if ($this->request->isPost()) {
            $req = $this->request->getData();
            $session = $this->request->getSession();
            if (isset($req['save'])) {
                $lstImg = $session->read('lstImg');
                if (count($lstImg) > 0) {
                    foreach ($lstImg as $name) {
                        $this->images->add(['name' => $name]);
                        $imgId = $this->images->selectImages($name)['id'];
                        $this->images->addProductImage(['products_id' => $id, 'images_id' => $imgId]);
                        copy('img/ram/' . $name, 'img/phone/' . $name);
                    }
                    $session->delete('lstImg');
                    $this->ajaxmanagers->removeAllImg();
                }
            }
            if (isset($req['removeall'])) {
                $session->delete('lstImg');
                $this->ajaxmanagers->removeAllImg();
            }
            var_dump($session->read('lstImg'));
        }
        $this->set('lstImg', $this->images->findProductImage(['products_id' => $id]));
        $this->set('imgAvatar', $this->images->findProductImage(['products_id' => $id, 'avatar' => True]));
    }

    public function editimage() {
        if ($this->request->isPost()) {
            $req = $this->request->getData();
            if (isset($req['setAvata']) and $req['selectedImg']) {
                $productImgId = array_pop($req['selectedImg']);
                $result = $this->images->editProductImage(['id' => $productImgId, 'avatar' => True]);
                if ($result == TRUE) {
                    $productImg = $this->images->getProductImage($productImgId);
                    $lstProductImg = $this->images->findProductImage(['products_id' => $productImg['products_id'], 'avatar' => True, 'id!=' => $productImgId]);
                    if (count($lstProductImg) > 0) {
                        foreach ($lstProductImg as $value) {
                            $this->images->editProductImage(['id' => $value['id'], 'avatar' => FALSE]);
                        }
                    }
                    return $this->redirect(['action' => 'addimage', $productImg['products_id']]);
                }
            }
        }
    }

    public function deleteimg($productImgId = null) {
        $this->autoRender = FALSE;
        $productImg = $this->images->getProductImage($productImgId);
        $result_delete_product_images = $this->images->deleteProductImage($productImgId);
        if ($result_delete_product_images === true) {
            $result_delete_images = $this->images->delete($productImg['images_id']);
            if ($result_delete_images === true) {
                return $this->redirect(['action' => 'addimage', $productImg['products_id']]);
            }
        }
    }
   
}
