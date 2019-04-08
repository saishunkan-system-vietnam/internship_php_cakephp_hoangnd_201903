<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class specificationsComponent extends Component {

    private $Specifications;

    public function initialize(array $config) {
        parent::initialize($config);
        $this->Specifications = TableRegistry::getTableLocator()->get('Specifications');
    }

    public function get($id) {
        return $this->Specifications->get($id);
    }

    public function add($req) {
        $newSpecification = $this->Specifications->newEntity();
        $newSpecification->name = $req['name'];
        $newSpecification->parent_id = $req['parent_id'];
        return $this->Specifications->save($newSpecification);
    }

    // function update product with condition is product ID
    public function update($req) {
        $safecification = $this->get($req['id']);
        $parent_id = (isset($req['parent_id'])) ? $req['parent_id'] : $safecification['parent_id'];
        $name = (isset($req['name'])) ? $req['name'] : $safecification['name'];
        $safecification->name = $name;
        $safecification->parent_id = $parent_id;
        return $this->Specifications->save($safecification);
    }

    public function delete($id) {
        $exitSpecification = $this->where(['parent_id' => $id]);
        if (count($exitSpecification) > 0) {
            return FALSE;
        }
        var_dump($exitSpecification);
        die;
        $specification = $this->get($id);
        if ($this->Specifications->delete($specification)) {
            return TRUE;
        } else {
            return False;
        }
    }

    public function where($req = null) {
         
       $lstSpecification = $this->Specifications->find()->toArray();
       var_dump($lstSpecification);
       
        if (!empty($req)) {
            if (isset($req['parent_id'])) {
                foreach ($lstSpecification as $key => $value) {
                    if ($value['parent_id'] != $req['parent_id']) {
                         unset($lstSpecification[$key]);
                    }
                }
            }
        } die;
        return $lstSpecification;
    }

    public function getOptionParent($lstSpecification) {
        $arrOption = [];
        foreach ($lstSpecification as $value) {
            $arrOption[$value['id']] = $value['name'];
        }
        return $arrOption;
    }

}
