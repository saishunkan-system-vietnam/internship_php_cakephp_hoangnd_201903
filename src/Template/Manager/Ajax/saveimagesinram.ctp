<?php
if(isset($lstImg) and count($lstImg)>0){
    foreach ($lstImg as $name){
      echo'  <div class="col-md-3 image"><input type="button" imgName="'.$name.'"  class="remove-icon removeImgInRam" value="X">'.$this->Html->image('/img/ram/'.$name,['alt'=>$name,'width'=>'100%']).' </div>';
       
    }
}
