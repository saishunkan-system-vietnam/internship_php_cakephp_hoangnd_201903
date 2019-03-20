<div class="container-fluid">
    <div class="col-md-2">
        <h3>Category manager</h3> 
        <ul class="nav nav-pills nav-stacked">
            <li><?=$this->Html->link('Add category',['action'=>'add'],['class'=>'w3-bar-item w3-button'])?></li>
        </ul>       
    </div>
    <div class="col-md-10">
        <div  class="col-md-6">
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
                        if(count($lstProducer)>0){
                            foreach ($lstProducer as $item){
                               if($item['parent_id']===0){
                                    echo '<tr><td>'.$item['id'].'</td><td>'.$item['name'].'</td><td>'.$this->Html->link('Delete',['action'=>'delete',$item['id']]) 
                                            .' | '.$this->Html->link('Edit',['action'=>'editproducer',$item['id']]).'</td></tr>';
                               }
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div  class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">List subproducer</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Name subproducer
                            </th>
                            <th>
                                Producer ID
                            </th>
                            <th>
                               Action
                            </th>
                        </tr>
                        <?php
                        if(count($lstProducer)>0){
                            foreach ($lstProducer as $item){
                               if($item['parent_id']!==0){
                                    echo '<tr><td>'.$item['id'].'</td><td>'.$item['name'].'</td><td>'.$item['parent_id'].'</td><td>'.$this->Html->link('Delete',['action'=>'delete',$item['id']]) 
                                            .' | '.$this->Html->link('Edit',['action'=>'editsubproducer',$item['id']]).'</td></tr>';
                               }
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>