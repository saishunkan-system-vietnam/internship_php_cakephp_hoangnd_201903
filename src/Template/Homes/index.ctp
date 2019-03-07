<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link('Add User',[
            'action'=>'add'
        ]) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
   <table>
    <tr>
        <th>
            Uesername
        </th>   
        <th>
            Role
        </th>
        <th>
            Name
        </th>
        <th>
            Age
        </th>
        <th>
            address
        </th>
        <th>
            Action
        </th>
    </tr>
    <?php foreach ($data as $row):?>

    <tr>
        <td>
            <?=$row['username']?>
        </td>
        <td>
            <?php if($row['role']===true) echo 'User';else echo 'Adminitrator';?>
        </td>
        <td>
            <?=$row['name']?>
        </td>
        <td>
            <?=$row['age']?>
        </td>
        <td>
            <?=$row['address']?>
        </td>
        <td>
            <?=$this->Form->postLink('Edit',['action'=>'edit',$row['username']])?>
        </td>
    </tr>

    <?php endforeach;?>
</table>

</div>
