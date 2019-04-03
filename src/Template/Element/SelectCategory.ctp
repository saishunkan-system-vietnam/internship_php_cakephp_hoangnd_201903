<div class="form-group">
    <?= $this->Form->label('producer', 'Producer:') ?>
    <?= $this->Form->select('producer', $option, ['class' => 'form-control', 'add']) ?>                       
</div>   
<div class="form-group">
    <?= $this->Form->label('categories_id', 'Subproducer:') ?>
    <?= $this->Form->select('categories_id', [], ['class' => 'form-control']) ?>                          
</div> 

<script>
    $(document).ready(function () {
    if ($("select[name='producer']") && $("select[name='producer']").attr('add')) {
        getSubproducer();
    }
    $("select[name='producer']").change(function () {
        getSubproducer();
    });
});
function getSubproducer() {
    csrf = $('meta[name="csrfToken"]').attr('content');
    $.ajax({
        headers: {'X-CSRF-Token': csrf},
        method: 'post',
        url: '/shopdienthoai/manager/getsubproducer',
        data: {producer_id: $("select[name='producer']").val()}
    }).done(function (res) {
        $('select[name="categories_id"]').html(res);
    }).fail(function () {
        alert('load fail');
    });
}
  </script>