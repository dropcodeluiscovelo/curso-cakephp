<?php
	
	class ProdutosController extends AppController {

		public $uses = array("Produto","ProdutoVenda","ProdutoTabela","Tabela");
		var $components = array("Ajuda");

		public function admin_index(){

			$produtos = $this->Produto->find("all");

			for ($i=0; $i <count($produtos) ; $i++) { 
				$produtos[$i]["Produto"]["created"] = $this->Ajuda->TratarData($produtos[$i]["Produto"]["created"]);
			}

			$this->set("produtos",$produtos);

		}

		public function admin_add(){

			if($this->request->is("POST")){

				if($this->Produto->save($this->request->data)){

					$produto_id = $this->Produto->id;
					$tabelas = $this->Tabela->find("all");

					for ($i=0; $i <count($tabelas) ; $i++) { 
						
						$this->ProdutoTabela->save(array(
							"id" => null,
							"tabela_id" => $tabelas[$i]["Tabela"]["id"],
							"produto_id" => $produto_id,
							"preco" => 0
						));

					}

					$this->Session->setFlash(__("Cadastrado com sucesso."),"default",array("class"=>"alert alert-success"));
					$this->redirect(array("action"=>"index"));
				}

			}

		}

		public function admin_edit($id){

			if($this->request->is("PUT")){

				$this->request->data["Produto"]["id"] = $id;

				if($this->Produto->save($this->request->data)){
					$this->Session->setFlash(__("Alterado com sucesso."),"default",array("class"=>"alert alert-success"));
					$this->redirect(array("action"=>"index"));
				}

			}else{
				$this->request->data = $this->Produto->findByid($id);
			}

		}

		public function admin_delete($id){
			$this->autoRender = false;
			
			$vendas = $this->ProdutoVenda->findByproduto_id($id);
			if(!empty($vendas)){
				$this->Session->setFlash(__("Não é possível deletar pois já existe venda com este produto."),"default",array("class"=>"alert alert-danger"));
				$this->redirect(array("action"=>"index"));
			}

			$produto_tabela = $this->ProdutoTabela->find("all",array("conditions"=>array(
				"ProdutoTabela.produto_id"=>$id)));
			
			for ($i=0; $i <count($produto_tabela) ; $i++) { 
				
				$this->ProdutoTabela->delete($produto_tabela[$i]["ProdutoTabela"]["id"]);

			}

			$this->Produto->delete($id);

			$this->Session->setFlash(__("O produto foi excluído com sucesso."),"default",array("class"=>"alert alert-success"));
			$this->redirect(array("action"=>"index"));

		}

	}