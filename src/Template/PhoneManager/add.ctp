<?=$this->Html->link('Back list',['action'=>'index'])?>
<h1>Add phone</h1>
<?=$this->Flash->render()?>
<?=$this->Form->create(null,['type'=>'file'])?>
<?=$this->Form->control('tenmathang',['label'=>'Phone name:','class'=>'form-control'])?>
<?=$this->Form->control('soluong',['label'=>'Quantity:','type'=>'number','class'=>'form-control'    ])?>
<?=$this->Form->control('giaban',['label'=>'Price:','type'=>'number','class'=>'form-control'])?>
<?=$this->Form->label('hienthi','Show:')?>
<?=$this->Form->select('hienthi',['0'=>"Don't show",'1'=>'Show'],['class'=>'form-control'])?>
<?=$this->Form->label('hinhanh','Select image:')?>
<?=$this->Form->file('hinhanh',['class'=>'form-control'])?>
<?=$this->Form->label('loaihang','Hãng:')?>
<?=$this->Form->select('loaihang',$lstLoaiHang,['id'=>'loaihang','class'=>'form-control'])?>
<?=$this->Form->label('chitietloaihang','Loại:')?>
<?=$this->Form->select('chitietloaihang',[['value'=>'','text'=>'--Chọn loại hàng--','hidden']],['id'=>'chitietloaihang','disabled','title'=>'add','class'=>'form-control'])?>
<?=$this->Form->label('nhomhang','Nhóm hàng:')?>
<?=$this->Form->select('nhomhang',$lstNhomHang,['id'=>'chitietloaihang','class'=>'form-control'])?><br>
<?=$this->Form->submit('Add',['class'=>'btn btn-primary'])?>
<?=$this->Form->end()?>
<?=$this->Html->script('myJs.js')?>