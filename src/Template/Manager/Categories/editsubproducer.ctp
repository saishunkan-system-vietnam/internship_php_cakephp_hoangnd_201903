<div class="container-fluid">
    <div class="col-md-2 col-md-offset-3">
        <h3>Edit category</h3> 
        <ul class="nav nav-pills nav-stacked">
            <li><?=$this->Html->link('Back category manager',['action'=>'index'],['class'=>'w3-bar-item w3-button'])?></li>
        </ul>       
    </div>
    <div  class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Edit subproducer</div>
            <div class="panel-body">
                    <?=$this->Form->create()?>
                <div class="form-group">
                        <?=$this->Form->label('parent_id','Choose producer:')?>
                        <?=$this->Form->select('parent_id',$option,['class'=>'form-control','default'=>$subproducer['parent_id']])?>
                        <?php if(isset($errProducer)) echo '<p>'.$errProducer.'</p>';?>
                </div>      
                <div class="form-group">
                        <?=$this->Form->label('name','Name subproducer:')?>
                        <?=$this->Form->text('name',['class'=>'form-control','placeholder'=>'Enter subproducer name...','value'=>$subproducer['name']])?>
                        <?php if(isset($erroNameSubproducer)) echo '<p>'.$erroNameSubproducer.'</p>';?>
                </div>  
                <div class="form-group">
                        <?=$this->Form->submit('Apply',['class'=>'btn btn-primary','name'=>'addsubproducer'])?>
                </div>
                    <?=$this->Form->end()?>
            </div>           
        </div>
    </div>
</div>