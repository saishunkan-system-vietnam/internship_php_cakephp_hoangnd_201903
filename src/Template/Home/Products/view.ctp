<div class="container-fluid">
    <div class="col-md-3">
    <?php
    if(isset($product)){
       echo $this->Html->image('/img/phone/' . $product['Images']['name'], ['alt' => $product['Images']['name'], 'width' => '100%']); 
    }
    ?>
    
</div>

<div class="col-md-9">
     <?php
    if(isset($product)){
       echo '<p><strong>'.$product['name'].'</strong></p>'; 
       echo number_format($product['price']).' vnd';
       echo '<br>'.$this->Html->link('Buy now',['controller'=>'Order','action'=>'buyconfirm',$product['id']]);
       echo '<br>'.$this->Form->button('Add cart',['productId'=>$product['id'],'name'=>'addCart']);
    }
    ?>
</div>
</div>

<div class="col-md-8">
     <?php
    if(isset($product)){
       echo $product['description'];        
    }
    ?>
</div>
<div class="col-md-4">
    
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
<?=$this->Html->link('buy success',['controller'=>'Order','action'=>'buysuccess',''])?>