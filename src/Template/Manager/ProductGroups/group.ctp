<div class="container-fluid">
    <div class="col-md-2">
        <h3>Group products</h3> 
        <ul class="nav nav-pills nav-stacked">
            <li></li>
        </ul>       
    </div>
    <div class="col-md-10">    
        <div class="panel panel-default">
            <div class="panel-heading">add products in groups</div>
            <div class="panel-body">
                        <?=$this->Form->create()?> 
                <div class="form-group">    
                        <?=$this->Form->label('name','Select group name:')?>
                    <div class="input-group">
                        <?=$this->Form->select('name',$lstGroups,['class'=>'form-control'])?>
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
<?=$this->Select->groups()?>