<?php
if(isset($tenLoaiHang)){
echo '<option value="" hidden>--Chọn loại hàng--</option>';
foreach ($lstLoaiHang as $item){
echo '<option value="'.$item['id'].'">'.$tenLoaiHang.' '.$item['tenchitietloaihang'].'</option>' ;
}
}





