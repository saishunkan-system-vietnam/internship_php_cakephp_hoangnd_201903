<div class="container-fluid">
    <div class="col-md-2">
        <h3>Products manager</h3> 
        <ul class="nav nav-pills nav-stacked">
            <li></li>
        </ul>       
    </div>
    <div class="col-md-12">       
        <div class="panel panel-default">            
            <div class="panel-heading">List products</div>
            <div  class="panel-body">
                <?= $this->Html->link('Add product', ['action' => 'add'], ['class' => 'w3-bar-item w3-button']) ?>
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
                            Description
                        </th>
                        <th>
                            Categories
                        </th>
                        <th>
                            Image
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                    <?php
                    if (count($lstProduct) > 0) {
                        foreach ($lstProduct as $item) {
                            $status = ( $item['status'] == 1) ? 'show' : 'hidden';
                            ?>
                            <tr>
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
                                    <div class="box-description">
                                        <?= htmlentities($item['description']) ?>
                                    </div>        
                                </td>
                                <td>
                                    <?= $item['Categories']['name'] ?>
                                </td>
                                <td>
                                    <?= $this->Html->link('Edit', ['action' => 'addimage', $item['id']]); ?>
                                </td>
                                <td>
                                    <?= $this->Html->link('Delete', ['action' => 'delete', $item['id']]) ?> | <?= $this->Html->link('Edit', ['action' => 'edit', $item['id']]) ?>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>       
    </div>
</div>
<?=
$this->Html->script('productsmanager')?>