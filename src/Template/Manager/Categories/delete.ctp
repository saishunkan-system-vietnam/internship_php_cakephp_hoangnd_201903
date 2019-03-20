<div class="container-fluid">
    <div class="col-md-2 col-md-offset-3">
        <h3>Confirm delete category</h3> 
        <ul class="nav nav-pills nav-stacked">
            <li><?=$this->Html->link('Back category manager',['action'=>'index'],['class'=>'w3-bar-item w3-button'])?></li>
        </ul>       
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading"><?=$titleDelete?></div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <p>ID: </p>
                        </td>
                         <td>
                           <?php echo '<p><strong> '.$category['id'].'</strong></p>';?>
                        </td>
                    </tr>
                      <tr>
                        <td>
                            <p>Name producer: </p>
                        </td>
                         <td>
                           <?php echo '<p><strong> '.$producer.'</strong></p>';?>
                        </td>
                    </tr>
                    <?php 
                    
                     
                    if($category['parent_id']!==0){
                        echo '<tr><td><p>Name subproducer: </p></td> <td><p> <strong>'.$category['name'].'</strong></p></td></tr>';
                    }
                    ?>
                </table>
                    <?=$this->Form->create()?>
                    
                <div class="form-group">
                        <?=$this->Form->submit('Delete',['class'=>'btn btn-primary','name'=>'addproducer'])?>
                </div>                    
                    <?=$this->Form->end()?>
            </div>
        </div>
    </div>        
</div>
</div>