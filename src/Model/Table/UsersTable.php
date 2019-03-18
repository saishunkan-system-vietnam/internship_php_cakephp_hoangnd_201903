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

        $validator->requirePresence('username', 'Users', 'cần nhập vào username')
                ->maxLength('username', 100, 'Tối đa cho phép nhập 100 kí tự')
                ->allowEmptyString('username', FALSE, 'username không được để trống');


        $validator->maxLength('name', 30, 'Tối đa nhập cho phép nhập 30 kí tự')
                ->allowEmptyString('name', False, 'Họ tên không được để trống');
        $validator->requirePresence('password', 'Users', 'cần nhập vào password')
                ->allowEmptyString('password', FALSE, 'password không được để chống');
        $validator->allowEmptyString('passwordAgain', False, 'Xác nhận password không được để trống')
                ->add('confirm_password', 'no-misspelling', [
                    'rule' => ['compareWith', 'password'],
                    'message' => 'Passwords are not equal',
        ]);
//                ->add('passwordAgain', [
//                    'password_mismatch' => [
//                        'rule' => ['compareWith', 'password'],
//                        'message' => 'Hai password nhập vào phải giống nhau'
//                    ]
//        ]);


        return $validator;
    }

    public function validationRegestration(Validator $validator) {
        $validator = $this->validationDefault($validator);
        $validator->add('username', [
            'unique' => [
                'rule' => 'validateUnique',
                'provider' => 'table',
                'message' => 'username đã tồn tại, vui lòng nhập tên khác'
            ]
        ]);
        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
//    public function buildRules(RulesChecker $rules) {
//        $rules->add($rules->isUnique(['username']));
//
//        return $rules;
//    }
}
