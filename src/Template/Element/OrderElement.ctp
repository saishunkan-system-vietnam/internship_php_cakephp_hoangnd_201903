<div class="container-fluid">   
    <h3>
        Thông tin khách hàng:
    </h3>

    <?php
    echo $this->Form->create();
    if (isset($user) && count($user) > 0) {
        echo 'ton tai';
    } else {
        echo $this->Form->text('name', ['placeholder' => 'Enter name', 'class' => 'form-control']);
        if (isset($errName) && $errName !== '') {
            echo '<p style="color:red">' . $errName . '</p>';
        }
        echo $this->Form->text('phonenumber', ['placeholder' => 'Enter phonenumber', 'class' => 'form-control']);
        if (isset($errPhonenumber) && $errPhonenumber !== '') {
            echo '<p style="color:red">' . $errPhonenumber . '</p>';
        }
        echo $this->Form->text('address', ['placeholder' => 'Enter address', 'class' => 'form-control']);
        if (isset($errAddress) && $errAddress !== '') {
            echo '<p style="color:red">' . $errAddress . '</p>';
        }
    }
    echo $this->Form->submit('Confirm order', ['class' => 'btn btn-primary']);
    echo $this->Form->end();
    ?>  
</div>