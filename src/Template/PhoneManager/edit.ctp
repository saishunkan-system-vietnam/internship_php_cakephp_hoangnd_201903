    <?=$this->Html->link('Back list',['action'=>'index'])?>
<h1>Add phone</h1>
<?=$this->Form->create(null,['type'=>'file'])?>
<?=$this->Form->control('tenmathang',['label'=>'Phone name:','value'=>$mathang['tenmathang']])?>
<?=$this->Form->control('soluong',['label'=>'Quantity:','type'=>'number','value'=>$mathang['soluong']])?>
<?=$this->Form->control('giaban',['label'=>'Price:','type'=>'number','value'=>$mathang['giaban']])?>
<?=$this->Form->label('hienthi','Show:')?>
<?=$this->Form->select('hienthi',['0'=>"Don't show",'1'=>'Show'],['default'=>$mathang['hienthi']])?>
<?=$this->Form->label('hinhanh','Image:')?>
<input type="hidden" name="anhcu" value="<?=$mathang['hinhanh']?>" readOnly/>
<?=$this->Html->image("phone/".$mathang['hinhanh'],['id'=>'anh','alt'=>$mathang['hinhanh'],'width'=>'100px'])?>
<a href="#" id='doianhmoi'>Đổi ảnh</a>
<?=$this->Form->file('hinhanhmoi',['id'=>'hinhanhmoi'])?>
<?=$this->Form->label('loaihang','Hãng:')?>
<?=$this->Form->select('loaihang',$lstLoaiHang,['id'=>'loaihang','default'=>$loaihangid])?>
<?=$this->Form->label('chitietloaihang','Loại')?>
<?=$this->Form->select('chitietloaihang',$lstChitietloaihang,['id'=>'chitietloaihang','default'=>$mathang['chitietloaihang_id'],'title'=>'edit'])?>
<?=$this->Form->label('nhomhang','Loại:')?>
<?=$this->Form->select('nhomhang',$lstNhomHang,['id'=>'chitietloaihang','default'=>$mathang['nhomhang_id']])?>
<?=$this->Form->submit('Apply')?>
<?=$this->Form->end()?>
<?=$this->Html->script('myJs.js')?>




