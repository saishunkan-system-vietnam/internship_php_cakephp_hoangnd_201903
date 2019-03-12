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
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

class LoginController extends AppController {
    public $session;
    public function initialize() {
        parent::initialize();
        $this->viewBuilder()->setLayout('loginLayout');
        $this->session=$this->getRequest()->getSession();
    }

    public function index() {

        if($this->request->isPost()){
         $reqUser=$this->request->getData();
         $passwordMd5=md5($reqUser['password']);
         $userTable=TableRegistry::getTableLocator()->get('Users');
         $getUser=$userTable->find('all',[
             'conditions'=>[
                 'username'=>$reqUser['username'],
                 'and'=>['password'=>$passwordMd5]
             ]
         ])->first();
         if(count($getUser)>0){
             $roleTable=TableRegistry::getTableLocator()->get('Roles');
             $getRole=$roleTable->find('all',[
                 'conditions'=>['users_id'=>$getUser['id']]
             ])->toArray();
             $this->session->write('username',$getUser['username']);
             $this->session->write('roles',$getRole);
             $this->redirect('/home');
         }else{
             $this->set('loginFail','Tài khoản hoặc mật khẩu không chính xác');
         }
        }
    }
}
