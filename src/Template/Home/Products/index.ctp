<?php

if (isset($lstProduct)) {
    if (count($lstProduct) > 0) {
        
        foreach ($lstProduct as $item){
             echo' <a href="'. $this->Url->build(['action'=>'view',$item['id']]) .'"> <div class="col-md-3 image" style="border: 1px solid silver">'. $this->Html->image('/img/phone/' . $item['Images']['name'], ['alt' => $item['Images']['name'], 'width' => '100%']) . '<br><p>'.
                     $item['name'].'</p><p>'. number_format($item['price']).' vnđ</p> </div><a/>';
        }
       
    }
}
?>
