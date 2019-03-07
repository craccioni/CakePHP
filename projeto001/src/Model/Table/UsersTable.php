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
}

public function initialize () {

	parent::initialize($config);
	$this->setTable('users');
	$this->addBehavior('Timestamp')
}

public function validationDefault (Validator $validator) {

	$validator
	->integer('id')
	->allowEmpty('id', 'create');

	$validator
	->requirePresence('name', 'create')
	->notEmpty('name');

	return $validator;
}
