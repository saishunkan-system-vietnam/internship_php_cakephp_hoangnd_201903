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
       echo '<br>'.$this->Html->link('Add cart',['controller'=>'Order','action'=>'cart',$product['id']]);
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