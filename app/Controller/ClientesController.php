<?php 

	class ClientesController extends AppController {

		public $uses = array("Cliente");
		var $components = array("Ajuda");

		public function vendedor_index(){

			$clientes = $this->Cliente->find("all");

			for ($i=0; $i <count($clientes) ; $i++) { 
				$clientes[$i]["Cliente"]["created"] = $this->Ajuda->TratarData($clientes[$i]["Cliente"]["created"]);
				$clientes[$i]["Cliente"]["cnpj_cpf"] = $this->Ajuda->TratarCnpjCpf($clientes[$i]["Cliente"]["cnpj_cpf"]);
			}

			$this->set("clientes",$clientes);

		}

		public function vendedor_add(){

			$sessao = $this->Session->read("vendedor");

			if($this->request->is("POST")){

				$this->request->data["Cliente"]["usuario_id"] = $sessao["Usuario"]["id"];
				$this->request->data["Cliente"]["parceiro_id"] = $sessao["Parceiro"]["id"];

				if($this->Cliente->save($this->request->data)){
					$this->Session->setFlash(__("Cadastrado com sucesso."),"default",array("class"=>"alert alert-success"));
					$this->redirect(array("action"=>"index"));
				}

			}

		}

		public function vendedor_edit($id){

			if($this->request->is("PUT")){

				$this->request->data["Cliente"]["id"] = $id;

				if($this->Cliente->save($this->request->data)){
					$this->Session->setFlash(__("Cadastrado com sucesso."),"default",array("class"=>"alert alert-success"));
					$this->redirect(array("action"=>"index"));
				}

			}else{
				$this->request->data = $this->Cliente->findByid($id);
			}

		}

	}