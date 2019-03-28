<div class="login_fail">
    <?=$this->Flash->render()?>
</div>
<div class="form">   
    <?=$this->Form->create()?>
    <?=$this->Form->control('username',['label'=>'Username:','class'=>'form-control'])?>
    <?=$this->Form->control('name',['label'=>'Name:','class'=>'form-control'])?>
    <?=$this->element('SexElement')?>
    <div class="select_date">
    <?=$this->Form->control('birthday',['label'=>'Birth day:','type'=>'date','minYear'=>'1900','monthNames'=>false])?>
    </div>
    <?=$this->Form->control('phonenumber',['label'=>'Phone number:','class'=>'form-control'])?>
    <?=$this->Form->control('address',['label'=>'Address:','class'=>'form-control'])?>
    <?=$this->Form->control('password',['label'=>'Password:','class'=>'form-control'])?>
    <?=$this->Form->control('password',['label'=>'Enter password again:','name'=>'passwordAgain' ,'id'=>'passwordAgain','class'=>'form-control'])?><br>
    <?=$this->Form->control('Registration',['type'=>'submit','class'=>'btn btn-primary'])?><br>
    <?=$this->Html->link('Login here',['controller'=>'Login','action'=>'index'])?>
    <?=$this->Form->end()?>
</div>
