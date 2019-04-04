<div class="container-fluid">
    <div class="col-md-2">
        <h3>New orders</h3> 
        <ul class="nav nav-pills nav-stacked">
            <li></li>
        </ul>       
    </div>
    <div class="col-md-12">       
        <div class="panel panel-default">            
            <div class="panel-heading">List orders</div>
            <div  class="panel-body">
                <table class="table">
                    <tr>
                        <th>
                            Order number
                        </th>                    
                        <th>
                            Date
                        </th>                   
                        <th>
                            Status
                        </th>
                        <th>
                            Name customer
                        </th>
                        <th>
                            Phone number
                        </th>
                        <th>
                            Address
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>  
                    <?php
                    if (isset($lstOrders) and count($lstOrders) > 0) {
                        foreach ($lstOrders as $item) {
                            ?>
                            <tr>
                                <td>
                                   <?=$item['id']?>
                                </td>
                                 <td>
                                   <?=$item['date_time']?>
                                </td>
                                 <td>
                                   <?='chưa duyệt'?>
                                </td>
                                 <td>
                                   <?=$item['Users']['name']?>
                                </td>
                                 <td>
                                   <?=$item['Users']['phonenumber']?>
                                </td>
                                 <td>
                                   <?=$item['Subaddress']['address']?>
                                </td>
                                 <td>
                                   <?=$this->Html->link('view detail',['controller'=>'Orders','action'=>'view',$item['id']])?>
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
</div>
<?=
$this->Html->script('productsmanager')?>