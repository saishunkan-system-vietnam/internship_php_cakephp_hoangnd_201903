<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class imagesComponent extends Component {

    private $Images;
    private $ProductImages;

    public function initialize(array $config) {
        parent::initialize($config);
        $this->Images = TableRegistry::getTableLocator()->get('Images');
        $this->ProductImages=  TableRegistry::getTableLocator()->get('ProductImages');
    }
    
    
    
    public function add($req){
        $newImg=  $this->Images->newEntity();
        $newImg->name=$req['name'];
        return $this->Images->save($newImg);
    }
     public function addProductImage($req){
        $newProductImg=  $this->ProductImages->newEntity();
        $newProductImg->products_id=$req['products_id'];
        $newProductImg->images_id=$req['images_id'];
        return $this->ProductImages->save($newProductImg);
    }
    
    public function selectImages($name){
        return $this->Images->find()->where(['name'=>$name])->first();
    }
    
//    public function selectProductImages($req){
//        $lstImg=  $this->find()->
//    }

}
