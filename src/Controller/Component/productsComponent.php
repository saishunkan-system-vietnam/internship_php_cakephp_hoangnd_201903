<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class productsComponent extends Component {

    private $Products;
    private $Categories;
    private $ProductImages;
    private $Images;

    public function initialize(array $config) {
        parent::initialize($config);
        $this->Products = TableRegistry::getTableLocator()->get('Products');
        $this->Categories = TableRegistry::getTableLocator()->get('Categories');
        $this->ProductImages = TableRegistry::getTableLocator()->get('ProductImages');
        $this->Images=  TableRegistry::getTableLocator()->get('Images');
    }

    public function get($id) {
        return $this->Products->get($id);
    }

    public function selectAll($req=null) {
        $lstProduct = $this->Products->find('all')
                ->select($this->Products)
                ->select($this->Categories)
                ->select($this->ProductImages)
                ->select($this->Images)
                ->join([
                    'Categories' => [
                        'table' => 'categories',
                        'type' => 'LEFT',
                        'conditions' => 'Categories.id=products.categories_id'
                    ]
                ]) 
                ->join([
                    'ProductImages' => [
                        'table' => 'product_images',
                        'type' => 'LEFT',
                        'conditions' => 'products.id=ProductImages.products_id and ProductImages.avatar=TRUE'
                    ]
                ])
                ->join([
                    'Images' => [
                        'table' => 'images',
                        'type' => 'LEFT',
                        'conditions' => 'ProductImages.images_id=Images.id'
                    ]
                ])->toArray();
        
        if(!empty($req)){
            foreach ($lstProduct as $key=>$value){
                if(isset($req['id'])){
                    if($value['id']!=$req['id']){
                        unset($lstProduct[$key]);
                    }
                }
            }
        }
      return $lstProduct;
    }

    public function add($reqProduct) {
        $newProduct = $this->Products->newEntity();
        $newProduct->name = $reqProduct['name'];
        $newProduct->price = $reqProduct['price'];
        $newProduct->quantity = $reqProduct['quantity'];
        $newProduct->status = $reqProduct['status'];
        $newProduct->description = $reqProduct['description'];
        $newProduct->categories_id = $reqProduct['categories_id'];
        return $this->Products->save($newProduct);
    }

    // function update product with condition is product ID
    public function update($reqProduct) {
        $product = $this->get($reqProduct['id']);
        $product->name = $reqProduct['name'];
        $product->price = $reqProduct['price'];
        $product->quantity = $reqProduct['quantity'];
        $product->status = $reqProduct['status'];
        $product->description = $reqProduct['description'];
        $product->categories_id = $reqProduct['categories_id'];
        return $this->Products->save($product);
    }

    public function delete($id) {
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            return TRUE;
        } else {
            return False;
        }
    }

}
