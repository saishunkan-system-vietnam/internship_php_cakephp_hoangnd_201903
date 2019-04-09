<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Specifications Model
 *
 * @property \App\Model\Table\SpecificationsTable|\Cake\ORM\Association\BelongsTo $ParentSpecifications
 * @property \App\Model\Table\SpecificationsTable|\Cake\ORM\Association\HasMany $ChildSpecifications
 *
 * @method \App\Model\Entity\Specification get($primaryKey, $options = [])
 * @method \App\Model\Entity\Specification newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Specification[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Specification|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Specification|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Specification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Specification[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Specification findOrCreate($search, callable $callback = null, $options = [])
 */
class SpecificationsTable extends Table
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

        $this->setTable('specifications');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('ParentSpecifications', [
            'className' => 'Specifications',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildSpecifications', [
            'className' => 'Specifications',
            'foreignKey' => 'parent_id'
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
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    
    
//    public function buildRules(RulesChecker $rules)
//    {
//        $rules->add($rules->existsIn(['parent_id'], 'ParentSpecifications'));
//
//        return $rules;
//    }
}
