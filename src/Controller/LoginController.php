<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginController
 *
 * @author HoangND
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Validation\Validator;

class LoginController extends AppController {

    public $session;

    public function initialize() {
        parent::initialize();
        $this->viewBuilder()->layout('loginLayout');
        $this->loadModel('Users');
        $this->session = $this->request->session();
    }

    public function index() {

        $data = $this->request->getData();
        if (count($data) > 0) {
            $getUser = $this->Users->find('all', [
                        'conditions' => ['username' => $data['username'],
                            'and' => [
                                'password' => $data['pass']
                            ]]
                    ])->toArray();
            if (count($getUser) > 0) {
                $this->session->write('username', $getUser[0]['username']);
                $this->session->write('pass', $getUser[0]['password']);
                $this->session->write('role', $getUser[0]['role']);
                return $this->redirect([
                            'controller' => 'Homes',
                            'action' => 'index'
                ]);
            } else {
                $this->set('thongbao', 'Tài khoản hoặc mật khẩu không chính xác');
            }
            $this->set('data', $data);
        }
        //INSERT DATA
        //cách 1
//         $usersObj=$this->Users->newEntity();
//         $usersObj->username="nguyenDinhHoang";
//         $usersObj->password="123";
//         $this->Users->Save($usersObj);
        //cách 2
//         $userObjQuery=  $this->Users->query();
//         $userObjQuery->insert(['username','password'])->values([
//             "username"=>"NguyenDinhHoang2",
//             "password"=>"1231232"
//         ])->execute();
        //SELECT DATA
//         $data=  $this->Users->find()->toArray();
//         $data=  $this->Users->find("all",[
//             //"conditions"=>['username'=>"NguyenDinhHoang"],
//             'limit'=>1,
//             'order'=>['username'=>'desc']
//         ])->toArray();
//         echo '<pre>';
//         var_dump($data);
        //UPDATE DATA
//         $data=  $this->Users->get('nguyendinhhoang2');
//         $data->password='456';
//         $this->Users->save($data);
//         
//         $data=  $this->Users->query();
//         $data->update()->set([
//             'password'=>'123456789'             
//         ])->where([
//             'username'=>'nguyendinhhoang2'
//         ])->execute();       
//         
//          echo '<pre>';
//         var_dump($data);
        //DELETE
//         $data=$this->Users->get('nguyendinhhoang');
//         $this->Users->delete($data);
//         $data=  $this->Users->query();
//         $data->delete()->where([
//             'username'=>'nguyendinhhoang'
//         ])->execute();
//         
//         $this->autoRender=FALSE;
    }

    public function testdatavalidate() {
        $this->autoRender = FALSE;
        $validator = new Validator;
        $req_data = [
            'username' => '',
            'password' => ''
        ];
    }

    public function login() {
        
    }

}
