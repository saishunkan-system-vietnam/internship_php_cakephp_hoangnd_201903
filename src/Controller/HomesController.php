<?php

namespace App\Controller;

use App\Controller\AppController;

class HomesController extends AppController {

    public $session;

    public function initialize() {
        parent::initialize();
        $this->session = $this->request->session();
        $this->loadModel('Users');
        $this->viewBuilder()->layout('homeLayout');
    }

    public function index() {
        $username = $this->session->read('username');
        $pass = $this->session->read('pass');
        if (empty($username) or empty($pass)) {
            return $this->redirect([
                        'controller' => 'Login',
                        'action' => 'index'
            ]);
        } else {
            $data = $this->Users->find('all')->where([
                'conditions'=>['username <>'=>$username]
            ])->toArray();
            $this->set('data', $data);
        }
    }

    public function edit($username = 'null') {
        $user = $this->Users->get($username);
        $this->set('user', $user);
        $role = $this->session->read('role');
        $newUser = $this->request->getData();
        if (count($newUser) > 0) {
            $addUser = $this->Users->get($newUser['username']);
            $addUser->role = $newUser['role'];
            $addUser->age = $newUser['age'];
            $addUser->name = $newUser['name'];
            $addUser->address = $newUser['address'];
            if ($role === false) {
                $this->Users->save($addUser);
                $this->redirect([
                    'action' => 'index'
                ]);
            } else {
                if ($addUser['role'] !== $newUser['role']) {
                    set('erro', 'Bạn không đủ quyền để thay đổi Role');
                }
            }
        }
    }

    public function logout() {
        $this->session->destroy();
        return $this->redirect([
                    'controller' => 'Login',
                    'action' => 'index'
        ]);
        $this->autoRender = false;
    }

    public function add() {
        
    }

}
