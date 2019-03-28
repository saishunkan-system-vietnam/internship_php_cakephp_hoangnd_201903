<div class="col-md-9">   
    <div class="container-fluid" style="border-bottom: 1px solid silver">
        <div class="col-md-2"><strong>Image</strong></div>
        <div class="col-md-2"><strong>Name</strong></div>
        <div class="col-md-2"><strong>Price</strong></div>
        <div class="col-md-2"><strong>Quantity</strong></div>
        <div class="col-md-2"><strong>Price total</strong></div>
        <div class="col-md-2"><strong>Action</strong></div>
    </div>
    <?php
    foreach ($lstCart as $key => $item) {
        echo '<div class="container-fluid" style="border-bottom: 1px solid silver">'
        . '<div style="background-color: yellow" class=" col-md-2">' . $this->Html->image('/img/phone/' . $item['image'], ['alt' => $item['image'], 'width' => '100%']) . '</div>'
        . '<div class="col-md-2"><strong>' . $item['name'] . '</strong></div>'
        . '<div class="col-md-2">' . number_format($item['price']) . ' vnđ</div>'
        . '<div class="col-md-2">' . $item['quantity'] . '</div>'
        . '<div class="col-md-2">' . number_format($item['totalprice']) . ' vnđ</div>'
        . '<div class="col-md-2">' . $this->Html->link('-', ['action' => 'edit', 'subtraction', $key], ['class' => 'btn btn-primary']) . $this->Html->link('+', ['action' => 'edit', 'addtraction', $key], ['class' => 'btn btn-primary']) . $this->Html->link('xóa', ['action' => 'edit', 'delete', $key], ['class' => 'btn btn-danger']) . '</div>'
        . '</div>';
    }
    ?>       

</div>

<div  class="col-md-3">        
    <p>Orders:</p>
    <table class="table">
        <tr>
            <td>Total item:</td>
            <td><strong><?php
                    if (isset($totalItem)) {
                        echo $totalItem;
                    }
                    ?></strong></td>
        </tr>        
        <tr>
            <td>Total price:</td>
            <td><strong><?php
                    if (isset($totalPrice)) {
                        echo number_format($totalPrice) . ' vnđ';
                    }
                    ?></strong></td>
        </tr>   
        <tr>
            <td>
                <?= $this->Html->link('Confirm buy order', ['action' => 'buyconfirm', '']) ?>
            </td>
            <td>
                <?= $this->Html->link('View products other', ['controller' => 'Products', 'action' => 'index']) ?>
            </td>   
        </tr> 
    </table>
</div>