<?php

/**
 * Created by PhpStorm.
 * User: HoangND
 * Date: 2019/03/13
 * Time: 16:20
 */

namespace App\Controller;

class AjaxController extends AppController {

    public function initialize() {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->viewBuilder()->disableAutoLayout();
        $this->loadModel('Chitietloaihang');
        $this->loadModel('Loaihang');
        $this->loadModel('Mathang');
    }

    public function getlstchitietloaihang() {
//        if ($this->request->is('ajax')) {
//            $loaiHang_id = $this->request->getData('loaihang_id');
//            $tenLoaiHang = $this->Loaihang->get($loaiHang_id)['tenloaihang'];
//            $lstLoaiHang = $this->Chitietloaihang->find('all', [
//                        'conditions' => ['loaihang_id' => $loaiHang_id]
//                    ])->toArray();
//
//            $this->set('tenLoaiHang', $tenLoaiHang);
//            $this->set('lstLoaiHang', $lstLoaiHang);
//        }
    }

    public function deletemathang() {
        $this->autoRender = FALSE;
        if ($this->request->is('ajax')) {
//            $mathangid = $this->request->getData('mathang_id');
//            $mathang = $this->Mathang->get($mathangid);
//            $this->Mathang->delete($mathang);
        }
    }

}
