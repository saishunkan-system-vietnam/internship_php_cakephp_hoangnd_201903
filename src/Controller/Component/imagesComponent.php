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
        $this->ProductImages = TableRegistry::getTableLocator()->get('ProductImages');
    }

    public function getImage($id) {
        return $this->Images->get($id);
    }
    public function getProductImage($id) {
        return $this->ProductImages->get($id);
    }

    public function add($req) {
        $newImg = $this->Images->newEntity();
        $newImg->name = $req['name'];
        return $this->Images->save($newImg);
    }

    public function addProductImage($req) {
        $newProductImg = $this->ProductImages->newEntity();
        $newProductImg->products_id = $req['products_id'];
        $newProductImg->images_id = $req['images_id'];
        $newProductImg->avatar = true;
        $newProductImg->status = true;
        return $this->ProductImages->save($newProductImg);
    }

    public function findProductImage($products_id) {
        $lstProductImage = $this->ProductImages->find()
                        ->select($this->ProductImages)
                        ->select($this->Images)
                        ->join([
                            'Images' => [
                                'table' => 'images',
                                'type' => 'INNER',
                                'conditions' => 'ProductImages.images_id=Images.id'
                            ]
                        ])->where(['products_id' => $products_id])->toArray();
        return $lstProductImage;
    }

    public function selectImages($name) {
        return $this->Images->find()->where(['name' => $name])->first();
    }

    public function delete($id) {
        $image=$this->getImage($id);
        return $this->Images->delete($image);
    }

    public function deleteProductImage($id) {
        $productImage=  $this->getProductImage($id);
        return $this->ProductImages->delete($productImage);
    }

}
