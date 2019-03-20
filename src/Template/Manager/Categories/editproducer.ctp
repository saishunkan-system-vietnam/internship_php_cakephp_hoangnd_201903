<div class="container-fluid">
    <div class="col-md-2 col-md-offset-3">
        <h3>Edit category</h3> 
        <ul class="nav nav-pills nav-stacked">
            <li><?=$this->Html->link('Back category manager',['action'=>'index'],['class'=>'w3-bar-item w3-button'])?></li>
        </ul>       
    </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Edit producer</div>
                <div class="panel-body">
                    <?=$this->Form->create()?>
                    <div class="form-group">
                        <?=$this->Form->label('name','Name producer:')?>
                        <?=$this->Form->text('name',['class'=>'form-control','placeholder'=>'Enter producer name...','value'=>$producer['name']])?>
                        <?php if(isset($erroNameProducer)){ echo '<p>'.$erroNameProducer.'</p>';}?>
                    </div>      
                    <div class="form-group">
                        <?=$this->Form->submit('Apply',['class'=>'btn btn-primary','name'=>'addproducer'])?>
                    </div>                    
                    <?=$this->Form->end()?>
                </div>
            </div>
        </div>
</div>