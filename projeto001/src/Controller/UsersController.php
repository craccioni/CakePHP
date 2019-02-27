<?php 

namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController{
	
	public function index() {
		
		//implementação da paginação
		$this->paginate = [
        	'limit' => 10,
        	'order' => [
        		'Users.id' => 'asc',
        	]
        ];
		//$usuario = "Camila";
		//$this->set(['usuarios' => $usuario]);
		//$usuarios = $this->Users->find()->all(); traz todos os registros
		//$this->set(['usuarios' => $usuarios]); otimizado abaixo
		$usuarios = $this->paginate($this->Users);
		$this->set(compact('usuarios'));
	}
}