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

}
