<?=$this->Form->input('csrfToken',['value'=>'79739e66ecdcb5c482be8031a93e500b92e3c97b7ea3686f115fb89c5345964e4535436fdcc4161ffd46a74e4059d363e634abf7c3d5a5f82e754f22402bc090','type'=>'hidden'])?>
<?=$this->Html->link('add phone',['action'=>'add'])?>
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