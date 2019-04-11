<?= $this->Html->script('ckeditor/ckeditor.js') ?>
<?= $this->Html->css("Manager/products.css") ?>
<div class="container-fluid">
    <div class="col-md-2">
        <h3>Add category</h3> 
        <ul class="nav nav-pills nav-stacked">
            <li><?= $this->Html->link('Back products manager', ['action' => 'index'], ['class' => 'w3-bar-item w3-button']) ?></li>
        </ul>       
    </div>
    <div  class="col-md-10">      
        <div class="panel panel-default">
            <div class="panel-heading">Add producer</div>
            <div class="panel-body">
                <?= $this->Form->create(null, ['onsubmit' => 'return validateForm()', "name" => 'frmProduct']) ?>
                <div class="form-group">
                    <?= $this->Form->label('name', 'Name product:') ?>
                    <?= $this->Form->text('name', ['class' => 'form-control', 'placeholder' => 'Enter producer name...']) ?>      
                    <?php
                    if (isset($errName)) {
                        echo '<div class="error-contents">' . $errName . '</div>';
                    }
                    ?>
                    <?= $this->Flash->render() ?>
                </div>      
                <!--                <div class="form-group">
                <?= $this->Form->label('price', 'Price:') ?>
                <?= $this->Form->text('price', ['class' => 'form-control', 'type' => 'number', 'step' => "1"]) ?>    
                <?php
                if (isset($errPrice)) {
                    echo '<div class="error-contents">' . $errPrice . '</div>';
                }
                ?>
                                </div>   -->
                <div class="form-group">
                    <?= $this->Form->label('quantity', 'Quantity:') ?>
                    <?= $this->Form->text('quantity', ['class' => 'form-control', 'type' => 'number']) ?>    
                    <?php
                    if (isset($errQuantity)) {
                        echo '<div class="error-contents">' . $errQuantity . '</div>';
                    }
                    ?>
                </div>   
                <div class="form-group">
                    <?= $this->Form->label('status', 'Status: ') ?>
                    <?= $this->Form->radio('status', [1 => 'Show', 0 => 'Hidden'], ['default' => 1]) ?>                       
                </div>   
                <div class="form-group">
                    <?= $this->Form->label('description', 'Description:') ?>
                    <?= $this->Form->textarea('description', ['class' => 'form-control', 'class' => 'ckeditor', 'placeholder' => 'Enter product description...']) ?>                       
                </div>  
                <?= $this->element('SelectCategory') ?>
                <?php
                if (isset($errSubproducer)) {
                    echo '<div class="error-contents">' . $errSubproducer . '</div>';
                }
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
                                <strong><?= $item['name'] ?></strong> : <?= $this->Form->select($item['id'] . '_' . $item['name'] . '[]', $optionSpecification[$key], ['class' => 'form-control']) ?>                           
                            </div>  
                            <?php
                        }
                    }
                    ?>
                    <div class="col-md-3">
                        <strong>Price</strong> : <?= $this->Form->text('price[]', ['class' => 'form-control', 'type' => 'number', 'step' => "1"]) ?>                           
                    </div>                     
                </div>                     
                <div class="form-group col-md-12">
                    <br>
                    <?= $this->Form->submit('Add', ['class' => 'btn btn-primary']) ?>
                </div>  
                <?= $this->Form->end() ?>
            </div>
        </div>        
    </div>
</div>

<?= $this->Html->script('tab.js') ?>