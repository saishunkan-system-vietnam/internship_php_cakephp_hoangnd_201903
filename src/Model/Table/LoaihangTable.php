<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class LoaihangTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('loaihang');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Chitietloaihang', [
            'foreignKey' => 'loaihang_id'
        ]);
    }
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('tenloaihang')
            ->maxLength('tenloaihang', 100)
            ->requirePresence('tenloaihang', 'create')
            ->allowEmptyString('tenloaihang', false);

        return $validator;
    }
}
