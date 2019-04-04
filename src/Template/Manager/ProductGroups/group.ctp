<?= $this->Html->script('ckeditor/ckeditor.js') ?>
<div class="container-fluid">
    <div class="col-md-2">
        <h3>Group products</h3> 
        <ul class="nav nav-pills nav-stacked">
            <li></li>
        </ul>       
    </div>
    <div class="col-md-10">    
        <div class="panel panel-default">
            <div class="panel-heading">add products in groups</div>
            <div class="panel-body"> 
                <div class="form-group">    
                    <?= $this->Form->label('name', 'Find by category:') ?>
                    <?= $this->element('SelectCategory') ?>
                    <span class="input-group-btn">
                        <?= $this->Form->submit('Apply', ['class' => 'btn btn-primary', 'id' => 'find']) ?>                        
                    </span>
                </div>  <?= $this->Form->create() ?> 
                <div id="lstProducts">
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
                                ?>   
                                <tr <?= $styleTr ?>>
                                    <td>
                                        <?= $item['id'] ?>
                                    </td>
                                    <td>
                                        <?= $item['name'] ?>
                                    </td>
                                    <td>
                                        <?= number_format($item['price']) ?>
                                    </td>
                                    <td>
                                        <?= $item['quantity'] ?>
                                    </td>
                                    <td>
                                        <?= $status ?>
                                    </td>
                                    <td>
                                        <?= $item['Categories']['name'] ?>
                                    </td>
                                    <td>
                                        <?= $this->Html->image('phone/' . $item['Images']['name'], ['width' => '50px']) ?>
                                    </td>
                                    <td>
                                        <?= $this->Form->checkbox("selectProducts[$key]", ['value' => $item['id'], 'hiddenField' => FALSE]) ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </table>
                </div>  
                <p>Group name:<div id="groups_id" hidden><?= $group['id'] ?></div> <strong><?= $group['name'] ?></strong></p>
                <?= $this->Form->submit('Apply', ['class' => 'btn btn-primary', 'name' => 'add']) ?>      
                <?= $this->Form->submit('Remove', ['class' => 'btn btn-danger ', 'name' => 'remove']) ?>  
                <?= $this->Form->end() ?>  
            </div>
        </div>
    </div>
    <script>
        $(document).on('click', '#find', function () {
            var subproducer_id = $('select[name="categories_id"]').val();
            var groups_id = $('#groups_id').text();
            $.ajax({
                headers: {'X-CSRF-Token': $('meta[name="csrfToken"]').attr('content')},
                url: "<?= $this->Url->build(['controller' => 'Ajax', 'action' => 'getproductgroup']) ?>",
                type: 'POST',
                data: {groups_id: groups_id, subproducer_id: subproducer_id}
            }).done(function (rp) {
                $('#lstProducts').html(rp);
            });
        });
    </script>