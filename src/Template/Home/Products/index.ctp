<?= $this->Html->css('Home/products.css') ?>
<div class="container-fluid">
    <div class="text-title">
        <?php
        if (isset($key)) {
            echo '<p>Tìm thấy <strong>' . count($lstProduct) . '</strong> kết quả phù hợp với từ khóa tìm kiếm <strong>"' . $key . '"</strong> trong đó có:</p>';
        } else {
            echo '<p>Danh sách sản phẩm:</p>';
        }
        ?>
    </div>
    <hr>
</div>
<div  class="container-fluid" id="lstProducts">
    <?php
    if (isset($lstProduct)) {
        if (count($lstProduct) > 0) {
            echo '<p id="Subtext-title">'.  count($lstProduct).' sản phẩm: </p>';
            $dem = 1;
            foreach ($lstProduct as $item) {
                $openUl = ($dem == 1) ? '<ul class="line-products">' : '';
                $closeUl = ($dem == 4 or $dem ==  count($lstProduct)) ? '<div class="clear-float"></div></ul>' : '';               
                echo $openUl. '<a href="' . $this->Url->build(['controller' => 'Products', 'action' => 'view', $item['id']]) . '"> '
                        . '<li class="col-product">' . $this->Html->image('/img/phone/' . $item['Images']['name'], ['alt' => $item['Images']['name'], 'width' => '100%']) . '<br><p>' .
                $item['name'] . '</p><div class="products-price"><p>' . number_format($item['price']) . ' vnđ</p><div> </li></a>'.$closeUl;
                if ($dem == 4) {
                    $dem = 1;
                }
                $dem++;
            }
        }
    }
    ?>  

</div>

