<?php

	class UsuariosController extends AppController {

		public $uses = array("Usuario","Parceiro","Venda");
		var $components = array("Ajuda");

		public function admin_index(){

			$usuarios = $this->Usuario->find("all");

			for ($i=0; $i <count($usuarios) ; $i++) { 

				if($usuarios[$i]["Usuario"]["tipo_usuario"]==0){
					$usuarios[$i]["Usuario"]["tipo_usuario"] = "Administrador";
				}else{
					$usuarios[$i]["Usuario"]["tipo_usuario"] = "Vendedor";
				}

				$usuarios[$i]["Usuario"]["created"] = $this->Ajuda->TratarData($usuarios[$i]["Usuario"]["created"]);
			}

			$this->set("usuarios",$usuarios);

		}

		public function admin_add(){

			$tipo_usuario = array(
				"0" => "Administrador",
				"1" => "Vendedor"
			);
			$this->set("tipo_usuario",$tipo_usuario);

			$parceiros = $this->Parceiro->find("list");
			$this->set("parceiros",$parceiros);

			if($this->request->is("POST")){

				$this->request->data["Usuario"]["senha"] = md5($this->request->data["Usuario"]["senha"]);

				if($this->Usuario->save($this->request->data)){
					$this->Session->setFlash(__("Alterado com sucesso."),"default",array("class"=>"alert alert-success"));
					$this->redirect(array("action"=>"index"));
				}

			}

		}

		public function admin_edit($id){

			$tipo_usuario = array(
				"0" => "Administrador",
				"1" => "Vendedor"
			);
			$this->set("tipo_usuario",$tipo_usuario);

			$parceiros = $this->Parceiro->find("list");
			$this->set("parceiros",$parceiros);

			if($this->request->is("PUT")){

				if($this->Usuario->save($this->request->data)){
					$this->Session->setFlash(__("Alterado com sucesso."),"default",array("class"=>"alert alert-success"));
					$this->redirect(array("action"=>"index"));
				}

			}else{

				$this->request->data = $this->Usuario->findByid($id);

			}

		}

		public function admin_delete($id){
			$this->autoRender = false;

			$sessao = $this->Session->read("admin");
			$usuario = $this->Usuario->findByid($id);
			$administradores = $this->Usuario->find("count",
				array(
					"conditions"=>array("Usuario.tipo_usuario"=>0)
				)
			);

			$vendas = $this->Venda->find("count",
				array(
					"conditions"=>array("Venda.usuario_id"=>$id)
				)
			);

			if($vendas>0){
				$this->Session->setFlash(__("Não foi possível excluir pois existe(m) venda(s) vinculado(s) à este usuário."),"default",array("class"=>"alert alert-danger"));
				$this->redirect(array("action"=>"index"));
			}else{
				
				if($usuario["Usuario"]["id"]==1 || $usuario["Usuario"]["id"]==2){
					$this->Session->setFlash(__("Não é possível excluir o usuário padrão do sistema."),"default",array("class"=>"alert alert-danger"));
					$this->redirect(array("action"=>"index"));
				}

				if($administradores==1){
					$this->Session->setFlash(__("Não foi possível excluir pois o sistema precisa ao menos 1 usuário Administrador."),"default",array("class"=>"alert alert-danger"));
					$this->redirect(array("action"=>"index"));
				}

				if($sessao["Usuario"]["id"]==$usuario["Usuario"]["id"]){
					$this->Session->setFlash(__("Você não pode excluir seu próprio perfil."),"default",array("class"=>"alert alert-danger"));
					$this->redirect(array("action"=>"index"));
				}

				$this->Usuario->delete($id);

				$this->Session->setFlash(__("Usuário excluído com sucesso."),"default",array("class"=>"alert alert-success"));
				$this->redirect(array("action"=>"index"));

			}

		}

		public function login(){
			
			if($this->request->is("post","put")){

				$email = $this->request->data["Usuario"]["email"];
				$senha = md5($this->request->data["Usuario"]["senha"]);

				$usuario = $this->Usuario->findByemail($email);

				if(!empty($usuario) && $senha==$usuario["Usuario"]["senha"] ){

					$tipo_usuario = $usuario["Usuario"]["tipo_usuario"];

					if($tipo_usuario==0){
						
						$this->Session->write("admin",$usuario);
						$this->redirect("/admin/dashboard");

					}elseif($tipo_usuario==1){
						
						$this->Session->write("vendedor",$usuario);
						$this->redirect("/vendedor/dashboard");

					}else{
						$this->redirect(array("controller"=>"usuarios","action"=>"login"));
					}

				}else{
					$this->Session->setFlash(__('E-mail ou senha inválido.'), 'default', array('class'=>'alert alert-danger'));
					$this->redirect(array("controller"=>"usuarios","action"=>"login"));
				}

			}

		}

		public function admin_logout(){

			$this->Session->destroy();
			$this->redirect("/");

		}

		public function vendedor_logout(){

			$this->Session->destroy();
			$this->redirect("/");

		}

	}