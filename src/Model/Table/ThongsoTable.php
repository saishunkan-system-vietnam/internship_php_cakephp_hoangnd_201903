<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Thongso Model
 *
 * @property \App\Model\Table\MathangsTable|\Cake\ORM\Association\BelongsTo $Mathangs
 *
 * @method \App\Model\Entity\Thongso get($primaryKey, $options = [])
 * @method \App\Model\Entity\Thongso newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Thongso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Thongso|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Thongso|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Thongso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Thongso[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Thongso findOrCreate($search, callable $callback = null, $options = [])
 */
class ThongsoTable extends Table
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

        $this->setTable('thongso');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Mathangs', [
            'foreignKey' => 'mathang_id',
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
            ->scalar('manhinh')
            ->maxLength('manhinh', 150)
            ->requirePresence('manhinh', 'create')
            ->allowEmptyString('manhinh', false);

        $validator
            ->scalar('hedieuhanh')
            ->maxLength('hedieuhanh', 50)
            ->requirePresence('hedieuhanh', 'create')
            ->allowEmptyString('hedieuhanh', false);

        $validator
            ->scalar('camerasau')
            ->maxLength('camerasau', 255)
            ->requirePresence('camerasau', 'create')
            ->allowEmptyString('camerasau', false);

        $validator
            ->scalar('cameratruoc')
            ->maxLength('cameratruoc', 255)
            ->requirePresence('cameratruoc', 'create')
            ->allowEmptyString('cameratruoc', false);

        $validator
            ->scalar('cpu')
            ->maxLength('cpu', 50)
            ->requirePresence('cpu', 'create')
            ->allowEmptyString('cpu', false);

        $validator
            ->scalar('ram')
            ->maxLength('ram', 20)
            ->requirePresence('ram', 'create')
            ->allowEmptyString('ram', false);

        $validator
            ->scalar('rom')
            ->maxLength('rom', 20)
            ->requirePresence('rom', 'create')
            ->allowEmptyString('rom', false);

        $validator
            ->scalar('thenho')
            ->maxLength('thenho', 20)
            ->requirePresence('thenho', 'create')
            ->allowEmptyString('thenho', false);

        $validator
            ->scalar('thesim')
            ->maxLength('thesim', 255)
            ->requirePresence('thesim', 'create')
            ->allowEmptyString('thesim', false);

        $validator
            ->scalar('pin')
            ->maxLength('pin', 20)
            ->requirePresence('pin', 'create')
            ->allowEmptyString('pin', false);

        $validator
            ->scalar('trongluong')
            ->maxLength('trongluong', 20)
            ->requirePresence('trongluong', 'create')
            ->allowEmptyString('trongluong', false);

        $validator
            ->scalar('kichthuoc')
            ->maxLength('kichthuoc', 50)
            ->requirePresence('kichthuoc', 'create')
            ->allowEmptyString('kichthuoc', false);

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
        $rules->add($rules->existsIn(['mathang_id'], 'Mathangs'));

        return $rules;
    }
}
