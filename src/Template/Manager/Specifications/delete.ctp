<div class="container-fluid">
    <div class="col-md-2">
        <h3>Confirm delete specification</h3> 
        <ul class="nav nav-pills nav-stacked">
            <li><?= $this->Html->link('Back specification manager', ['action' => 'index'], ['class' => 'w3-bar-item w3-button']) ?></li>
        </ul>       
    </div>
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">Option detail:</div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <p>ID: </p>
                        </td>
                        <td>
                            <?php echo '<p><strong> ' . $specification['id'] . '</strong></p>'; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Name: </p>
                        </td>
                        <td>
                            <?php echo '<p><strong> ' . $specification['name'] . '</strong></p>'; ?>
                        </td>
                    </tr>                  
                </table>
                <?= $this->Form->create() ?>
                <?php
                if (isset($errDelete)) {
                    echo $errDelete;
                }
                ?>          
                <div class="form-group">
                    <?= $this->Form->submit('Delete', ['class' => 'btn btn-primary', 'name' => 'addproducer']) ?>
                </div>                    
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>        
</div>
</div>