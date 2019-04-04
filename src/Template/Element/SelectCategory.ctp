<div class="form-group">
    <?= $this->Form->label('producer', 'Producer:') ?>
    <?= $this->Form->select('producer', $option, ['class' => 'form-control', 'add']) ?>                       
</div>   
<div class="form-group">
    <?= $this->Form->label('categories_id', 'Subproducer:') ?>
    <?= $this->Form->select('categories_id', [], ['class' => 'form-control']) ?>                          
</div> 
<?=
$this->Html->script('productsmanager')?>
