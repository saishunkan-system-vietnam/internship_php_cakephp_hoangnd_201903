<?php
if(isset($lstImg) and count($lstImg)>0){
    foreach ($lstImg as $item){
      echo'  <div class="col-md-3 image"><input type="button" imgName="'.$item['name'].'"  class="remove-icon" value="X">'.$this->Html->image('/img/ram/'.$item['name'],['alt'=>$item['name'],'width'=>'100%']).' </div>';
       
    }
}

