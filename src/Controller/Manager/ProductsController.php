<?php

namespace App\Controller\Manager;

use App\Controller\Manager\ManagersController;

class ProductsController extends ManagersController {

    protected $token;

    public function initialize() {
        parent::initialize();
        $this->loadComponent('validation');
        $this->loadComponent('categories');
        $this->loadComponent('products');
        $this->loadModel('Products');
        $this->loadComponent('images');
        $this->loadComponent('ajaxmanagers');
    }

    public function index() {
        $lstProduct = $this->products->selectAll();
        $this->set('lstProduct', $lstProduct);
    }

    public function add() {
        $option = $this->categories->getSelectOption();
        $this->set('option', $option);
        if ($this->request->isPost()) {
            $reqProduct = $this->request->getData();
            $validation = $this->Products->newEntity($reqProduct);
            $validationError = $validation->errors();
            if (empty($validationError)) {
                $result = $this->products->add($reqProduct);
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
            $result = $this->products->delete($id);
            if ($result === true) {
                $this->redirect(['action' => 'index']);
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
        $this->set('lstImg', $this->images->findProductImage($id));
    }

    public function deleteimgs($productImgId = null, $imageId = null, $productId = null) {
        
    }

    public function deleteimg($productImgId = null, $imageId = null, $productId = null) {
        $this->autoRender = FALSE;
        $result_delete_product_images = $this->images->deleteProductImage($productImgId);
        if ($result_delete_product_images === true) {
            var_dump($result_delete_product_images);
            $result_delete_images = $this->images->deleteImage($imageId);
            if ($result_delete_images === true) {
                var_dump($result_delete_images);
                return $this->redirect(['action' => 'addimage', $productId]);
            }
        }
    }

}
