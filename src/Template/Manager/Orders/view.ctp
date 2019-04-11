<div class="container-fluid">
    <div class="col-md-2">
        <h3>Oder details</h3> 
        <ul class="nav nav-pills nav-stacked">
            <li><?= $this->Html->link('Back orders manager', ['action' => 'index'], ['class' => 'w3-bar-item w3-button']) ?></li>
        </ul>       
    </div>
    <div class="col-md-10">       
        <div class="panel panel-default">            
            <div class="panel-heading">List orders</div>
            <div  class="panel-body">
                <?php
                if (isset($lstOrders) and count($lstOrders) > 0) {
                    $order = array_pop($lstOrders);
                    $status = '';
                    if ($order['status'] == 0) {
                                $status = 'Chưa duyệt';                               
                            } else if ($order['status'] == 1) {
                                $status = 'Đã xác nhận, đang giao hàng';                               
                            } else if ($order['status'] == 2) {
                                $status = 'Đã thanh toán';                               
                            } else if ($order['status'] == 3) {
                                $status = 'Đã hủy';                               
                            } 
                    ?>
                    <div class="container-fluid">
                        <div class="col-md-4">
                            <table class="table">
                                <tr>
                                    <th>Order number:</th><td><?= $order['id'] ?></td>
                                </tr>
                                <tr>
                                    <th>Date:</th><td><?= $order['date_time'] ?></td>
                                </tr>
                                <tr>
                                    <th>Status:</th><td><?= $status ?></td>
                                </tr>
                                <tr>
                                    <th>Address</th><td><p><?= $order['Users']['name'] ?></p><p><?= $order['Users']['phonenumber'] ?></p><p><?= $order['Subaddress']['address'] ?></p></td>
                                </tr>
<!--                                <tr>
                                    <th>Custonmer note:</th><td><p><?= $order['customer_note'] ?></td>
                                </tr>-->
                            </table>    
                        </div>         
                        <div class="col-md-8">
                            <?= $this->Form->create(null) ?>
                             <?= $this->Form->label('status', ['text' => 'Status:']) ?><br>
                            <?=$this->Form->radio('status',['0'=>'Chưa xác nhận','1'=>'Đã xác nhận, đang giao hàng','2'=>'Đã thanh toán','3'=>'Đã hủy'],['default'=>$order['status'],'class'=>'form-contronl'])?><br>
                            <?= $this->Form->label('note', ['text' => 'Note:']) ?><br>
                            <?= $this->Form->textarea('note',['value'=>$order['note'],'class'=>'form-control']) ?><br>  
                            <?= $this->Form->submit('update',['class'=>'btn btn-primary']) ?>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <p>Order details:</p>
                <table class="table">
                    <tr>
                        <th>
                            ID Order detail
                        </th>
                        <th>
                            Product name
                        </th>
                        <th>
                            Image
                        </th>
                        <th>
                            Price
                        </th>
                        <th>
                            Quantity
                        </th>
                        <th>
                            Price total
                        </th>
                    </tr>
                    <?php
                    if (isset($lstOrderDetails) and count($lstOrderDetails) > 0) {
                        foreach ($lstOrderDetails as $item) {
                            ?>
                            <tr>
                                <td>
                                    <?= $item['id'] ?>
                                </td>
                                <td>
                                    <?= $item['Products']['name'] ?>
                                </td>
                                <td>
                                    <?= $this->Html->image('/img/phone/' . $item['Images']['name'], ['width' => '100px']) ?>
                                </td>
                                <td>
                                    <?= number_format($item['Products']['price']) ?> vnđ
                                </td>
                                <td>
                                    <?= $item['quantity'] ?>
                                </td>
                                <td>
                                    <?= number_format($item['Products']['price'] * $item['quantity']) ?> vnđ
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