<?php

namespace App\Controller\Home;

use App\Controller\Home\HomesController;

class ProductsController extends HomesController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('products');
        $this->loadComponent('specifications');
        $this->loadComponent('productspecifications');
    }

    public function index() {
        $this->set("title","Trang chủ");
        $req = $this->request->getQuery();
        $key="";
        if (isset($req["key"])) {          
            if($req["key"]==""){
                return $this->redirect(['action'=>'index']);
            }
            $countProduct = $this->products->count(['keySearch' => $req["key"]]);
            $key=$req["key"];
            $this->set("title","Tìm kiếm");
        } else{            
            $countProduct = $this->products->count();            
        }
        $pageNumber = ($countProduct % 4 == 0) ? $countProduct / 4 : (int) ($countProduct / 4) + 1;
        $this->set('countProduct', $countProduct);
        $this->set('pageNumber', $pageNumber);
        $this->set("key",$key);
    }

    public function view($id = null) {        
        $product = $this->products->selectAll(['id' => $id]);
        $product= array_pop($product);
        $groupOptions=$this->productspecifications->group($id);
        $this->set('groupOptions',$groupOptions);
        $lstOptions=$this->productspecifications->selectAll(['products_id'=>$id]);
        $arrOptions=[];
        $lstSpecification=$this->specifications->where(['parent_id'=>0]);
        $this->set('lstSpecification',$lstSpecification);
//         echo '<pre>';
//        var_dump($lstSpecification);
//        die;
        foreach ($groupOptions as $value){
            $arrOptions[$value['options']]=[];
            foreach ($lstOptions as $v){                
                if($value['options']==$v['options']){
                    $arrOptions[$value['options']][$v['Specifications']['parent_id']]=$v;
                }
            }
        }
        
        $this->set('lstOptions',$arrOptions);       
        $this->set('product',$product);
        $this->set("title",$product['name']);
       
    }

}
