<?php

namespace App\Controller\Manager;

use App\Controller\AppController;

class AjaxController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->viewBuilder()->disableAutoLayout();
        $this->loadComponent('categories');
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
            if (isset($req['file']['name'])) {
                if ($req['add'] === '') {
                    if ($session->check('lstImg') === true) {
                        $session->delete('lstImg');
                        $files = scandir(WWW_ROOT . 'img\ram\\');
                        foreach ($files as $item) {
                            if ($item !== '.' and $item !== '..') {
                                unlink(WWW_ROOT . 'img\ram\\' . $item);
                            }
                        }
                    }
                }
                $lstImg = ($session->check('lstImg') === true) ? $session->read('lstImg') : [];
                $checkItem = FALSE;
                if (count($lstImg) > 0) {
                    foreach ($lstImg as $item) {
                        if ($item['name'] === $req['file']['name']) {
                            $checkItem = true;
                            break;
                        }
                    }
                }
                if ($checkItem === FALSE) {
                    if (!file_exists('img/ram/' . $req['file']['name'])) {
                        if ($req['file']['error'] == 0) {
                            var_dump($req['file']['tmp_name']);
                             var_dump($req['file']['name']);
                            move_uploaded_file($req['file']['tmp_name'], 'img/ram/' . $req['file']['name']);
                        }
                    }
                    $img = array_merge($lstImg, [['name' => $req['file']['name'], 'tmp_name' => $req['file']['tmp_name']]]);
                } else {
                    $img = $lstImg;
                }

                $session->write('lstImg', $img);
            }
            $this->set('lstImg', $session->read('lstImg'));
        }
    }

    function removeimageinram() {
        $this->autoRender = FALSE;
        if ($this->request->is('ajax')) {
            $req = $this->request->getData();
            $session = $this->request->getSession();
            $imgName = $req['imgName'];
            $lstImg = $session->read('lstImg');
            foreach ($lstImg as $key => $item) {
                if ($item['name'] === $imgName) {
                    unset($lstImg[$key]);
                    unlink(WWW_ROOT . 'img\ram\\' . $item['name']);
                }
            }
            $session->write('lstImg', $lstImg);
        }
    }
    function saveimages(){
         $this->autoRender = FALSE;
        if ($this->request->is('ajax')) {            
            $session = $this->request->getSession();          
            $lstImg = $session->read('lstImg');
            var_dump(move_uploaded_file($lstImg[0]['tmp_name'], 'img/phone/' . $lstImg[0]['name']));
            var_dump($lstImg[0]['tmp_name']);
            var_dump($lstImg[0]['name']);
        }
    }

}
