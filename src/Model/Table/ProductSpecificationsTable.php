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
 * @property \App\Model\Table\SpecificationsTable|\Cake\ORM\Association\BelongsTo $Specifications
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
        $this->belongsTo('Specifications', [
            'foreignKey' => 'specifications_id',
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
//        $rules->add($rules->existsIn(['products_id'], 'Products'));
//        $rules->add($rules->existsIn(['specifications_id'], 'Specifications'));
//
//        return $rules;
//    }
}
