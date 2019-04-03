<div class="container-fluid">
    <div class="col-md-2">
        <h3>Product groups manager</h3> 
        <ul class="nav nav-pills nav-stacked">
            <li></li>
        </ul>       
    </div>
    <div class="col-md-10">    
        <div class="panel panel-default">
            <div class="panel-heading">Product groups</div>
            <div class="panel-body">
                <?= $this->Form->create() ?> 
                <div class="form-group">    
                    <?= $this->Form->label('name', 'Name product groups:') ?>
                    <div class="input-group">
                        <?= $this->Form->text('name', ['class' => 'form-control', 'placeholder' => 'Enter product groups name...']) ?>
                        <span class="input-group-btn">
                            <?= $this->Form->submit('Add', ['class' => 'btn btn-primary', 'name' => 'addproducer']) ?>                        
                        </span>
                    </div><!-- /input-group -->    
                </div>  
                <p><?php
                    if (isset($message))
                        echo $message;
                    if (isset($error))
                        echo $error;
                    ?></p>
<?= $this->Form->end() ?>
                <p><strong>List product groups:</strong></p>
                <table class="table table-bordered">
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Name groups
                        </th>
                        <th>
                            Action
                        </th>   
                    </tr>
                    <?php
                    if (count($lstGroups) > 0) {
                        foreach ($lstGroups as $item) {
                            echo'<tr><td>'.$item['id'].'</td><td>'.$item['name'].'</td><td>'.$this->Html->link('Delete', ['action' => 'delete', $item['id']])
                            .' | '.$this->Html->link('Edit', ['action' => 'edit', $item['id']]).' | '. $this->Html->link('Edit group products', ['action' => 'group',$item['id']])
                           .'</td></tr>';
                    }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
