<?= $this->Html->css('Home/products.css') ?>
<div class="container-fluid">
    <div class="col-md-12 text-title">
        <?php
        if (isset($product)) {
            echo $product['name'];
        }
        ?>  
        <hr>
    </div> 
    <div class="col-md-3">
        <?php
        if (isset($product)) {
            echo $this->Html->image('/img/phone/' . $product['Images']['name'], ['alt' => $product['Images']['name'], 'width' => '100%']);
        }
        ?>

    </div>

    <div class="col-md-9">
        <?php
        if (isset($product)) {
             echo '<div class="products-price-view">'.number_format($product['price']) . ' vnd</div>';
            echo '<br>' . $this->Html->link('Buy now', ['controller' => 'Order', 'action' => 'buyconfirm', $product['id']],['class'=>'btn btn-danger']);
            echo '<br>';
            echo '<br>' . $this->Form->button('Add cart', ['productId' => $product['id'], 'name' => 'addCart','class'=>'btn btn-primary']);
        }
        ?>
    </div>
</div>
<div class="container-fluid">
<div  class="col-md-8">
    
         <?php
    if (isset($product)) {
        echo $product['description'];
    }
    ?>
    
</div>
<div class="col-md-4">

</div>
    
</div>
<script>
    $('button[name="addCart"]').click(function () {
        var productId = $(this).attr('productId');
        var url = "<?= $this->Url->build(['controller' => 'Ajax', 'action' => 'addCart']); ?>";
        $.ajax({
            headers: {'X-CSRF-Token': $('meta[name="csrfToken"]').attr('content')},
            url: url,
            type: 'post',
            data: {productId: productId}
        }).done(function (rp) {
            location.reload();
            alert('Add product to cart successful!');
        });
    });
</script>
