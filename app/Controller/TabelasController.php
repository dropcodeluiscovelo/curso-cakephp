<?php
	
	class TabelasController extends AppController {

		public $uses = array("Tabela","ProdutoTabela","Produto","Parceiro");
		var $components = array("Ajuda");

		public function admin_index(){

			$tabelas = $this->Tabela->find("all");

			for ($i=0; $i <count($tabelas) ; $i++) { 
				$tabelas[$i]["Tabela"]["created"] = $this->Ajuda->TratarData($tabelas[$i]["Tabela"]["created"]);
			}

			$this->set("tabelas",$tabelas);

		}

		public function admin_add(){

			if($this->request->is("POST")){

				if($this->Tabela->save($this->request->data)){

					$tabela_id = $this->Tabela->id;

					$produtos = $this->Produto->find("all");

					for ($i=0; $i <count($produtos) ; $i++) { 
						
						$this->ProdutoTabela->save(array(
							"id" => null,
							"produto_id" => $produtos[$i]["Produto"]["id"],
							"tabela_id" => $tabela_id
						));

					}

					$this->Session->setFlash(__("Cadastrado com sucesso."),"default",array("class"=>"alert alert-success"));
					$this->redirect(array("action"=>"index"));
				}

			}

		}

		public function admin_edit($id){

			if($this->request->is("PUT")){

				$this->request->data["Tabela"]["id"] = $id;

				if($this->Tabela->save($this->request->data)){
					$this->Session->setFlash(__("Alterado com sucesso."),"default",array("class"=>"alert alert-success"));
					$this->redirect(array("action"=>"index"));
				}

			}else{
				$this->request->data = $this->Tabela->findByid($id);
			}

		}

		public function admin_produtos($id){

			$produtos = $this->ProdutoTabela->find("all",array(
				"conditions"=>array("ProdutoTabela.tabela_id"=>$id)));

			for ($i=0; $i <count($produtos) ; $i++) { 
				$produtos[$i]["ProdutoTabela"]["created"] = $this->Ajuda->TratarData($produtos[$i]["ProdutoTabela"]["created"]);
				$produtos[$i]["ProdutoTabela"]["preco"] = $this->Ajuda->TratarMoeda($produtos[$i]["ProdutoTabela"]["preco"]);
			}

			$this->set("produtos",$produtos);

		}

		public function admin_preco($tabela_id,$produto_tabela_id){

			$this->set("tabela_id",$tabela_id);
			$this->set("produto_tabela_id",$produto_tabela_id);

			if($this->request->is("PUT")){

				$this->request->data["ProdutoTabela"]["id"] = $produto_tabela_id;

				if($this->ProdutoTabela->save($this->request->data)){
					$this->Session->setFlash(__("Alterado com sucesso."),"default",array("class"=>"alert alert-success"));
					$this->redirect(array("action"=>"produtos",$tabela_id));
				}

			}else{
				$this->request->data = $this->ProdutoTabela->findByid($produto_tabela_id);
			}

		}

		public function admin_delete($id){
			$this->autoRender = false;

			$parceiros = $this->Parceiro->find("all",
				array(
					"conditions" => array("Parceiro.tabela_id" => $id),
					"order" => array("Parceiro.id" => "asc")
				)
			);

			if(!empty($parceiros)){
				$this->Session->setFlash(__("Não é possível deletar pois existe(m) parceiro(s) vinculado(s) à ela."),"default",array("class"=>"alert alert-danger"));
				$this->redirect(array("action"=>"index"));
			}else{

				$produtos_tabela = $this->ProdutoTabela->find("all",
					array(
						"conditions"=>array("ProdutoTabela.tabela_id"=>$id)
					)
				);
				
				for ($i=0; $i <count($produtos_tabela) ; $i++) { 
					
					$this->ProdutoTabela->delete($produtos_tabela[$i]["ProdutoTabela"]["id"]);

				}

				$this->Tabela->delete($id);

				$this->Session->setFlash(__("Excluído com sucesso."),"default",array("class"=>"alert alert-success"));
				$this->redirect(array("action"=>"index"));

			}
			

		}


		public function vendedor_index(){

			$sessao = $this->Session->read("vendedor");

			$produtos = $this->ProdutoTabela->find("all",array(
				"conditions"=>array("ProdutoTabela.tabela_id"=>$sessao["Parceiro"]["tabela_id"])));

			for ($i=0; $i <count($produtos) ; $i++) { 
				$produtos[$i]["ProdutoTabela"]["created"] = $this->Ajuda->TratarData($produtos[$i]["ProdutoTabela"]["created"]);
				$produtos[$i]["ProdutoTabela"]["preco"] = $this->Ajuda->TratarMoeda($produtos[$i]["ProdutoTabela"]["preco"]);
			}

			$this->set("produtos",$produtos);

		}

	}