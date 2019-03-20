<div class="container-fluid">
    <div class="col-md-2">
        <h3>Delete groups manager</h3> 
        <ul class="nav nav-pills nav-stacked">
            <li></li>
        </ul>       
    </div>
    <div class="col-md-10">    
        <div class="panel panel-default">
            <div class="panel-heading">Comfirm delete product groups</div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <p>ID: </p>
                        </td>
                        <td>
                           <?php echo '<p><strong> '.$group['id'].'</strong></p>';?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Name product groups: </p>
                        </td>
                        <td>
                           <?php echo '<p><strong> '.$group['name'].'</strong></p>';?>
                        </td>
                    </tr>                   
                </table>
                <p><?php 
                if(isset($error)) echo $error;                
                ?></p>
                    <?=$this->Form->create()?>

                <div class="form-group">
                        <?=$this->Form->submit('Delete',['class'=>'btn btn-primary','name'=>'addproducer'])?>
                </div>                    
                    <?=$this->Form->end()?>             
            </div>
        </div>
    </div>
