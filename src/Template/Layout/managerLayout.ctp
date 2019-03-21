<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
    <head>
<?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrfToken" content="<?= $this->Token->getToken() ?>"> 
        <title>

<?= $this->fetch('title') ?>
        </title>
            <?= $this->Html->meta('icon') ?>
            <?= $this->Html->script('jquery-3.3.1.min.js') ?>
        <?= $this->Html->css('bootstrap.min.css') ?>    

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body style="padding: 70px 0px">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
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
                        <li class="active"><?= $this->Html->link('Home', ['controller' => 'Homes', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link('Phone manager', ['controller' => 'Products', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link('Category manager', ['controller' => 'Categories', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link('Group phone manager', ['controller' => 'ProductGroups', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link('Images manager', ['controller' => 'Images', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link('Logout', ['controller' => 'Managers', 'action' => 'logout']) ?></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container-fluid">
<?= $this->fetch('content') ?>
        </div><!-- /.container -->           
            <?= $this->Html->script('bootstrap.min.js') ?>
    </body>
</html>
