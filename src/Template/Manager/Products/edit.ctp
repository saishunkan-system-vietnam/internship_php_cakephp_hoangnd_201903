<?= $this->Html->script('ckeditor/ckeditor.js') ?>
<?= $this->Html->css('Manager/products.css') ?>
<div class="container-fluid">
    <div class="col-md-2">
        <h3>Add category</h3> 
        <ul class="nav nav-pills nav-stacked">
            <li><?= $this->Html->link('Back products manager', ['action' => 'index'], ['class' => 'w3-bar-item w3-button']) ?></li>
        </ul>       
    </div>
    <div class="col-md-10">      
        <div class="panel panel-default">
            <div class="panel-heading">Add producer</div>
            <div class="panel-body">
                <?= $this->Form->create(null, ['onsubmit' => 'return validateForm()', "name" => 'frmProduct']) ?>
                <div class="form-group">
                    <?= $this->Form->label('name', 'Name product:') ?>
                    <?= $this->Form->text('name', ['class' => 'form-control', 'placeholder' => 'Enter producer name...', 'value' => $product['name']]) ?>      
                    <?php
                    if (isset($errName)) {
                        echo '<div class="error-contents">' . $errName . '</div>';
                    }
                    ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->label('quantity', 'Quantity:') ?>
                    <?= $this->Form->text('quantity', ['class' => 'form-control', 'type' => 'number', 'value' => 0, 'value' => $product['quantity']]) ?>      
                    <?php
                    if (isset($errQuantity)) {
                        echo '<div class="error-contents">' . $errQuantity . '</div>';
                    }
                    ?>
                </div>   
                <div class="form-group">
                    <?= $this->Form->label('status', 'Status: ') ?>
                    <?= $this->Form->radio('status', [1 => 'Show', 0 => 'Hidden'], ['default' => $product['status']]) ?>                       
                </div>   
                <div class="form-group">
                    <?= $this->Form->label('description', 'Description:') ?>
                    <?= $this->Form->textarea('description', ['class' => 'form-control', 'class' => 'ckeditor', 'placeholder' => 'Enter product description...', 'value' => $product['description']]) ?>                       
                </div>
                <div class="form-group">
                    <?= html_entity_decode($this->Form->label('producer', 'Producer:')) ?>
                    <?= $this->Form->select('producer', $option, ['class' => 'form-control', 'default' => $producer['id']]) ?>                       
                </div>   
                <div class="form-group">
                    <?= $this->Form->label('categories_id', 'Subproducer:') ?>
                    <?= $this->Form->select('categories_id', $optionSubproducer, ['class' => 'form-control', 'default' => $subproducer['id']]) ?>   
                    <?php
                    if (isset($errSubproducer)) {
                        echo '<div class="error-contents">' . $errSubproducer . '</div>';
                    }
                    ?>
                </div>     
                <?php //echo $this->Form->text('removeOptions[]',['disabled'=>'disabled','value'=>'a','class'=>'inputOptionRemove'])?>
                <?php if (count($groupOption) > 0) { ?>
                    <div class="tab">
                        <?php
                        $dem = 0;
                        foreach ($groupOption as $itemOption) {
                            ?>
                            <div class="tab_link" products_id="<?= $itemOption['products_id'] ?>" options="<?= $itemOption['options'] ?>" id="tabLink<?= $dem ?>" onclick="tabLinkClick(<?= $dem ?>)">Options <?= $dem + 1 ?> <div onclick="removeTab(<?= $dem ?>)" class="remove_tab">x</div></div>
                            <?php
                            $dem++;
                        }
                        ?>                    
                        <div class="add_tab" onclick="addTabClick()">+</div>
                    </div> <?php
                    $dem = 0;
                    foreach ($groupOption as $itemOption) {
                        ?>
                        <div id="tabContent<?= $dem ?>" class="tab_content container-fluid">    
                            <h3>Options <?= $dem + 1 ?>:</h3>
                            <?php
                            if (isset($lstSpecification) and count($lstSpecification) > 0) {
                                foreach ($lstSpecification as $key => $item) {
                                    $default = "";
                                    $value = "";
                                    if (isset($itemOption['options']) and count($itemOption['options']) > 0) {
                                        $default = $optionProduct[$itemOption['options']][$item['id']]['Specifications']['id'] . '_' . str_replace(' ', '_', $optionProduct[$itemOption['options']][$item['id']]['Specifications']['name']);
                                        $value = $optionProduct[$itemOption['options']][$item['id']]['price_option'];
                                    }
                                    ?>
                                    <div class="col-md-3">
                                        <strong><?= $item['name'] ?></strong> : <?= $this->Form->select($item['id'] . '_' . $item['name'] . '[]', $optionSpecification[$key], ['class' => 'form-control options', 'default' => $default]) ?>                           
                                    </div>  
                                    <?php
                                }
                            }
                            ?>
                            <div class="col-md-3">
                                <strong>Price</strong> : <?= $this->Form->text('price[]', ['class' => 'form-control options', 'type' => 'number', 'step' => "1", 'value' => $value]) ?>                           
                            </div>                     
                        </div>
                        <?php
                        $dem++;
                    }
                } else {
                    ?>                            
                    <div class="tab">
                        <div class="tab_link" onclick="tabLinkClick(0)" id="tabLink0">Options 1<div onclick="removeTab(0)" class="remove_tab">x</div></div>
                        <div class="add_tab" onclick="addTabClick()">+</div>
                    </div>                
                    <div class="tab_content container-fluid" id="tabContent0">    
                        <h3>Options:</h3>
                        <?php
                        if (isset($lstSpecification) and count($lstSpecification) > 0) {
                            $dem = 0;
                            foreach ($lstSpecification as $key => $item) {
                                ?>
                                <div class="col-md-3">
                                    <strong><?= $item['name'] ?></strong> : <?= $this->Form->select($item['id'] . '_' . $item['name'] . '[]', $optionSpecification[$key], ['class' => 'form-control options']) ?>                           
                                </div>  
                                <?php
                            }
                        }
                        ?>
                        <div class="col-md-3">
                            <strong>Price</strong> : <?= $this->Form->text('price[]', ['class' => 'form-control options', 'type' => 'number', 'step' => "1"]) ?>                           
                        </div>                     
                    </div>           
                <?php }
                ?>  
                <div class="form-group">
                    <br>  <?= $this->Form->submit('Apply', ['class' => 'btn btn-primary']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>        
    </div>
</div>
<?= $this->Html->script('productsmanager') ?>
<?=
$this->Html->script('tab.js')?>