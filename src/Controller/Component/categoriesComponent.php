<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class categoriesComponent extends Component {

    private $Categories;

    public function initialize(array $config) {
        parent::initialize($config);
        $this->Categories = TableRegistry::get('Categories');
    }

    public function selectAll() {
        return $this->Categories->find()->toArray();
    }

    public function add(array $reqCategory) {

        if (isset($reqCategory['name']) and isset($reqCategory['parent_id'])) {
            $newCategory = $this->Categories->newEntity();
            $newCategory->name = $reqCategory['name'];
            $newCategory->parent_id = $reqCategory['parent_id'];
            if ($this->Categories->save($newCategory)) {
                return TRUE;
            } else {
                return False;
            }
        } else {
            return False;
        }
    }

    public function getSelectOption() {
        $categories= $this->Categories->find('all')->where(['parent_id'=>0])->order(['name'=>'ASC']);
        $arrCategories = [];
        if (count($categories) > 0) {
            foreach ($categories as $item) {
                $arrCategories = array_merge($arrCategories, [['value' => $item['id'], 'text' => $item['name']]]);
            }
        }
        return $arrCategories;
    }

}
