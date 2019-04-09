<?php
if(isset($lstOption) and count($lstOption)){
    foreach ($lstOption as $item){
       echo  $this->Form->radio("option".$item['parent_id'],[['value'=>$item['id'],'text'=>$item['name'],'onchange'=>'rdbchange('.$item['parent_id'].','.$item['id'].')','id'=>$item['id']]]);
    }
}
