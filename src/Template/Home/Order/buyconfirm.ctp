<div  class="container">
    <h3>
        Thông tin đơn hàng:
    </h3>
    <?=$this->element('ListCartElement')?>    
    
    <?=$this->element('OrderElement')?>
    <?php 
    
    if(isset($successful)){
        echo '<p type="color:green">'.$successful.'</p>';
    }
    ?>
</div>