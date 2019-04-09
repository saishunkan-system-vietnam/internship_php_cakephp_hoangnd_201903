<?= $this->Html->css("Manager/specification.css") ?>
<div class="container-fluid">
    <div class="col-md-2">
        <h3>Add product options</h3> 
        <ul class="nav nav-pills nav-stacked">
            <li><?= $this->Html->link('Back specification manager', ['action' => 'index'], ['class' => 'w3-bar-item w3-button']) ?></li>
        </ul>       
    </div>
    <?php
    if (isset($lstProduct)) {
        ?>
        <div class="col-md-10">    
            <div class="panel panel-default">
                <div class="panel-heading">List products</div>
                <div class="panel-body">
                    <div class="form-group">    
                        <div class="input-group">
                            <?= $this->Form->text('name', ['class' => 'form-control', 'placeholder' => 'Enter product name or ID search...']) ?>
                            <span class="input-group-btn">
                                <?= $this->Form->submit('search', ['class' => 'btn btn-primary']) ?>                        
                            </span>
                        </div><!-- /input-group -->    
                    </div>                
                    <p><strong>List products:</strong></p>

                    <table class="table table-bordered">
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Name product
                            </th>
                            <th>
                                Price
                            </th>
                            <th>
                                Quantity
                            </th>                                           
                            <th>
                                Categories
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                        <?php
                        if (count($lstProduct) > 0) {
                            foreach ($lstProduct as $key => $item) {
                                ?>
                                <tr>
                                    <td>
                                        <?= $item['id'] ?>
                                    </td>
                                    <td>
                                        <?= $item['name'] ?>
                                    </td>
                                    <td>
                                        <?= number_format($item['price']) ?>
                                    </td>
                                    <td>
                                        <?= $item['quantity'] ?>
                                    </td>
                                    <td>
                                        <?= $item['Categories']['name'] ?>
                                    </td>
                                    <td>
                                        <?= $this->Html->link('Add options', ['action' => 'addProductOption', $item['id']]) ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </table>

                </div>
            </div>
        </div> 
        <div class="col-md-2">

        </div>
    <?php } else { ?>
        <div class="col-md-10">    
            <div class="panel panel-default">
                <div class="panel-heading">Add products</div>
                <div class="panel-body">
                    <p><strong>Product:</strong></p>
                    <table class="table">
                        <tr>
                            <td>
                                <p>ID: </p>
                            </td>
                            <td>
                                <?php
                                if (isset($product['id'])) {
                                    echo '<p><strong> ' . $product['id'] . '</strong></p>';
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Name: </p>
                            </td>
                            <td>
                                <?php
                                if (isset($product['name'])) {
                                    echo '<p><strong> ' . $product['name'] . '</strong></p>';
                                }
                                ?>
                            </td>
                        </tr>            
                    </table>
                    <p><strong>Options:</strong></p>
                    <?=$this->Form->create()?>
                    <?php
                    if (isset($lstSpecification) and count($lstSpecification) > 0) {
                        $dem = 0;
                        foreach ($lstSpecification as$key=> $item) {
                            ?>
                            <div class="col-md-3">
                                <strong><?= $item['name'] ?></strong> : <?=$this->Form->select($item['id'],$option[$key])?>                           
                            </div>  
                            <?php
                        }
                    }
                    ?>
                    <div class="col-md-12"><?=$this->Form->submit('Add',['class'=>'btn btn-primary', 'name'=>'add'])?></div>
                     <?=$this->Form->end()?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
