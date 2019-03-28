<div  class="container">
    <?php
    if (isset($lstCart)) {
        if (count($lstCart) > 0) {
            echo $this->element('ListCartElement');
        } else {
            echo $this->element('ListCartNullElement');
        }
    } else {
        echo $this->element('ListCartNullElement');
    }
    ?>
</div>