<?php

namespace App\Controller\Home;

use Cake\Controller\Controller;

class LogedController extends Controller {

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

        
        if ($this->session->check('username') === false) {
            $url= \Cake\Routing\Router::url(null,FALSE);
            $this->session->write('tmp_url',$url);
            $this->redirect(['controller'=>'Login','action'=>'index']);
        }

        $this->loadComponent('Csrf');
    }

    public function logout() {
        $this->autoRender = FALSE;
        $this->session->destroy('username');
        $this->session->destroy('roles');
        $this->redirect('login');
    }

}
