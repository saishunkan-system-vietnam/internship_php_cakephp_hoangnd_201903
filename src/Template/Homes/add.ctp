<?=$this->Form->create()?>
<label for="username">Username:</label><input name="username" type="text" ><br>
<label for="role">Role:</label>
<select name="role">
    <option value="0"> Adminitrator </option>
    <option value="0"> User </option>
</select><br>
<label for="name">Name:</label><input name="name" type="text" ><br>
<label for="age">Age:</label><input name="age" type="number" ><br>
<label for="address">Adress:</label><input name="address" type="text" >
<input type="submit" value="Save">
<?=$this->Form->end()?>
<?=$this->Html->link('Back Home',['action'=>'index'])?>