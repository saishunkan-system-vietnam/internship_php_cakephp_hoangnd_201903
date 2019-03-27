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
        $newProductImg->avatar = FALSE;
        $newProductImg->status = TRUE;
        return $this->ProductImages->save($newProductImg);
    }

    public function findProductImage($req) {
        $lstProductImage = $this->ProductImages->find()
                        ->select($this->ProductImages)
                        ->select($this->Images)
                        ->join([
                            'Images' => [
                                'table' => 'images',
                                'type' => 'INNER',
                                'conditions' => 'ProductImages.images_id=Images.id'
                            ]
                        ])->toArray();
        if (count($lstProductImage) > 0) {
            foreach ($lstProductImage as $key => $value) {
                if (isset($req['products_id'])) {
                    if ($req['products_id'] != $value['products_id']) {
                        unset($lstProductImage[$key]);
                    }
                }
                if (isset($req['avatar'])) {
                    if ($req['avatar'] !== $value['avatar']) {
                        unset($lstProductImage[$key]);
                    }
                }
                 if (isset($req['id!='])) {
                    if ($req['id!='] == $value['id']) {
                        unset($lstProductImage[$key]);
                    }
                }
                
            }
        }
        return $lstProductImage;
    }

    public function selectImages($name) {
        return $this->Images->find()->where(['name' => $name])->first();
    }

    public function delete($id) {
        $image = $this->getImage($id);
        unlink(WWW_ROOT . 'img\phone\\' . $image['name']);
        return $this->Images->delete($image);
    }

    public function deleteProductImage($id) {
        $productImage = $this->getProductImage($id);
        return $this->ProductImages->delete($productImage);
    }

    public function editProductImage($req) {
        $productImage = $this->getProductImage($req['id']);
        $avatar = $productImage->avatar;
        $status = $productImage->status;
        if (isset($req['avatar'])) {
            if ($req['avatar'] == TRUE) {
                $avatar = TRUE;
            } else if ($req['avatar'] == FALSE) {
                $avatar = FALSE;
            } else {
                $avatar = $productImage->status;
            }
        }
        if (isset($req['status'])) {
            if ($req['status'] == TRUE) {
                $status = TRUE;
            } elseif ($req['status'] == FALSE) {
                $status = FALSE;
            } else {
                $status = $productImage->status;
            }
        }
        $productImage->avatar = $avatar;
        $productImage->status = $status;
        return $this->ProductImages->save($productImage);
    }

}
