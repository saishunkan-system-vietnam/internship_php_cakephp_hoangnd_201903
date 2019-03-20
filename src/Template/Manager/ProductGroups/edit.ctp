<div class="container-fluid">
    <div class="col-md-2">
        <h3>Edit groups manager</h3> 
        <ul class="nav nav-pills nav-stacked">
            <li></li>
        </ul>       
    </div>
    <div class="col-md-10">    
        <div class="panel panel-default">
            <div class="panel-heading">edit product groups</div>
            <div class="panel-body">
                        <?=$this->Form->create()?> 
                <div class="form-group">    
                        <?=$this->Form->label('name','Name product groups:')?>
                    <div class="input-group">
                        <?=$this->Form->text('name',['class'=>'form-control','placeholder'=>'Enter product groups name...','value'=>$group['name']])?>
                        <span class="input-group-btn">
                         <?=$this->Form->submit('Apply',['class'=>'btn btn-primary','name'=>'addproducer'])?>                        
                        </span>
                    </div><!-- /input-group -->    
                </div>  
                <p><?php 
                if(isset($error)) echo $error;                
                ?></p>
                    <?=$this->Form->end()?>                
            </div>
        </div>
    </div>
