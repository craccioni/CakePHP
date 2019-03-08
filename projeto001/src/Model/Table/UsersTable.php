<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table {

	public function initialize(array $config) {

		parent::initialize($config);

		$this->table('users');

		$this->addBehavior('Timestamp');
	}

	public function validationDefault (Validator $validator) {

        $validator
        ->integer('id')
        ->allowEmpty('id', 'create');

        $validator
        ->requirePresence('name', 'create')
        ->notEmpty('name');

        $validator
        ->requirePresence('email', 'create')
        ->notEmpty('email');

        $validator
        ->requirePresence('username', 'create')
        ->notEmpty('username');

        $validator
        ->requirePresence('password', 'create')
        ->notEmpty('password');

        return $validator;
	}

        public function buildRules(RulesChecker $rules) {
            // Add a rule that is applied for create and update operations
            $rules->add(function ($entity, $options) {
                // Return a boolean to indicate pass/failure
            }, 'ruleName');

            // Add a rule for create.
            $rules->addCreate(function ($entity, $options) {
                // Return a boolean to indicate pass/failure
            }, 'ruleName');

            // Add a rule for update
            $rules->addUpdate(function ($entity, $options) {
                // Return a boolean to indicate pass/failure
            }, 'ruleName');

            // Add a rule for the deleting.
            $rules->addDelete(function ($entity, $options) {
                // Return a boolean to indicate pass/failure
            }, 'ruleName');

            return $rules;
        }



}