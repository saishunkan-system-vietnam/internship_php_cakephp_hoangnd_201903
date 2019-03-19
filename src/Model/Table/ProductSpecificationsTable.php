<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductSpecifications Model
 *
 * @property \App\Model\Table\ProductsTable|\Cake\ORM\Association\BelongsTo $Products
 *
 * @method \App\Model\Entity\ProductSpecification get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductSpecification newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductSpecification[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductSpecification|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductSpecification|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductSpecification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductSpecification[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductSpecification findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductSpecificationsTable extends Table
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

        $this->setTable('product_specifications');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Products', [
            'foreignKey' => 'products_id',
            'joinType' => 'INNER'
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
            ->integer('os')
            ->requirePresence('os', 'create')
            ->allowEmptyString('os', false);

        $validator
            ->integer('cpu')
            ->requirePresence('cpu', 'create')
            ->allowEmptyString('cpu', false);

        $validator
            ->integer('rear_camera')
            ->requirePresence('rear_camera', 'create')
            ->allowEmptyString('rear_camera', false);

        $validator
            ->integer('front_camera')
            ->requirePresence('front_camera', 'create')
            ->allowEmptyString('front_camera', false);

        $validator
            ->integer('memory')
            ->requirePresence('memory', 'create')
            ->allowEmptyString('memory', false);

        $validator
            ->integer('storage')
            ->requirePresence('storage', 'create')
            ->allowEmptyString('storage', false);

        $validator
            ->integer('weight')
            ->requirePresence('weight', 'create')
            ->allowEmptyString('weight', false);

        $validator
            ->integer('dimensions')
            ->requirePresence('dimensions', 'create')
            ->allowEmptyString('dimensions', false);

        $validator
            ->integer('screem')
            ->requirePresence('screem', 'create')
            ->allowEmptyString('screem', false);

        $validator
            ->integer('color')
            ->requirePresence('color', 'create')
            ->allowEmptyString('color', false);

        $validator
            ->integer('battery')
            ->requirePresence('battery', 'create')
            ->allowEmptyString('battery', false);

        $validator
            ->integer('memory_card')
            ->requirePresence('memory_card', 'create')
            ->allowEmptyString('memory_card', false);

        $validator
            ->integer('sim_card')
            ->requirePresence('sim_card', 'create')
            ->allowEmptyString('sim_card', false);

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
        $rules->add($rules->existsIn(['products_id'], 'Products'));

        return $rules;
    }
}
