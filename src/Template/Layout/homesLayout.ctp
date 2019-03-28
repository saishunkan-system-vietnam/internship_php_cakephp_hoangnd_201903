<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrfToken" content="<?php echo $this->Token->getToken(); ?>"> 
        <title>

            <?= $this->fetch('title') ?>
        </title>
        <?= $this->Html->meta('icon') ?>
        <?= $this->Html->script('jquery-3.3.1.min.js') ?>
        <?= $this->Html->css('bootstrap.min.css') ?>    
        <?= $this->Html->css('fronend.css') ?>    
        <?= $this->Html->css('login.css') ?>    
        <?= $this->Html->css('homepage.css') ?>
        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body style="padding: 70px 0px">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Phone HoangND</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><?= $this->Html->link('Home', ['controller' => 'Products', 'action' => 'index']) ?></li>         
                        <li><a href="<?= $this->Url->build(['controller' => 'Order', 'action' => 'index']) ?>">Cart(<?php if (isset($quantity)) {
            echo $quantity;
        } else {
            echo '0';
        } ?>)</a></li>
                        <li><?= $this->Html->link('Login', ['controller' => 'Login', 'action' => 'index']) ?></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container">
<?= $this->fetch('content') ?>
        </div><!-- /.container -->           
<?= $this->Html->script('bootstrap.min.js') ?>
    </body>
</html>

