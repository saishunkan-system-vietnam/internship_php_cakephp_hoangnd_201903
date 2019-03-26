<?php

namespace App\Controller\Manager;

use App\Controller\AppController;

class AjaxController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->viewBuilder()->disableAutoLayout();
        $this->loadComponent('categories');
        $this->loadComponent('ajaxmanagers');
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

}
