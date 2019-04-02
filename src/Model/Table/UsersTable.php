<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->scalar('username')
                ->maxLength('username', 100)
                ->requirePresence('username', 'create')
                ->allowEmptyString('username', false);
        // ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
                ->scalar('password')
                ->maxLength('password', 100)
                ->requirePresence('password', 'create')
                ->allowEmptyString('password', false);

//        $validator
//            ->scalar('name')
//            ->maxLength('name', 30)
//            ->requirePresence('name', 'create')
//            ->allowEmptyString('name', false);
//
//        $validator
//            ->boolean('sex')
//            ->requirePresence('sex', 'create')
//            ->allowEmptyString('sex', false);
//
//        $validator
//            ->date('birthday')
//            ->requirePresence('birthday', 'create')
//            ->allowEmptyDate('birthday', false);
//
//        $validator
//            ->scalar('phonenumber')
//            ->maxLength('phonenumber', 10)
//            ->requirePresence('phonenumber', 'create')
//            ->allowEmptyString('phonenumber', false);
//
//        $validator
//            ->scalar('address')
//            ->maxLength('address', 255)
//            ->requirePresence('address', 'create')
//            ->allowEmptyString('address', false);

        return $validator;
    }

    public function validationRegestration(Validator $validator) {
        $validator
                ->scalar('username')
                ->maxLength('username', 100)
                ->requirePresence('username', 'create')
                ->allowEmptyString('username', false)
                ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table','message'=>'Username is exits']);

        $validator
                ->scalar('password')
                ->maxLength('password', 100)
                ->requirePresence('password', 'create')
                ->allowEmptyString('password', false);

        $validator
                ->scalar('passwordAgain')
                ->maxLength('passwordAgain', 100)
                ->requirePresence('passwordAgain', 'create')
                ->allowEmptyString('passwordAgain', false)
                ->equalToField('passwordAgain', 'password', 'Password again must be equa password');

        $validator
                ->scalar('name')
                ->maxLength('name', 30)
                ->requirePresence('name', 'create')
                ->allowEmptyString('name', false);

        $validator
                ->boolean('sex')
                ->requirePresence('sex', 'create')
                ->allowEmptyString('sex', false);

        $validator
                ->date('birthday')
                ->requirePresence('birthday', 'create')
                ->allowEmptyDate('birthday', false);

        $validator
                ->scalar('phonenumber')
                ->maxLength('phonenumber', 10)
                ->requirePresence('phonenumber', 'create')
                ->allowEmptyString('phonenumber', false);

        $validator
                ->scalar('address')
                ->maxLength('address', 255)
                ->requirePresence('address', 'create')
                ->allowEmptyString('address', false);

        return $validator;
    }

    public function validationOrder(Validator $validator) {
        $validator
                ->scalar('name')
                ->maxLength('name', 30)
                ->requirePresence('name', 'create')
                ->allowEmptyString('name', false);

        $validator
                ->scalar('phonenumber')
                ->maxLength('phonenumber', 10)
                ->requirePresence('phonenumber', 'create')
                ->allowEmptyString('phonenumber', false);

        $validator
                ->scalar('address')
                ->maxLength('address', 255)
                ->requirePresence('address', 'create')
                ->allowEmptyString('address', false);
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
//        $rules->add($rules->isUnique(['username']));
//
//        return $rules;
//    }
}
