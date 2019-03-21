<?php
if(count($subOption)>0){
    foreach ($subOption as $item){
        echo '<option value="'.$item['value'].'">'.$item['text'].'</option>';
    }
}
//echo $this->Form->select('subproducer',$subOption,['class'=>'form-control']);
