<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class productspecificationsComponent extends Component {

    private $ProductSpecification;

    public function initialize(array $config) {
        parent::initialize($config);
        $this->ProductSpecification = TableRegistry::getTableLocator()->get('ProductSpecifications');
    }

    public function get($id) {
        return $this->ProductSpecification->get($id);
    }

    public function add($req) {
        $newProductSpecification = $this->ProductSpecification->newEntity();
        $newProductSpecification->price_option=$req['price_option'];
        $newProductSpecification->options=$req['options'];
        $newProductSpecification->products_id = $req['products_id'];
        $newProductSpecification->specifications_id = $req['specifications_id'];
        return $this->ProductSpecification->save($newProductSpecification);
    }

    // function update product with condition is product ID
    public function update($req) {
        $productSpecification = $this->get($req['id']);
        $products_id = (isset($req['products_id'])) ? $req['products_id'] : $productSpecification['products_id'];
        $specifications_id = (isset($req['specifications_id'])) ? $req['specifications_id'] : $productSpecification['specifications_id'];
        $productSpecification->products_id = $products_id;
        $productSpecification->specifications_id = $specifications_id;
        return $this->ProductSpecification->save($productSpecification);
    }

//    public function delete($id) {
//        $exitSpecification = $this->where(['parent_id' => $id]);
//        if (count($exitSpecification) > 0) {
//            return FALSE;
//        }
//        $specification = $this->get($id);
//        if ($this->Specifications->delete($specification)) {
//            return TRUE;
//        } else {
//            return False;
//        }
//    }
//
//    public function where($req = null) {
//        $lstSpecification = $this->Specifications->find()->toArray();
//        if (!empty($req)) {
//            if (isset($req['parent_id'])) {
//                foreach ($lstSpecification as $key => $value) {
//                    if ($value['parent_id'] != $req['parent_id']) {
//                        unset($lstSpecification[$key]);
//                    }
//                }
//            }
//        }
//        return $lstSpecification;
//    }
//
//    public function getOptionParent($lstSpecification) {
//        $arrOption = [];
//        foreach ($lstSpecification as $value) {
//            $arrOption[$value['id']] = $value['name'];
//        }
//        return $arrOption;
//    }

    public function count($req=null){
         $lstProductSpecification = $this->ProductSpecification->find();
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
         $lstProductSpecification = $this->ProductSpecification->find();
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
         $lstProductSpecification = $this->ProductSpecification->find();
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
        $query=  $this->ProductSpecification->find();
        $query->select('options')
                ->where(['products_id'=>$id])
                ->group('options');       
        return $query->toArray();
    }
    
}
