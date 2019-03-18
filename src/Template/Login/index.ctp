
<div class="login_fail">
    <?=$this->Flash->render()?>
</div>
<div class="form">
    <?=$this->Form->create();?>
    <?=$this->Form->control('username',['label'=>'Username:','class'=>'form-control'])?>
    <?=$this->Form->control('password',['label'=>'Password:','class'=>'form-control'])?><br>
    <?=$this->Form->control('Login',['type'=>'submit','class'=>'btn btn-primary btn-md'])?>   
    <?=$this->Form->end();?> <br>
    <?=$this->Html->link('Registration here',['controller'=>'Registration','action'=>'index'])?>
</div>
