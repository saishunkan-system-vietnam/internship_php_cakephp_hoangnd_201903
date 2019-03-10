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
        $this->viewBuilder()->setLayout('loginLayout');
        $this->loadModel('Users');
        $this->session = $this->request->session();
    }

    public function index() {
        $this->set('title','a');

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
