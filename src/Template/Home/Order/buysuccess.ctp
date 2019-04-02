<div class="container">
    <p>Thank you for our order!</p>
    <p>Please prepare the amount of <strong><?php
            if (isset($totalPrice)) {
                echo number_format($totalPrice);
            }
            ?> vnđ</strong>, We will deliver the goods to your address.</p>
    <p>Order information:</p>
    <table class="table table-bordered">
        <tr>
            <th>
                Order number
            </th>
            <th>
                TotalPrice
            </th>
            <th>
                Date time
            </th>
            <th>
                Status
            </th>
            <th>
               Address
            </th>
        </tr>
        <tr>
            <td>
                <?php
                if (isset($order)) {
                    echo $order['id'];
                }
                ?>
            </td>
            <td>
                <?php
                if (isset($totalPrice)) {
                    echo number_format($totalPrice);
                }
                ?>
            </td>
            <td>
                <?php
                if (isset($order)) {
                    echo $order['date_time'];
                }
                ?>
            </td>
            <td>
                <?php
                if (isset($order)) {
                    if ($order['status'] == 0) {
                        $status = 'Đang chờ xác nhận...';
                    } else if ($order['status'] == 1) {
                        $status = 'Đang giao hàng...';
                    } else if ($order['status'] == 2) {
                        $status = 'Đã thanh toán...';
                    } else {
                        $status = '';
                    }

                    echo $status;
                }
                ?>
            </td>
             <td>
                <?php
                if(isset($user)){
                    echo '<p>'.$user['name'].'</p>';
                     echo '<p>'.$user['phonenumber'].'</p>';
                }
                if(isset($address)){
                    echo '<p>'.$address['address'].'</p>';
                }
                ?>
            </td>
        </tr>
    </table>
    <p>Order details information:</p>
    <table class="table table-bordered">
        <tr>
            <th>
                Order detail number
            </th>
            <th>
                Product image
            </th>
            <th>
                Product name
            </th>           
            <th>
                Quantity
            </th>
            <th>
                Product price
            </th>
            <th>
                Price total
            </th>
        </tr>

        <?php
        if (isset($orderDetails) and count($orderDetails) > 0) {
            foreach ($orderDetails as $key => $item) {
                echo '<tr>'
                . '<td>'
                . $item['id']
                . '</td>'
                . '<td>'
                . $this->Html->image('/img/phone/' . $lstProducForOrderDetails[$key]['Images']['name'], ['width' => '200px'])
                . '</td>'
                . '<td>'
                . $lstProducForOrderDetails[$key]['name']
                . '</td>'
                . '<td>'
                . $item['quantity']
                . '</td>'
                . '<td>'
                . number_format($lstProducForOrderDetails[$key]['price'])
                . ' vnđ</td>'
                . '<td> <strong>'
                . number_format($lstProducForOrderDetails[$key]['price'] * $item['quantity'])
                . ' vnđ </strong></td>'
                . '</tr>';
            }
        }
                ?>       
    </table>
    <?=$this->Html->link('Tiếp tục mua hàng',['controller'=>'Products','action'=>'index'])?>
</div>