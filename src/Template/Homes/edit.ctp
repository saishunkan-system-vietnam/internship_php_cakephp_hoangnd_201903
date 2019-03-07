<?=$this->Form->create()?>

<label for="username">Username:</label><input readonly name="username" type="text" value="<?=$user['username']?>"><br>
<?php if(isset($erro)) echo "<p style='color:red;font-size:18px'>$erro</p>";?>
<select name="role">
    <option value="0"> Adminitrator </option>
    <option value="1"> User </option>
</select><br>

<label for="name">Name:</label><input name="name" type="text" value="<?=$user['name']?>"><br>
<label for="age">Age:</label><input name="age" type="number" value="<?=$user['age']?>"><br>
<label for="address">Adress:</label><input name="address" type="text" value="<?=$user['address']?>">
<input type="submit" value="Save">
<?=$this->Form->end()?>
<?=$this->Html->link('Back Home',['action'=>'index'])?>