<?php
if(isset($tenLoaiHang)){
echo '<option value="chon" hidden>--Chọn loại hàng--</option>';
foreach ($lstLoaiHang as $item){
echo '<option value="'.$item['id'].'">'.$tenLoaiHang.' '.$item['tenchitietloaihang'].'</option>' ;
}
}





