<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrfToken" content="<?php echo $this->Token->getToken(); ?>"> 
        <title>

            <?= $title ?>
        </title>
        <?= $this->Html->meta('icon') ?>
        <?= $this->Html->script('jquery-3.3.1.min.js') ?>
        <?= $this->Html->css('bootstrap.min.css') ?>    
        <?= $this->Html->css('fronend.css') ?>    
        <?= $this->Html->css('login.css') ?> 
        <?= $this->Html->css('Home/home.css') ?>
        <?= $this->Html->css('homepage.css') ?>
        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body style="padding: 60px 0px; background-color: #F0F0F0;">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?=$this->Url->build(['controller'=>'Products','action'=>'index'])?>">Phone HoangND</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><div >
                                <?= $this->Form->create('Products', ['url' => ['controller' => 'Products', 'action' => 'index'], 'type' => 'get']) ?>
                                <?php $key = (isset($key)) ? $key : '';
                                echo $this->Form->text('key', ['class' => 'form-search', 'id' => 'txt-search', 'value' => $key])
                                ?>
                                <input id="btn-search" class="form-search" value="search" type="submit">
                                <?= $this->Form->end() ?>
                            </div></li> 
                        <li><?= $this->Html->link('Phone', ['controller' => 'Products', 'action' => 'index']) ?></li>         
                        <li><a href="<?= $this->Url->build(['controller' => 'Order', 'action' => 'index'], ['id' => 'cart']) ?>">Cart(<?php
                                if (isset($quantity)) {
                                    echo $quantity;
                                } else {
                                    echo '0';
                                }
                                ?>)</a></li>
                         <li><?= $this->Html->link('Invoice', ['controller' => 'Invoice', 'action' => 'index']) ?></li> 
                        <li><?php
                            if ($username == '') {
                                echo $this->Html->link('Login', ['controller' => 'Login', 'action' => 'index']);
                            } else {
                                echo $this->Html->link($username, ['controller' => 'Users', 'action' => 'index']);
                            }
                            ?></li>
                               
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

<!--<script type="text/javascript">
    $(document).on('click', 'input[name="sbSearch"]', function () {
        window.location.replace("<?= $this->Url->build(['controller' => 'Products', 'action' => 'index']) ?>");
        var conten = $('input[name="search"]').val();
        if (conten !== "") {
            $.ajax({
                headers: {'X-CSRF-Token': $('meta[name="csrfToken"]').attr('content')},
                method: 'post',
                url: "<?= $this->Url->build(['controller' => 'Ajax', 'action' => 'searchproduct']) ?>",
                data: {searchName: conten}
            }).done(function (rp) {
                $('#lstProducts').html(rp);
            });
        }
    });
</script>-->
