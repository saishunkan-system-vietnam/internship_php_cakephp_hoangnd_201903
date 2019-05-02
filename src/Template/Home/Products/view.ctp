<?= $this->Html->css('Home/products.css') ?>
<div class="container-fluid">
    <div class="col-md-12 text-title">
        <?php
        if (isset($product)) {
            echo $product['name'];
        }
        ?>  
        <hr>
    </div> 
    <div class="col-md-3">
        <?php
        if (isset($product)) {
            echo $this->Html->image('/img/phone/' . $product['Images']['name'], ['alt' => $product['Images']['name'], 'width' => '100%']);
        }
        ?>
    </div>

    <div class="col-md-9">
        <?php if (isset($product)) { ?>          

            <div>
                <?php
                if (isset($groupOptions) and count($groupOptions) > 0) {                   
                    ?>
                    <div class="products-price-view"> <?= number_format($product['ProductSpecifications']['price_option']) ?> vnd</div>
                    <?php
                    foreach ($groupOptions as $val) {
                        ?>
                    <div <?php
//                        if (count($groupOptions) == 1) {
//                            echo 'hidden';
//                        }                       
                        ?> >
                        <input <?php
                        if ($val['options']==$product['ProductSpecifications']['options']) {
                            echo 'checked';
                        }                       
                        ?> type="radio" option="<?= $val['options'] ?>" products_id="<?= $val['products_id'] ?>" price_option="<?= $val['price_option'] ?>" name="rdbOptions" value="<?= $val['options'] ?>">Options <?=$val['options']+1 ?></div>

                        <?php
                    }
                }
                ?>
            </div>

            <br><?= $this->Html->link('Buy now', ['controller' => 'Order', 'action' => 'buyconfirm', $product['id']], ['class' => 'btn btn-danger']) ?>
            <br>
            <br><?= $this->Form->button('Add cart', ['productId' => $product['id'],'option'=> $product['ProductSpecifications']['options'] ,'name' => 'addCart', 'class' => 'btn btn-primary']) ?>
        <?php }
        ?>
    </div>
</div>
<div class="container-fluid">
    <div  class="col-md-8">

        <?php
        if (isset($product)) {
            echo $product['description'];
        }
        ?>

    </div>
    <div class="col-md-4">
        <h3>Specification of Products</h3>

        <?php
        if (isset($groupOptions) and count($groupOptions) > 0) {
            foreach ($groupOptions as $v) {
                ?>
                <table <?php
                if ($v['options'] != $product['ProductSpecifications']['options']) {
                    echo 'hidden="hidden"';
                }
                ?> class="table table-condensed optionProduct" id="<?= $v['options'] ?>">
                    <?php
                    foreach ($lstSpecification as $item) {
                        ?>
                        <tr>
                            <th>
                                <?= $item['name'] ?>
                            </th>
                            <?php
                            foreach ($lstOptions as $key => $val) {
                                if ($key == $v['options']) {
                                    ?>
                                    <td>
                                        <?= $val[$item['id']]['Specifications']['name'] ?>
                                    </td>
                                    <?php
                                }
                            }
                            ?>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <?php
            }
        }
        ?>

    </div>

</div>
<script>
    $('button[name="addCart"]').click(function () {
        var productId = $(this).attr('productId');
        var option= $(this).attr('option');
        alert(option);
        var url = "<?= $this->Url->build(['controller' => 'Ajax', 'action' => 'addCart']); ?>";
        $.ajax({
            headers: {'X-CSRF-Token': $('meta[name="csrfToken"]').attr('content')},
            url: url,
            type: 'post',
            data: {productId: productId}
        }).done(function (rp) {
            location.reload();
            alert('Add product to cart successful!');
        });
    });

    $(document).on("click", 'input[name="rdbOptions"]', function () {
        var _this = $(this);
        $('.products-price-view').text(_this.attr('price_option').replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,") + ' vnd');
         $('button[name="addCart"]').attr('option',_this.attr('option'));
        for (var i = 0, max = $('.optionProduct').length; i < max; i++) {
            if ($('.optionProduct').eq(i).attr('id') === _this.val()) {
                $('.optionProduct').eq(i).removeAttr('hidden');               
            } else {
                $('.optionProduct').eq(i).attr('hidden', 'hidden');
            }
        }
    });
</script>
