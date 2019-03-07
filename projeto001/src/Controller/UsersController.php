<?php 

namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController{
	
	public function index() {
		
		//implementação da paginação
		$this->paginate = [
        	'limit' => 12,
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

	public function view($id = null){

		$usuario = $this->Users->get($id);
		$this->set(['usuario' => $usuario]);
	}

	public function add() {

		$user = $this->Users->newEntity();

		if($this->request->is('post')){
			$user = $this->Users->patchEntity($user, $this->request->getData());
			
			if($this->Users->save($user)){
				$this->Flash->success(_('Usuário cadastrado com sucesso'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->success(_('Erro: Usuário não foi cadastrado com sucesso'));
			}
		}

		$this->set(compact('user'));
	}
}