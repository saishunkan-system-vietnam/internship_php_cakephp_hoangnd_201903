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
        $specification = $this->get($id);
        if ($this->Specifications->delete($specification)) {
            return TRUE;
        } else {
            return False;
        }
    }

    public function where($req = null) {
         
       $lstSpecification = $this->Specifications->find();
       
        if (!empty($req)) {
            if (isset($req['parent_id'])) {
               $lstSpecification->where(['parent_id'=>$req['parent_id']]);
            }
        } 
        return $lstSpecification->toArray();
    }   


    public function getOptionParent($lstSpecification) {
        $arrOption = [['value'=>'','text'=>'--- Chọn option ---','hidden']];
        if(count($lstSpecification)>0){
            foreach ($lstSpecification as $value) {
            $arrOption[$value['id'].'_'.  str_replace(' ', '_', $value['name'])] = $value['name'];
        }
        }
        return $arrOption;
    }

}
