<div class="col-md-9"> 
    <div class="container-fluid" style="border-bottom: 1px solid silver">
        <div class="col-md-12"><p>  <strong>Order details:</strong></p></div>  <hr>
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
        . '<div class=" col-md-2">' . $this->Html->image('/img/phone/' . $item['image'], ['alt' => $item['image'], 'width' => '100%']) . '</div>'
        . '<div class="col-md-2">' . $item['name'] . '</div>'
        . '<div class="col-md-2">' . number_format($item['price']) . ' vnđ</div>'
        . '<div class="col-md-2">' . $item['quantity'] . '</div>'
        . '<div class="col-md-2"><strong>' . number_format($item['totalprice']) . ' vnđ</strong></div>'
        . '<div class="col-md-2">' . $this->Form->number('quantity_' . $key, ['value' => $item['quantity'], 'class' => 'cart-quantity'])
        . $this->Form->button('Update', ['class' => 'cart-btnLst cart-btnUpdate', 'name' => 'update', 'productId' => $key])
        . $this->Form->button('Delete', ['class' => 'cart-btnLst cart-btnDelete', 'name' => 'delete', 'productId' => $key]) . '</div>'
        . '</div>';
    }
    ?>       

</div>

<div  class="col-md-3 cart-ifo">   
    <div class="container-fluid">
        <p style="margin: 0 10px;">  <strong>Cart:</strong></p>
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

                <?php
                if (isset($user) == FALSE) {
                    echo '<td><div class="btn-cart btn-orange">' . $this->Html->link('Confirm', ['action' => 'buyconfirm', '']) . '</div></td>';
                }
                ?>
                <td  <?php if (isset($user) == True) {
                    echo 'colspan="2"';
                } ?>>
                    <div class="btn-cart btn-blue   ">  <?= $this->Html->link('Xem thêm', ['controller' => 'Products', 'action' => 'index']) ?>'</div>
                </td>   
            </tr> 
        </table>
    </div>
</div>
<script>
    $('button[name="update"]').click(function () {
        var productId = $(this).attr('productId');
        var quantity = $('input[name="quantity_' + productId + '"]').val();
        var url = "<?= $this->Url->build(['controller' => 'Ajax', 'action' => 'updateCart']); ?>";
        $.ajax({
            headers: {'X-CSRF-Token': $('meta[name="csrfToken"]').attr('content')},
            url: url,
            type: 'post',
            data: {productId: productId, quantity: quantity}
        }).done(function () {
            location.reload();
        });
    });
    $('button[name="delete"]').click(function () {
        var productId = $(this).attr('productId');
        var url = "<?= $this->Url->build(['controller' => 'Ajax', 'action' => 'updateCart']); ?>";
        $.ajax({
            headers: {'X-CSRF-Token': $('meta[name="csrfToken"]').attr('content')},
            url: url,
            type: 'post',
            data: {productId: productId}
        }).done(function () {
            alert('Deleted product');
            location.reload();
        });
    });
</script>