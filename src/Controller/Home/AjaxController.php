<?php

namespace App\Controller\Home;

use App\Controller\AppController;

class AjaxController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->viewBuilder()->disableAutoLayout();
    }

}
