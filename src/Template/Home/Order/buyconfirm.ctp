<?=$this->Html->css('Home/cart.css')?>
<div  class="container">   
    <?=$this->element('ListCartElement')?>    
    
    <?=$this->element('OrderElement')?>
    <?php 
    
    if(isset($successful)){
        echo '<p type="color:green">'.$successful.'</p>';
    }
    ?>
</div>