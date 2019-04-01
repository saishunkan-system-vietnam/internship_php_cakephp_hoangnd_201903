<p>Tìm thấy <strong><?=  count($lstProduct)?></strong> kết quả phù hợp với từ khóa tìm kiếm <strong>"<?=$searchName?>"</strong></p>
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