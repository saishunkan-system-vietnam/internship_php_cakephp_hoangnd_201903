<?php

namespace Cake\View\Helper;

use Cake\View\Helper;


class SelectHelper extends Helper {

    public function initialize(array $config) {
        parent::initialize($config);
         //$this->loadComponent('productgroups');
    }

    public function groups() {
       $r=  $this->productgroups->getAllGroups();
       return count($r);
    }
}
