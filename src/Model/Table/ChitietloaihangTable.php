<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Chitietloaihang Model
 *
 * @property \App\Model\Table\LoaihangTable|\Cake\ORM\Association\BelongsTo $Loaihang
 * @property \App\Model\Table\MathangTable|\Cake\ORM\Association\HasMany $Mathang
 *
 * @method \App\Model\Entity\Chitietloaihang get($primaryKey, $options = [])
 * @method \App\Model\Entity\Chitietloaihang newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Chitietloaihang[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Chitietloaihang|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Chitietloaihang|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Chitietloaihang patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Chitietloaihang[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Chitietloaihang findOrCreate($search, callable $callback = null, $options = [])
 */
class ChitietloaihangTable extends Table
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

        $this->setTable('chitietloaihang');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Loaihang', [
            'foreignKey' => 'loaihang_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Mathang', [
            'foreignKey' => 'chitietloaihang_id'
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
            ->scalar('tenchitietloaihang')
            ->maxLength('tenchitietloaihang', 100)
            ->requirePresence('tenchitietloaihang', 'create')
            ->allowEmptyString('tenchitietloaihang', false);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['loaihang_id'], 'Loaihang'));

        return $rules;
    }
}
