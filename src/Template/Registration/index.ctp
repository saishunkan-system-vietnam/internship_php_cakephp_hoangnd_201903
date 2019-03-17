<div class="login_fail">
    <?=$this->Flash->render()?>
</div>
<div class="form">   
    <?=$this->Form->create()?>
    <?=$this->Form->control('username',['label'=>'Username:'])?>
    <?=$this->Form->control('name',['label'=>'Name:'])?>
    <?=$this->element('SexElement')?>
    <div class="select_date">
    <?=$this->Form->control('birthday',['label'=>'Birth day:','type'=>'date','minYear'=>'1900','monthNames'=>false])?>
    </div>
    <?=$this->Form->control('phonenumber',['label'=>'Phone number:'])?>
    <?=$this->Form->control('address',['label'=>'Address:'])?>
    <?=$this->Form->control('password',['label'=>'Password:'])?>
    <?=$this->Form->control('password',['label'=>'Enter password again:','name'=>'passwordAgain' ,'id'=>'passwordAgain'])?>
    <?=$this->Form->control('Registration',['type'=>'submit'])?><br>
    <?=$this->Html->link('Login here',['controller'=>'Login','action'=>'index'])?>
    <?=$this->Form->end()?>
</div>
