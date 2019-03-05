<?= __('Actions') ?>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of test
 *
 * @author HoangND
 */

echo $this->Form->create('',array('type'=>'post','action'=>'/sessions'));
echo $this->Form->input('Username:',array('type'=>'text','name'=>'Username'));
echo $this->Form->input('Passworld:',array('type'=>'password','name'=>'Passworld'));
echo $this->Form->submit();


echo $this->Form->end();