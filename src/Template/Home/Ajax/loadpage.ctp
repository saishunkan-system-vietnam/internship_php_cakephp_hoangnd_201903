<?php
if (isset($lstProduct)) {
    if (count($lstProduct) > 0) {
        echo '<div class="box-products">';
        foreach ($lstProduct as $item) {
            ?>
            <div class="col-md-3 line-products">
                <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'view', $item['id']]) ?>">
                    <?= $this->Html->image('/img/phone/' . $item['Images']['name'], ['alt' => $item['Images']['name'], 'width' => '100%']) ?>
                    <p><br><?= $item['name'] ?></p>
                    <div class="products-price">
                        <p><?= number_format($item['price']) ?> vnđ</p>
                    </div>
                </a>
            </div>
            <?php
        }
        echo '<div class="clear-float"></div></div>';
    }
}
?>  