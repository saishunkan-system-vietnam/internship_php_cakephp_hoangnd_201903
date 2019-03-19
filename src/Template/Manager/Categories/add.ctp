<div class="container-fluid">
    <div class="col-md-2">
        <h3>Add category</h3> 
        <ul class="nav nav-pills nav-stacked">
            <li><?=$this->Html->link('Back category manager',['action'=>'index'],['class'=>'w3-bar-item w3-button'])?></li>
        </ul>       
    </div>
    <div class="col-md-10">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Add producer</div>
                <div class="panel-body">
                    <?=$this->Form->create()?>
                    <div class="form-group">
                        <?=$this->Form->label('name','Name producer:')?>
                        <?=$this->Form->text('name',['class'=>'form-control','placeholder'=>'Enter producer name...'])?>
                    </div>      
                    <div class="form-group">
                        <?=$this->Form->submit('Add',['class'=>'btn btn-primary','name'=>'addproducer'])?>
                    </div>
                    <?=$this->Form->end()?>
                </div>
            </div>
        </div>
        <div  class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Add subproducer</div>
                <div class="panel-body">
                    <?=$this->Form->create()?>
                    <div class="form-group">
                        <?=$this->Form->label('parent_id','Choose producer:')?>
                        <?=$this->Form->select('parent_id',$option,['class'=>'form-control'])?>
                    </div>      
                    <div class="form-group">
                        <?=$this->Form->label('namesub','Name subproducer:')?>
                        <?=$this->Form->text('namesub',['class'=>'form-control','placeholder'=>'Enter subproducer name...'])?>
                    </div>  
                    <div class="form-group">
                        <?=$this->Form->submit('Add',['class'=>'btn btn-primary','name'=>'addsubproducer'])?>
                    </div>
                    <?=$this->Form->end()?>
                </div>
            </div>
        </div>
    </div>
</div>