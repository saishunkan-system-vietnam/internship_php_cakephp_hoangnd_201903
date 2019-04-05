<?php
namespace App\Controller\Home;

use App\Controller\Home\HomesController;
use Cake\ORM\TableRegistry;

class LoginController extends HomesController {

    public $session;

    public function initialize() {
        parent::initialize();
        $this->loadComponent('roles');
        $this->loadModel('Users');
        $this->loadComponent('validation');
    }

    public function index() {       
        if ($this->request->isPost()) {
            $reqUser = $this->request->getData();
            $validation = $this->Users->newEntity($reqUser);
            $validationError = $validation->errors();
            if (empty($validationError)) {
                $passwordMd5 = md5($reqUser['password']);
                $userTable = TableRegistry::getTableLocator()->get('Users');
                $getUser = $userTable->find('all', [
                            'conditions' => [
                                'username' => $reqUser['username'],
                                'and' => ['password' => $passwordMd5]
                            ]
                        ])->first();                
                if (count($getUser) > 0) {
                    $roleTable = TableRegistry::getTableLocator()->get('Roles');
                    $getRole = $roleTable->find('all', [
                                'conditions' => ['users_id' => $getUser['id']]
                            ])->toArray();
                    $this->session->write('usernameId', $getUser['id']);
                    $this->session->write('username', $getUser['username']);
                    $this->session->write('roles', $getRole);
                    $loginSystem = $this->roles->checkRole($getRole, 2);
                    if ($loginSystem === TRUE) {
                        return $this->redirect('/manager');
                    } else {
                        return $this->redirect(['controller'=>'Users']);
                    }
                    $this->Flash->success('Login Successful');
                } else {
                    $this->Flash->error('Tài khoản hoặc mật khẩu không chính xác');
                }
            } else {
                $this->Flash->error($this->validation->getmessage($validationError));
            }
        }
    }

}
