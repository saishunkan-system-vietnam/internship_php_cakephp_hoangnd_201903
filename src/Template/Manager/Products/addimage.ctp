<div class="container-fluid">
    <div class="col-md-2">
        <h3>Images product manager</h3> 
        <ul class="nav nav-pills nav-stacked">
           <li><?=$this->Html->link('Back products manager',['action'=>'index'],['class'=>'w3-bar-item w3-button'])?></li>
        </ul>       
    </div>
    <div class="col-md-10">    
        <div class="panel panel-default">
            <div class="panel-heading">Information of product</div>
            <div class="panel-body">                  
                <table class="table">
                    <tr>
                        <td>
                            <p>ID: </p>
                        </td>
                        <td>
                           <?php echo '<p><strong> '.$product['id'].'</strong></p>';?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Name: </p>
                        </td>
                        <td>
                           <?php echo '<p><strong> '.$product['name'].'</strong></p>';?>
                        </td>
                    </tr>       
                    <tr>
                        <td>
                            <p>Price: </p>
                        </td>
                        <td>
                           <?php echo '<p><strong> '.  number_format($product['price']).' vnd</strong></p>';?>
                        </td>
                    </tr>  
                    <tr>
                        <td>
                            <p>Quantity: </p>
                        </td>
                        <td>
                           <?php echo '<p><strong> '.$product['quantity'].'</strong></p>';?>
                        </td>
                    </tr>                            
                </table>
                <?=$this->Form->create()?>

                <div class="form-group">
                        <?=$this->Form->file('add',['class'=>'btn btn-primary'])?>
                     <?=$this->Form->submit('save',['class'=>'btn btn-primary'])?>
                </div>                    
                    <?=$this->Form->end()?>                              
            </div>
        </div>
    </div>
