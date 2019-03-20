<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of getmessvalidationComponent
 *
 * @author HoangND
 */

namespace App\Controller\Component;

use Cake\Controller\Component;

class validationComponent extends Component {

    public function getmessage($validation, $name = NULL) {
        foreach ($validation as $key => $value) {
            if ($name != NULL & $key == $name) {               
                foreach ($value as $v) {
                    return $v;
                }
                return;
            } 
            foreach ($value as $v) {
                return $v;
            }
        }
    }

}
