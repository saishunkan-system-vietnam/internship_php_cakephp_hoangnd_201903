<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class MathangTable extends Table
{
    public function validationDefault(Validator $validator) {
        $validator->allowEmptyString('tenmathang',false,'Tên mặt hàng không được để trống');
        
            
        
        $validator->allowEmptyFile('hinhanh', true)
                ->add('hinhanh', 'file',[
           'rule'=>['mimeType',['image/jpg','image/jpeg','image/png']],
            'message'=>'ảnh không đúng định dạng'
        ]);
        
         $validator->allowEmptyString('chitietloaihang',FALSE,'Chi tiết mặt hàng cần phải chọn')
                ->requirePresence('chitietloaihang','Mathang','Chi tiết mặt hàng cần phải chọn');
        return $validator;
    }
    
    public function validationUpdate(Validator $validator) {
        $validator= $this->validationDefault($validator);
        $validator->add('tenmathang', [
            'unique'=>[
                'rule'=>'validateUnique',
                'provider'=>'table',
                'message'=>'Tên mặt hàng đã tồn tại'
            ]
        ]);        
        $validator->allowEmptyFile('hinhanh',FALSE,'Hình ảnh là bắt buộc');
        
        return $validator;
    }

}
