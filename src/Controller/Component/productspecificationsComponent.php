<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class productspecificationsComponent extends Component {

    private $ProductSpecifications;
    private $Specifications;

    public function initialize(array $config) {
        parent::initialize($config);
        $this->ProductSpecifications = TableRegistry::getTableLocator()->get('ProductSpecifications');
        $this->Specifications=  TableRegistry::getTableLocator()->get('Specifications');
    }

    public function get($id) {
        return $this->ProductSpecifications->get($id);
    }

    public function add($req) {
        $newProductSpecification = $this->ProductSpecifications->newEntity();
        $newProductSpecification->price_option=$req['price_option'];
        $newProductSpecification->options=$req['options'];
        $newProductSpecification->products_id = $req['products_id'];
        $newProductSpecification->specifications_id = $req['specifications_id'];
        return $this->ProductSpecifications->save($newProductSpecification);
    }

    // function update product with condition is product ID
    public function update($req) {
        $productSpecification = $this->get($req['id']);
        $products_id = (isset($req['products_id'])) ? $req['products_id'] : $productSpecification['products_id'];
        $specifications_id = (isset($req['specifications_id'])) ? $req['specifications_id'] : $productSpecification['specifications_id'];
        $productSpecification->products_id = $products_id;
        $productSpecification->specifications_id = $specifications_id;
        return $this->ProductSpecifications->save($productSpecification);
    }

    public function delete($req) {
       return $this->ProductSpecifications->deleteAll([
            'products_id'=>$req['products_id']
        ]);
    }   

    public function count($req=null){
         $lstProductSpecification = $this->ProductSpecifications->find();
         if(!empty($req)){
             if(isset($req['products_id'])){
                 $lstProductSpecification=$lstProductSpecification->where(['products_id'=>$req['products_id']]);
             }
             if(isset($req['specifications_id'])){
                 $lstProductSpecification=$lstProductSpecification->where(['specifications_id'=>$req['specifications_id']]);
             }
         }
         $result=$lstProductSpecification->count();         
         return $result;
    }


    public function max($req=null, $maxField){
         $lstProductSpecification = $this->ProductSpecifications->find();
         if(!empty($req)){
             if(isset($req['products_id'])){
                 $lstProductSpecification=$lstProductSpecification->where(['products_id'=>$req['products_id']]);
             }
             if(isset($req['specifications_id'])){
                 $lstProductSpecification=$lstProductSpecification->where(['specifications_id'=>$req['specifications_id']]);
             }
         }
         $result=$lstProductSpecification->max($maxField);
         
         return $result;
    }
    public function where($req=null){
         $lstProductSpecification = $this->ProductSpecifications->find();
         if(!empty($req)){
             if(isset($req['products_id'])){
                 $lstProductSpecification=$lstProductSpecification->where(['products_id'=>$req['products_id']]);
             }
             if(isset($req['specifications_id'])){
                 $lstProductSpecification=$lstProductSpecification->where(['specifications_id'=>$req['specifications_id']]);
             }
             if(isset($req['options'])){
                 $lstProductSpecification=$lstProductSpecification->where(['options'=>$req['options']]);
             }
         }        
         return $lstProductSpecification->toArray();
    }
    
     public function group($id){
        $query=  $this->ProductSpecifications->find();
        $query->select('options')
                ->select('products_id')
                ->select('price_option')
                ->where(['products_id'=>$id])
                ->group('options')      
                ->group('products_id')
                ->group('price_option');
        return $query->toArray();
    }
    
    public function selectAll($req=null){
          $lstProductSpecification = $this->ProductSpecifications->find();
          $lstProductSpecification->select($this->ProductSpecifications)
                  ->select($this->Specifications)
                  ->join([
                      'Specifications'=>[
                          'table'=>'specifications',
                          'type'=>'INNER',
                          'conditions'=>'Specifications.id= ProductSpecifications.specifications_id'
                      ]
                  ])
                  ;
         if(!empty($req)){
             if(isset($req['products_id'])){
                 $lstProductSpecification=$lstProductSpecification->where(['products_id'=>$req['products_id']]);
             }
             if(isset($req['specifications_id'])){
                 $lstProductSpecification=$lstProductSpecification->where(['specifications_id'=>$req['specifications_id']]);
             }
             if(isset($req['options'])){
                 $lstProductSpecification=$lstProductSpecification->where(['options'=>$req['options']]);
             }
         }        
         return $lstProductSpecification->toArray();
    }
    
}
