<div class="container-fluid">
    <div class="col-md-2">
        <h3>Images product manager</h3> 
        <ul class="nav nav-pills nav-stacked">
            <li><?= $this->Html->link('Back products manager', ['action' => 'index'], ['class' => 'w3-bar-item w3-button']) ?></li>
        </ul>       
    </div>
    <div class="col-md-10">    
        <div class="panel panel-default">
            <div class="panel-heading">Information of product</div>
            <div class="panel-body">                  
                <table class="table">
                    <tr>
                        <td>
                            <p>ID: </p>
                        </td>
                        <td>
                            <?php echo '<p><strong> ' . $product['id'] . '</strong></p>'; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Name: </p>
                        </td>
                        <td>
                            <?php echo '<p><strong> ' . $product['name'] . '</strong></p>'; ?>
                        </td>
                    </tr>       
                    <tr>
                        <td>
                            <p>Price: </p>
                        </td>
                        <td>
                            <?php echo '<p><strong> ' . number_format($product['price']) . ' vnd</strong></p>'; ?>
                        </td>
                    </tr>  
                    <tr>
                        <td>
                            <p>Quantity: </p>
                        </td>
                        <td>
                            <?php echo '<p><strong> ' . $product['quantity'] . '</strong></p>'; ?>
                        </td>
                    </tr>                            
                </table>
                
                <div class="form-group">
                    <?= $this->Form->file('addimg', ['class' => 'btn']) ?>                    
                </div>    
                <div class="form-group">
                    <?= $this->Form->button('save', ['class' => 'btn btn-primary','name'=>'save']) ?>
                </div> 
                <?= $this->Form->create('', ['type' => 'file', 'class' => 'form-inline']) ?>
                <div class="form-group">                     
                    <?= $this->Form->submit('remove all', ['class' => 'btn btn-danger','name'=>'removeall']) ?>
                </div> 
                <?= $this->Form->end() ?>     
                <div id="img">
                            
                </div>
            </div>
        </div>
         <div class="panel panel-default">
            <div class="panel-heading">List images of product</div>
            <div class="panel-body">     
            </div>
        </div>
    </div>
    <?= $this->Html->script('productsmanager') ?>
