<div class="container-fluid">
    <div class="col-md-2">
        <h3>Edit option detail</h3> 
        <ul class="nav nav-pills nav-stacked">
           <li><?=$this->Html->link('Back Option manager',['action'=>'index'],['class'=>'w3-bar-item w3-button'])?></li>
        </ul>       
    </div>
    <div class="col-md-10">    
        <div class="panel panel-default">
            <div class="panel-heading">Option detais</div>
            <div class="panel-body">
                <?= $this->Form->create() ?> 
                <div class="form-group">    
                    <?= $this->Form->label('name', 'Option detail name:') ?>
                    <?= $this->Form->text('name', ['class' => 'form-control', 'placeholder' => 'Enter Option detail name...','value'=>$specification['name']]) ?> 
                </div>  
                <div class="form-group">    
                    <?= $this->Form->label('optionName', 'Option:') ?>
                    <?= $this->Form->select('optionName',$option, ['class' => 'form-control', 'placeholder' => 'Enter Option detail name...','default'=>$specification['parent_id']]) ?> 
                </div>
                <span class="input-group-btn">
                    <?= $this->Form->submit('Apply', ['class' => 'btn btn-primary']) ?>                        
                </span>
                <?= $this->Form->end() ?>               
            </div>
        </div>
    </div>
