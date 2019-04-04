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
                <?php
                if (isset($lstOrders) and count($lstOrders) > 0) {
                    $order = array_pop($lstOrders);
                    $status = '';
                    if ($order['status'] == 0) {
                        $status = "Chưa duyệt";
                    }
                    ?>
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
                    </table>                   
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
                                    <?= $item['id'] ?>
                                </td>
                                <td>
                                    <?= $item['Products']['price'] ?>
                                </td>
                                <td>
                                    <?= $item['Products']['quantity'] ?>
                                </td>
                                <td>
                                    <?=$item['Products']['price']*$item['Products']['quantity'] ?>
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