<?= $this->Html->script('ckeditor/ckeditor.js') ?>
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
                <?= $this->Form->create() ?>
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

                <div class="options">   
                    <p><strong>Options:</strong></p>
                    <div class="options1">
                        <div class="container-fluid">                            
                            <?php
                            if (isset($lstSpecification) and count($lstSpecification) > 0) {
                                $dem = 0;
                                foreach ($lstSpecification as $key => $item) {
                                    ?>
                                    <div class="col-md-3">
                                        <strong><?= $item['name'] ?></strong> : <?= $this->Form->select($item['id'] . '[]', $optionSpecification[$key], ['class' => 'form-control']) ?>                           
                                    </div>  
                                    <?php
                                }
                            }
                            ?>
                            <div class="col-md-3">
                                <strong>Price</strong> : <?= $this->Form->text('price[]', ['class' => 'form-control', 'type' => 'number', 'step' => "1"]) ?>                           
                            </div> 
                            <div class="col-md-1 col-md-offset-11"><div class="remove-icon" onclick="removeOption()">-</div></div>
                        </div>  <hr> 
                    </div>             
                </div> 
                <div class="col-md-12">
                    <div class="add-icon" onclick="addOption()">
                        +
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
<script>
    function addOption() {
        $('.options').append($('.options1').html());
    }
</script>


