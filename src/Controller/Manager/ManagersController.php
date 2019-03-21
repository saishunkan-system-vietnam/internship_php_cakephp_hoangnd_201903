<?php

namespace App\Controller\Manager;

use Cake\Controller\Controller;

class ManagersController extends Controller {

    private $session;

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


        if ($this->session->check('username') === false or $this->roles->checkRole($roles, 2) === FALSE) {
            $this->redirect('/login');
        }
       
        $this->loadComponent('Csrf'); 
        
    }  

    public function logout() {
        $this->autoRender=FALSE;
        $this->session->destroy('username');
        $this->session->destroy('roles');
        $this->redirect('/login');
    }

}
