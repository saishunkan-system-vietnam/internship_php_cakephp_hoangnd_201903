<?= $this->Form->text('search') ?>
<?= $this->Form->submit('search', ['name' => 'sbSearch']) ?>


<div class="container-fluid" id="lstProducts">
    <?php
    if (isset($lstProduct)) {
        if (count($lstProduct) > 0) {
            foreach ($lstProduct as $item) {
                echo' <a href="' . $this->Url->build(['controller'=>'Products','action' => 'view', $item['id']]) . '"> <div class="col-md-3 image">' . $this->Html->image('/img/phone/' . $item['Images']['name'], ['alt' => $item['Images']['name'], 'width' => '100%']) . '<br><p>' .
                $item['name'] . '</p><p>' . number_format($item['price']) . ' vnđ</p> </div><a/>';
            }
        }
    }
    ?>  

</div>
<script type="text/javascript">
    $(document).on('click', 'input[name="sbSearch"]', function () {
        var conten = $('input[name="search"]').val();
        if (conten !== "") {
            $.ajax({
                headers: {'X-CSRF-Token': $('meta[name="csrfToken"]').attr('content')},
                method:'post',
                url: "<?= $this->Url->build(['controller' => 'Ajax', 'action' => 'searchproduct']) ?>",
                data: { searchName: conten }
            }).done(function (rp) {
                $('#lstProducts').html(rp);                
            });
        }
    });
</script>

