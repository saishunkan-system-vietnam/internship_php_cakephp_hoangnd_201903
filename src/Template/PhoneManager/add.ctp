<?=$this->Html->link('Back list',['action'=>'index'])?>
<h1>Add phone</h1>
<?=$this->Form->create(null,['type'=>'file'])?>
<?=$this->Form->control('tenmathang',['label'=>'Phone name:'])?>
<?=$this->Form->control('soluong',['label'=>'Quantity:','type'=>'number'])?>
<?=$this->Form->control('giaban',['label'=>'Price:','type'=>'number'])?>
<?=$this->Form->label('hienthi','Show:')?>
<?=$this->Form->select('hienthi',['0'=>"Don't show",'1'=>'Show'])?>
<?=$this->Form->label('hinhanh','Select image:')?>
<?=$this->Form->file('hinhanh')?>
<?=$this->Form->label('loaihang','Hãng:')?>
<?=$this->Form->select('loaihang',$lstLoaiHang,['id'=>'loaihang'])?>
<?=$this->Form->label('chitietloaihang','Loại:')?>
<?=$this->Form->select('chitietloaihang',[['value'=>'','text'=>'--Chọn loại hàng--','hidden']],['id'=>'chitietloaihang','disabled','title'=>'add'])?>
<?=$this->Form->label('nhomhang','Loại:')?>
<?=$this->Form->select('nhomhang',$lstNhomHang,['id'=>'chitietloaihang'])?>
<?=$this->Form->submit('Add')?>
<?=$this->Form->end()?>
<?=$this->Html->script('myJs.js')?>