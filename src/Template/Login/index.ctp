<?=$this->Form->create('',array('class'=>'login100-form validate-form p-b-33 p-t-5'));?>

<div  class="wrap-input100 validate-input" data-validate = "Enter username">
    <input value="<?php if(isset($data)) echo $data['username'];?>" class="input100" type="text" name="username" placeholder="Enter username">
    <span class="focus-input100" data-placeholder="&#xe82a;"></span>
</div>

<div class="wrap-input100 validate-input" data-validate="Enter password">
    <input  class="input100" type="password" name="pass" placeholder="Enter password">
    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
</div>
<div><p style="color: red;font-size: 18px;text-align: center"><?php if(isset($thongbao)) echo $thongbao;?></p></div>
<div class="container-login100-form-btn m-t-32">
    <button type="submit" class="login100-form-btn">
        Login
    </button>
</div>

<?=$this->Form->end();?>