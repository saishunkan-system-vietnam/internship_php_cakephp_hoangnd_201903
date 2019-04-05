<div class="container-fluid">
    <div class="col-md-2">
        <h3>Orders manager</h3> 
        <ul class="nav nav-pills nav-stacked">
            <li></li>
        </ul>       
    </div>
    <div class="col-md-10">    
        <div class="panel panel-default">
            <div class="panel-heading">List orders</div>
            <div class="panel-body">                
                <table class="table">
                    <tr>
                        <th>
                            Order number
                        </th>    
                         <th>
                           Note
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
                           Customer note
                        </th>  
                        <th>
                            Action
                        </th>
                    </tr>  
                    <?php
                    if (isset($lstOrders) and count($lstOrders) > 0) {
                        foreach ($lstOrders as $item) {
                            if($item['status'] == 3){
                                 $style = ' style="color: red"';
                            }  else {
                                $style = '';
                            }
                            if ($item['status'] == 0) {
                                $statust = 'Chưa duyệt';                               
                            } else if ($item['status'] == 1) {
                                $statust = 'Đã xác nhận, đang giao hàng';                               
                            } else if ($item['status'] == 2) {
                                $statust = 'Đã thanh toán';                               
                            } else if ($item['status'] == 3) {
                                $statust = 'Đã hủy';                               
                            } else {
                                $statust = '';                               
                            }
                            ?>
                            <tr <?= $style ?>>
                                <td>
                                    <?= $item['id'] ?>
                                </td>
                                 <td>
                                    <?= $item['note'] ?>
                                </td>
                                <td>
                                    <?= $item['date_time'] ?>
                                </td>
                                <td>
                                    <?= $statust ?>
                                </td>
                                <td>
                                    <?= $item['Users']['name'] ?>
                                </td>
                                <td>
                                    <?= $item['Users']['phonenumber'] ?>
                                </td>
                                <td>
                                    <?= $item['Subaddress']['address'] ?>
                                </td>
                                 <td>
                                    <?= $item['customer_note'] ?>
                                </td>
                                <td>
                                    <?= $this->Html->link('view detail', ['action' => 'view', $item['id']]) ?>
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
