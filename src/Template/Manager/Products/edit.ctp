<div class="container-fluid">
    <div class="col-md-2">
        <h3>Add category</h3> 
        <ul class="nav nav-pills nav-stacked">
            <li><?=$this->Html->link('Back products manager',['action'=>'index'],['class'=>'w3-bar-item w3-button'])?></li>
        </ul>       
    </div>
    <div class="col-md-10">      
        <div class="panel panel-default">
            <div class="panel-heading">Add producer</div>
            <div class="panel-body">
                    <?=$this->Form->create()?>
                <div class="form-group">
                        <?=$this->Form->label('name','Name product:')?>
                        <?=$this->Form->text('name',['class'=>'form-control','placeholder'=>'Enter producer name...','value'=>$product['name']])?>      
                        <?php if(isset($errName)){ echo '<p>'.$errName.'</p>';}?>
                </div>      
                 <div class="form-group">
                        <?=$this->Form->label('price','Price:')?>
                        <?=$this->Form->text('price',['class'=>'form-control','type'=>'number','value'=>0,'value'=>$product['price']])?>                       
                </div>   
                 <div class="form-group">
                        <?=$this->Form->label('quantity','Quantity:')?>
                        <?=$this->Form->text('quantity',['class'=>'form-control','type'=>'number','value'=>0,'value'=>$product['quantity']])?>                       
                </div>   
                 <div class="form-group">
                        <?=$this->Form->label('status','Status: ')?>&nbsp;
                        <?=$this->Form->radio('status',[1=>'Show',0=>'Hidden'],['default'=>$product['status']])?>                       
                </div>   
                 <div class="form-group">
                        <?=$this->Form->label('description','Description:')?>
                        <?=$this->Form->textarea('description',['class'=>'form-control','placeholder'=>'Enter product description...','value'=>$product['description']])?>                       
                </div>
                 <div class="form-group">
                        <?=$this->Form->label('producer','Producer:')?>
                        <?=$this->Form->select('producer',$option,['class'=>'form-control','default'=>$producer['id']])?>                       
                </div>   
                 <div class="form-group">
                        <?=$this->Form->label('categories_id','Subproducer:')?>
                        <?=$this->Form->select('categories_id',$optionSubproducer,['class'=>'form-control','default'=>$subproducer['id']])?>   
                        <?php if(isset($errSubproducer)){ echo '<p>'.$errSubproducer.'</p>';}?>
                </div>   
                <div class="form-group">
                        <?=$this->Form->submit('Apply',['class'=>'btn btn-primary'])?>
                </div>  
                    <?=$this->Form->end()?>
            </div>
        </div>        
    </div>
</div>
<?=$this->Html->script('productsmanager')?>