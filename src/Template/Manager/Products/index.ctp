<div class="container-fluid">
    <div class="col-md-2">
        <h3>Products manager</h3> 
        <ul class="nav nav-pills nav-stacked">
            <li><?=$this->Html->link('Add product',['action'=>'add'],['class'=>'w3-bar-item w3-button'])?></li>
        </ul>       
    </div>
    <div class="col-md-10">       
        <div class="panel panel-default">
            <div class="panel-heading">List producer</div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Name producer
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                        <?php
//                        if(count($lstProducer)>0){
//                            foreach ($lstProducer as $item){
//                               if($item['parent_id']===0){
//                                    echo '<tr><td>'.$item['id'].'</td><td>'.$item['name'].'</td><td>'.$this->Html->link('Delete',['action'=>'delete',$item['id']]) 
//                                            .' | '.$this->Html->link('Edit',['action'=>'editproducer',$item['id']]).'</td></tr>';
//                               }
//                            }
//                        }
                        ?>
                </table>
            </div>
        </div>       
    </div>
</div>