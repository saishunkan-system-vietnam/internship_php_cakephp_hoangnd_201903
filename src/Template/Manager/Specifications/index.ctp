<div class="container-fluid">
    <div class="col-md-2">
        <h3>Specification manager</h3> 
        <ul class="nav nav-pills nav-stacked">
         <li><?= $this->Html->link('Add option details', ['action' => 'addProductOption',''], ['class' => 'w3-bar-item w3-button']) ?></li>
        </ul>       
    </div>
    <div class="col-md-10">    
        <div class="panel panel-default">
            <div class="panel-heading">List specification</div>
            <div class="panel-body">
                <?= $this->Form->create() ?> 
                <div class="form-group">    
                    <?= $this->Form->label('name', 'Option name:') ?>
                    <div class="input-group">
                        <?= $this->Form->text('name', ['class' => 'form-control', 'placeholder' => 'Enter Specification name...']) ?>
                        <span class="input-group-btn">
                            <?= $this->Form->submit('Add', ['class' => 'btn btn-primary']) ?>                        
                        </span>
                    </div><!-- /input-group -->    
                </div>                
                <?= $this->Form->end() ?>
                <p><strong>List option:</strong></p>
                <table class="table table-bordered">
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Action
                        </th>   
                    </tr>
                    <?php
                    if (isset($lstSpecification) and count($lstSpecification) > 0) {
                        foreach ($lstSpecification as $value) {
                            ?>
                            <tr>
                                <td>
                                    <?= $value['id'] ?>
                                </td>
                           
                                <td>
                                    <?= $value['name'] ?>
                                </td>
                          
                                <td>
                                    <?= $this->Html->link('Edit',['action'=>'edit',$value['id']]) ?> | 
                                    <?= $this->Html->link('Delete',['action'=>'delete',$value['id']]) ?> | 
                                    <?= $this->Html->link('Add options detail',['action'=>'addoptions',$value['id']]) ?>
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
