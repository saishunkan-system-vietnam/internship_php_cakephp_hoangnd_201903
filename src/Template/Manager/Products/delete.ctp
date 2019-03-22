<div class="container-fluid">
    <div class="col-md-2">
        <h3>Delete product manager</h3> 
        <ul class="nav nav-pills nav-stacked">
            <li></li>
        </ul>       
    </div>
    <div class="col-md-10">    
        <div class="panel panel-default">
            <div class="panel-heading">Comfirm delete product</div>
            <div class="panel-body">
                 <?=$this->Form->create()?>

                <div class="form-group">
                        <?=$this->Form->submit('Delete',['class'=>'btn btn-primary','name'=>'addproducer'])?>
                </div>                    
                    <?=$this->Form->end()?>   
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
                    <tr>
                        <td>
                            <p>Status: </p>
                        </td>
                        <td>
                           <?php
                            $status=( $product['status']==1)?'show':'hidden';
                           echo '<p><strong> '.$status.'</strong></p>';?>
                        </td>
                    </tr> 
                    <tr>
                        <td>
                            <p>Producer: </p>
                        </td>
                        <td>
                           <?php echo '<p><strong> '.$producer['name'].'</strong></p>';?>
                        </td>
                    </tr>  
                    <tr>
                        <td>
                            <p>Subproducer: </p>
                        </td>
                        <td>
                           <?php echo '<p><strong> '.$subproducer['name'].'</strong></p>';?>
                        </td>
                    </tr>  
                    <tr>
                        <td>
                            <p>Description: </p>
                        </td>
                        <td>
                           <?php echo '<p><strong> '.$product['description'].'</strong></p>';?>
                        </td>
                    </tr>                      
                </table>
                <p><?php 
                if(isset($error)) echo $error;                
                ?></p>                             
            </div>
        </div>
    </div>
