<div class="form">    
    <?=$this->Form->create()?>
    <?=$this->Form->control('username',['label'=>'Username:'])?>
    <?=$this->Form->control('name',['label'=>'Name:'])?>
    <?=$this->Form->control('sex',['label'=>'Sex:'])?>
    <?=$this->Form->control('birthday',['label'=>'Birth day:','type'=>'date'])?>
    <?=$this->Form->control('phonenumber',['label'=>'Phone number:'])?>
    <?=$this->Form->control('address',['label'=>'Address:'])?>
    <?=$this->Form->control('password',['label'=>'Password:'])?>
    <?=$this->Form->control('password',['label'=>'Enter password again:','name'=>'passwordAgain' ,'id'=>'passwordAgain'])?>
    <?=$this->Form->control('Registration',['type'=>'submit'])?><br>
    <?=$this->Html->link('Login here',['controller'=>'Login','action'=>'index'])?>
    <?=$this->Form->end()?>
</div>