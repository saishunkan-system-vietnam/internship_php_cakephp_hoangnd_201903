<?= $this->Html->css('Home/products.css') ?>
<div class="container-fluid">
    <div class="text-title">
        <?php
        if (isset($key) and $key !=null) {
            echo '<p>Tìm thấy <strong>' . $countProduct . '</strong> kết quả phù hợp với từ khóa tìm kiếm <strong>"' . $key . '"</strong> trong đó có:</p>';
        } else {
            echo '<p>Danh sách sản phẩm:</p>';
        }
        ?>
    </div>
    <hr>
    <p id="Subtext-title"><?= $countProduct ?>  sản phẩm: </p>
</div>

<div  class="container-fluid" id="lstProducts">  

</div>
<div  class="container-fluid">       
    <div>
        <?php
        if ($pageNumber >= 2) {
            ?>
            <input onclick="loadProduct(0)" value="Trang đầu" type="button" class="btn">
            <?php
            for ($i = 0; $i < $pageNumber; $i++) {
                ?>
                <input onclick="loadProduct(<?= $i + 1 ?>)" value="<?= $i + 1 ?>" type="button" class="btn">
                <?php
            }
            ?>
            <input onclick="loadProduct(<?=$pageNumber?>)" value="Trang cuối" type="button" class="btn">
            <?php
        }
        ?>
    </div>
</div>
<script>
    $(document).ready(function () {
        loadProduct(1);
    });
    function loadProduct(page) {
        $.ajax({
            headers: {'X-CSRF-Token': $('meta[name="csrfToken"]').attr('content')},
            url: "<?= $this->Url->build(['controller' => 'Ajax', 'action' => 'loadpage']) ?>",
            type: 'POST',
            data: {page: page,key:"<?=$key?>"}
        }).done(function (rp) {
            $('#lstProducts').html(rp);
        });
    }
</script>

