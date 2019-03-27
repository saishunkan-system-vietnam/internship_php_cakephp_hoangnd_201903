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
                <div class="col-md-2">
                    <?php if(isset($imgAvatar)){
                        if(count($imgAvatar)>0){
                            $imgAvatar=  array_pop($imgAvatar);
                        echo $this->Html->image('/img/phone/' . $imgAvatar['Images']['name'], ['alt' => $imgAvatar['Images']['name'], 'width' => '100%']);
                        }
                    }?>
                </div>
                <div class="col-md-10">
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
                </div>               
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Add images product</div>
            <div class="panel-body">   
                <?= $this->Form->create('', ['type' => 'file', 'class' => 'form-inline']) ?>
                <div class="form-group">
                    <?= $this->Form->file('addimg', ['class' => 'btn', 'accept' => 'image/*', 'multiple']) ?>                    
                </div>    
                <div class="form-group">
                    <?= $this->Form->submit('save', ['class' => 'btn btn-primary', 'name' => 'save']) ?>
                </div> 
                <div class="form-group">   
                    <?= $this->Form->submit('remove all', ['class' => 'btn btn-danger', 'name' => 'removeall', 'type' => 'submit']) ?>
                </div> 
                <?= $this->Form->end() ?>     
                <div id="img">

                </div>

            </div>
        </div>
        <div class="panel panel-default">            
            <div class="panel-heading">List images of product</div>
            <?= $this->Form->create(null, ['action' => 'editimage']) ?>           
            <div class="form-group">   
                <?= $this->Form->submit('Set avatar', ['class' => 'btn btn-primary','name'=>'setAvata']) ?>
            </div> 
             <div class="form-group">
                <?= $this->Form->submit('Delete', ['class' => 'btn btn-danger','name'=>'deleteImages']) ?>
            </div> 
             <div class="form-group">
                <?= $this->Form->submit('Enable/Disable', ['class' => 'btn btn-primary','name'=>'EnDisable']) ?>
            </div> 
            <div class="panel-body">   
                <?php
                if (isset($lstImg)) {
                    if (count($lstImg)) {
                        foreach ($lstImg as $item) {
                            echo '<div class="col-md-2">'
                            . $this->Html->link('X', ['action' => 'deleteimg', $item['id']], ['id' => 'remove', 'class' => 'delete-img', 'confirm' => 'Delete Image???'])
                            . '<br>' . $this->Form->checkbox('selectedImg[]', ['value' => $item['id'],'hiddenField'=>FALSE])
                            . $this->Html->image('/img/phone/' . $item['Images']['name'], ['alt' => $item['Images']['name'], 'width' => '100%'])
                            . ' </div>';
                        }
                    }
                }
                ?>

            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <?= $this->Html->script('productsmanager') ?>
