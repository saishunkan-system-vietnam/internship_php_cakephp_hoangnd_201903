<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Nhomhang Model
 *
 * @property \App\Model\Table\MathangTable|\Cake\ORM\Association\HasMany $Mathang
 *
 * @method \App\Model\Entity\Nhomhang get($primaryKey, $options = [])
 * @method \App\Model\Entity\Nhomhang newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Nhomhang[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Nhomhang|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Nhomhang|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Nhomhang patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Nhomhang[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Nhomhang findOrCreate($search, callable $callback = null, $options = [])
 */
class NhomhangTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('nhomhang');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Mathang', [
            'foreignKey' => 'nhomhang_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('tennhomhang')
            ->maxLength('tennhomhang', 100)
            ->requirePresence('tennhomhang', 'create')
            ->allowEmptyString('tennhomhang', false);

        return $validator;
    }
}
