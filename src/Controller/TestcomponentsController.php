<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TestcomponentsController
 *
 * @author HoangND
 */
namespace App\Controller;

class TestcomponentsController extends AppController {

    public $components = array('Data');

    function test1() {
        $data = $this->Data->randd(6); //Sử dụng function randd(6),randdom 6 số
        $this->set("data", $data);
    }

}
