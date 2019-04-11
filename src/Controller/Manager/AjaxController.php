<?php

namespace App\Controller\Manager;

use App\Controller\AppController;

class AjaxController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->viewBuilder()->disableAutoLayout();
        $this->loadComponent('categories');
        $this->loadComponent('products');
        $this->loadComponent('ajaxmanagers');
        $this->loadComponent('productgroups');
        $this->loadComponent('specifications');
        $this->loadComponent('productspecifications');
    }

    function getsubproducer() {
        if ($this->request->is('ajax')) {
            $req = $this->request->getData();
            $subOption = $this->categories->getSubSelectOption($req['producer_id']);
            $this->set('subOption', $subOption);
        }
    }

    function saveimagesinram() {
        if ($this->request->is('ajax')) {
            $req = $this->request->getData();
            $session = $this->request->getSession();
            if ($req['add'] === '') {
                $session->delete('lstImg');
                $this->ajaxmanagers->removeAllImg();
            }
            if (isset($req['file'])) {
                $reqLstImg = $req['file'];
                $lstImg = ($session->check('lstImg') === true) ? $session->read('lstImg') : [];
                foreach ($reqLstImg as $item) {
                    $nameArray = explode('.', $item['name']);
                    $extension = array_pop($nameArray);
                    $randName = $this->randName();
                    $name = $randName . '.' . $extension;
                    if ($item['error'] == 0) {
                        move_uploaded_file($item['tmp_name'], 'img/ram/' . $name);
                    }
                    array_push($lstImg, $name);
                }
                $session->write('lstImg', $lstImg);
                $this->set('lstImg', $session->read('lstImg'));
            }
        }
    }

    function removeimageinram() {
        $this->autoRender = FALSE;
        if ($this->request->is('ajax')) {
            $req = $this->request->getData();
            $session = $this->request->getSession();
            $imgName = $req['imgName'];
            $lstImg = $session->read('lstImg');
            foreach ($lstImg as $key => $name) {
                if ($name === $imgName) {
                    unset($lstImg[$key]);
                    $this->ajaxmanagers->removeImg($imgName);
                }
            }
            $session->write('lstImg', $lstImg);
        }
    }

    function randName() {
        $randNameImg = '';
        for ($i = 0; $i < 30; $i++) {
            $randNameImg.=rand(0, 9);
        }
        return $randNameImg;
    }

    function getproductgroup() {
        if ($this->request->is('ajax')) {
            $req = $this->request->getData();
            $lstProduct = $this->products->selectAll(['subproducer_id' => $req['subproducer_id']]);
            $arrGroup = [];
            foreach ($lstProduct as $key => $value) {
                $productGroup = $this->productgroups->selectProductGroups(['groups_id' => $req['groups_id'], 'products_id' => $value['id']]);
                $arrGroup[$key] = (count($productGroup) > 0) ? 1 : 0;
            }
            $this->set('arrGroup', $arrGroup);
            $this->set('lstProduct', $lstProduct);
        }
    }

    function getoptiondetails() {
        if ($this->request->is('ajax')) {
            $req = $this->request->getData();
            $lstOption = $this->specifications->where(['parent_id' => $req['parent_id']]);
            $this->set('lstOption', $lstOption);
        }
    }

    function removeoption() {
        $this->autoRender = FALSE;
        if ($this->request->is('ajax')) {
            $req = $this->request->getData();
            $this->productspecifications->delete(['products_id'=>$req['products_id'],'options'=>$req['options']]);
        }
    }

}
