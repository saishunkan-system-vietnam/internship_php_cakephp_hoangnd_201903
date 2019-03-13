<?php
/**
 * Created by PhpStorm.
 * User: HoangND
 * Date: 2019/03/13
 * Time: 13:42
 */

namespace App\Controller;


class HomesController extends AppController
{
    public function index(){
        $this->autoRender=false;
        echo 'day là trang chu user';
//        $session=$this->getRequest()->getSession();
//        $session->destroy('username');
//        $session->destroy('roles');
//        $this->redirect('/login');
    }
}