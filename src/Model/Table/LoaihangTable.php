<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Loaihang Model
 *
 * @property \App\Model\Table\ChitietloaihangTable|\Cake\ORM\Association\HasMany $Chitietloaihang
 *
 * @method \App\Model\Entity\Loaihang get($primaryKey, $options = [])
 * @method \App\Model\Entity\Loaihang newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Loaihang[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Loaihang|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Loaihang|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Loaihang patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Loaihang[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Loaihang findOrCreate($search, callable $callback = null, $options = [])
 */
class LoaihangTable extends Table
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

        $this->setTable('loaihang');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Chitietloaihang', [
            'foreignKey' => 'loaihang_id'
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
            ->scalar('tenloaihang')
            ->maxLength('tenloaihang', 100)
            ->requirePresence('tenloaihang', 'create')
            ->allowEmptyString('tenloaihang', false);

        return $validator;
    }
}
