
<!DOCTYPE html>
<html lang="en">
    <head>
	<?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
        <?= $this->fetch('title') ?>
        </title>
    <?= $this->Html->meta('icon') ?>
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <!--===============================================================================================-->
	<?= $this->Html->css('../vendor/daterangepicker/daterangepicker.css') ?>
        <!--===============================================================================================-->
	 <?= $this->Html->css('../font/font-awesome-4.7.0/css/font-awesome.min.css') ?>
        <!--===============================================================================================-->
        <?= $this->Html->css('../font/Linearicons-Free-v1.0.0/icon-font.min.css') ?>
        <!--===============================================================================================-->
	 <?= $this->Html->css('../vendor/animate/animate.css') ?>
        <!--===============================================================================================-->
        <?= $this->Html->css('../vendor/css-hamburgers/hamburgers.min.css') ?>
        <!--===============================================================================================-->
        <?= $this->Html->css('../vendor/animsition/css/animsition.min.css') ?>
        <!--===============================================================================================-->
        <?= $this->Html->css('../vendor/select2/select2.min.css') ?>
        <!--===============================================================================================-->	
        <?= $this->Html->css('../vendor/daterangepicker/daterangepicker.css') ?>
        <!--===============================================================================================-->
        <?= $this->Html->css('login/util.css') ?>
        <?= $this->Html->css('login/main.css') ?>
        <!--===============================================================================================-->
    </head>
    <body>

        <div class="limiter">
            <div class="container-login100" style="background-image: url('img/bg-01.jpg');">
                <div class="wrap-login100 p-t-30 p-b-50">
                    <span class="login100-form-title p-b-41">
                        Account Login
                    </span>
                    <?= $this->Flash->render() ?>
                    <div class="container clearfix">
                    <?= $this->fetch('content') ?>
                    </div>
                    <!--                    <form class="login100-form validate-form p-b-33 p-t-5">
                    
                                            <div class="wrap-input100 validate-input" data-validate = "Enter username">
                                                <input class="input100" type="text" name="username" placeholder="User name">
                                                <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                                            </div>
                    
                                            <div class="wrap-input100 validate-input" data-validate="Enter password">
                                                <input class="input100" type="password" name="pass" placeholder="Password">
                                                <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                                            </div>
                    
                                            <div class="container-login100-form-btn m-t-32">
                                                <button class="login100-form-btn">
                                                    Login
                                                </button>
                                            </div>
                    
                                        </form>-->
                </div>
            </div>
        </div>


        <div id="dropDownSelect1"></div>

        <!--===============================================================================================-->
         <?= $this->Html->script('../vendor/jquery/jquery-3.2.1.min.js') ?>
        <!--===============================================================================================-->
<?= $this->Html->script('../vendor/animsition/js/animsition.min.js') ?>
        <!--===============================================================================================-->
<?= $this->Html->script('../vendor/bootstrap/js/popper.js') ?>
<?= $this->Html->script('../vendor/bootstrap/js/bootstrap.min.js') ?>
        <!--===============================================================================================-->
<?= $this->Html->script('../vendor/select2/select2.min.js') ?>
        <!--===============================================================================================-->
<?= $this->Html->script('../vendor/daterangepicker/moment.min.js') ?>
<?= $this->Html->script('../vendor/daterangepicker/daterangepicker.js') ?>
        <!--===============================================================================================-->	
        <?= $this->Html->script('../vendor/countdowntime/countdowntime.js') ?>
        <!--===============================================================================================-->
        <?= $this->Html->script('main.js') ?>

    </body>
</html>