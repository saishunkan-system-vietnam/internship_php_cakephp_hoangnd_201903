<?php

namespace App\Controller\Manager;

use Cake\Controller\Controller;

class ManagersController extends Controller {

    protected $session;

    public function initialize() {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('roles');
        $this->viewBuilder()->setLayout('managerLayout');

        $this->session = $this->request->getSession();
        $roles = $this->session->read('roles');


        if ($this->session->check('usernameId') === false or $this->roles->checkRole($roles, 2) === FALSE) {
            $this->redirect('/home/login');
        }
        $username = ($this->session->check('username') == true) ? $this->session->read('username') : '';
        $this->set('username', $username);
        $this->loadComponent('Csrf');
    }

}
