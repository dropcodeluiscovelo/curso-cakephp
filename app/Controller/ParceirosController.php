<?php

	class ParceirosController extends AppController {

		public $uses = array("Parceiro","Tabela");
		var $components = array("Ajuda");

		public function admin_index(){

			$parceiros = $this->Parceiro->find("all");

			for ($i=0; $i <count($parceiros) ; $i++) { 
				$parceiros[$i]["Parceiro"]["created"] = $this->Ajuda->TratarData($parceiros[$i]["Parceiro"]["created"]);
			}

			$this->set("parceiros",$parceiros);

		}

		public function admin_add(){

			$tabelas = $this->Tabela->find("list");
			$this->set("tabelas",$tabelas);
			
			if($this->request->is("POST")){

				if($this->Parceiro->save($this->request->data)){
					$this->Session->setFlash(__("Cadastrado com sucesso."),"default",array("class"=>"alert alert-success"));
					$this->redirect(array("action"=>"index"));
				}

			}

		}

		public function admin_edit($id){

			$tabelas = $this->Tabela->find("list");
			$this->set("tabelas",$tabelas);

			if($this->request->is("PUT")){

				$this->request->data["Parceiro"]["id"] = $id;

				if($this->Parceiro->save($this->request->data)){
					$this->Session->setFlash(__("Alterado com sucesso."),"default",array("class"=>"alert alert-success"));
					$this->redirect(array("action"=>"index"));
				}

			}else{
				$this->request->data = $this->Parceiro->findByid($id);
			}

		}

		public function vendedor_index(){

			$sessao = $this->Session->read("vendedor");

			$parceiros = $this->Parceiro->find("all",array("conditions"=>array("Parceiro.id"=>$sessao["Usuario"]["id"])));

			for ($i=0; $i <count($parceiros) ; $i++) { 
				$parceiros[$i]["Parceiro"]["created"] = $this->Ajuda->TratarData($parceiros[$i]["Parceiro"]["created"]);
			}

			$this->set("parceiros",$parceiros);

		}

	}
