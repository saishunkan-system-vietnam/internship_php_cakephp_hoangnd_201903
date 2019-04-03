<div class="col-md-9">
    <div class="container-fluid">   
    <h3>
        Address:
    </h3>
    <div class="col-md-6">
        <?php
        echo $this->Form->create();
        if (isset($user) && count($user) > 0) {
            $subaddress_default = array_pop($subaddress_default);
            echo ' <div class="col-md-5"> Customer: </div>';
            echo ' <div class="col-md-7"> <strong> ' . $user['name'] . '</strong> </div>';
            echo ' <div class="col-md-5"> Phone number: </div>';
            echo ' <div class="col-md-7"> <strong> ' . $user['phonenumber'] . '</strong> </div>';
            echo ' <div class="col-md-5"> Address: </div>';
            echo ' <div class="col-md-7" id="Address"> <strong> ' . $subaddress_default['address'] . '</strong> </div>';
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
        echo '<div class="container-fluid" id="grAddress" hidden > ';
            echo $this->Form->text('address',['class'=>'form-control','placeholder'=>'Enter Address...',"disabled"]);
            if (isset($user) && count($user) > 0) {
            echo $this->Form->radio('addressOption',$optionSubaddress,['default'=>$subaddress_default['id'],'disabled','class'=>'rdbAddress']);}
        echo '</div>';
        echo ' <div class="col-md-6">' . $this->Form->submit('Confirm order', ['class' => 'btn btn-primary']) . '</div>';
        echo $this->Form->end();
         if (isset($user) && count($user) > 0) {
         echo ' <div class="col-md-6">' . $this->Form->submit('Address other', ['class' => 'btn btn-primary','id'=>'addAddress']) . '</div>';}
        ?>  
    </div>
</div>
</div>
<script>
   $('#addAddress').click(function (){
       $('#grAddress').removeAttr('hidden');
       $('#grAddress').children('input').removeAttr('disabled');
       $('.rdbAddress').removeAttr('disabled');
   });
    $('input[name="addressOption"]').click(function (){
       $('#Address').html('<strong>'+$(this).parent('label').text()+'</strong>');
       $('input[name="address"]').val('');
   });
   </script>