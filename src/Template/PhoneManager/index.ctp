
<?=$this->Html->link('add phone',['action'=>'add'])?>
<input type="hidden" name="_csrfToken" autocomplete="off" value="8f76201adaa652bf843538e3dedb7805664a9b6847e4a354ba92e5dc4b113a335450fe474ff208680ac7a110464635099830904e84e7f770d135f881f2b124e7">
<table>
    <tr>
        <th>
            ID
        </th>
         <th>
            Tên mặt hàng
        </th>
        <th>
            Số lượng
        </th>
         <th>
            giá bán
        </th>
        <th>
            Hình ảnh
        </th>
         <th>
            Hiển thị
        </th>
        <th>
            Loại hàng
        </th>
         <th>
            Chi tiết loại hàng
        </th>
        <th>
            Action
        </th>
    </tr>
<?php
        if(isset($lstPhone)){
            foreach ($lstPhone as $item){
            $nameImg=$item['hinhanh'];
            $giaban=number_format($item['giaban']);
            $hienthi=($item['hienthi']==0)?'Không':'có';
            echo '<tr><td>'.$item['id'].'</td><td>'.$item['tenmathang'].'</td><td>'.$item['soluong'].'</td>
<td>'.$giaban.'</td><td>'.$this->Html->image("phone/$nameImg",['alt'=>" $nameImg",'width'=>'100px']).'</td>
<td>'.$hienthi.'</td><td>'.$item['Loaihang']['tenloaihang'].'</td><td>'.$item['Chitietloaihang']['tenchitietloaihang'].'</td>
<td><a onclick="deletePhone('.$item['id'].')" >delete</a><br>'.$this->Html->link('edit',['action'=>'edit',$item['id']]).'</td></tr>';
            }
        }
?>
</table>
<?=$this->Html->script('myJs.js')?>