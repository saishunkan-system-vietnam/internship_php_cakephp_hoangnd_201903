<table class="table table-bordered">
    <tr>
        <th>
            ID
        </th>
        <th>
            Name product
        </th>
        <th>
            Price
        </th>
        <th>
            Quantity
        </th>
        <th>
            Status
        </th>                       
        <th>
            Categories
        </th>
        <th>
            Image
        </th>
        <th>
            Group
        </th>
    </tr>                    
    <?php
    if (count($lstProduct) > 0) {
        foreach ($lstProduct as $key => $item) {
            $styleTr = ($arrGroup[$key] == 1) ? ' style="background-color: greenyellow"' : '';
            $status = ( $item['status'] == 1) ? 'show' : 'hidden';
            echo '<tr' . $styleTr . '><td>' . $item['id'] . '</td><td>' . $item['name'] . '</td><td>' . number_format($item['price']) . ' vnd</td><td>' .
            $item['quantity'] . '</td><td>' . $status . '</td><td>' . $item['Categories']['name'] . '</td><td>' . $this->Html->image('phone/' . $item['Images']['name'], ['width' => '50px']) . '</td><td>'
            . $this->Form->checkbox('selectProducts[]', ['value' => $item['id'], 'hiddenField' => FALSE]) . '</td></tr>';
        }
    }
    ?>
</table>