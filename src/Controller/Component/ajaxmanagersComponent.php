<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

class ajaxmanagersComponent extends Component {

    public function removeAllImg() {
        $files = scandir(WWW_ROOT . 'img\ram\\');
        foreach ($files as $item) {
            if ($item !== '.' and $item !== '..') {
                unlink(WWW_ROOT . 'img\ram\\' . $item);
            }
        }
    }

    public function removeImg($name) {
        unlink(WWW_ROOT . 'img\ram\\' . $name);
    }

}
