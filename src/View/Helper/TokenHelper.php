<?php

namespace Cake\View\Helper;

use Cake\View\Helper;

class TokenHelper extends Helper {

    public function getToken() {
        $token = $this->request->getParam('_csrfToken');
        return $token;
    }
}
