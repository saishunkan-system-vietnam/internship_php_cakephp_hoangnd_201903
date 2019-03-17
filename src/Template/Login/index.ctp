
<div class="login_fail">
    <?=$this->Flash->render()?>
</div>
<div class="form">
    <?=$this->Form->create();?>
    <?=$this->Form->control('username',['label'=>'Username:'])?>
    <?=$this->Form->control('password',['label'=>'Password:'])?>
    <?=$this->Form->control('Login',['type'=>'submit'])?>   
    <?=$this->Form->end();?> <br>
    <?=$this->Html->link('Registration here',['controller'=>'Registration','action'=>'index'])?>
</div>
