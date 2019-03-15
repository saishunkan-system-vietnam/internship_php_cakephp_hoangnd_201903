<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class MathangTable extends Table
{
    public function validationDefault(Validator $validator) {
        $validator->allowEmptyString('chitietloaihang',FALSE,'Phải chọn chi tiết loại hàng')
                ->requirePresence('chitietloaihang','Mathang','Chi tiet mat hang can phai co');
        return $validator;
    }

}
