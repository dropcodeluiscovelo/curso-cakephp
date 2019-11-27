<?php 

	class VendasController extends AppController {

		public $uses = array("Venda","Cliente","ProdutoTabela","Produto","ProdutoVenda");
		var $components = array("Ajuda");

		public function vendedor_index(){

			$sessao = $this->Session->read("vendedor");

			$vendas = $this->Venda->find("all",array("conditions"=>array(
				"Venda.parceiro_id"=>$sessao["Parceiro"]["id"])));

			for ($i=0; $i <count($vendas) ; $i++) { 
				
				$produto_venda = $this->ProdutoVenda->findByvenda_id($vendas[$i]["Venda"]["id"]);
				if(!empty($produto_venda)){
					$vendas[$i]["Venda"]["created"] = $this->Ajuda->TratarData($produto_venda["ProdutoVenda"]["created"]);
					$vendas[$i]["Venda"]["preco"] = $this->Ajuda->TratarMoeda($produto_venda["ProdutoVenda"]["preco"]);
					$vendas[$i]["Venda"]["produto"] = $produto_venda["Produto"]["nome"];
				}

			}

			$this->set("vendas",$vendas);

		}

		public function vendedor_add(){

			$sessao = $this->Session->read("vendedor");

			$clientes = $this->Cliente->find("list",
				array(
					"conditions"=>array(
						"Cliente.parceiro_id"=>$sessao["Parceiro"]["id"]
					)
				)
			);
			$this->set("clientes",$clientes);

			$produtos = $this->Produto->find("list");
			$this->set("produtos",$produtos);

			if($this->request->is("POST")){

				$dados_venda = array(
					"id" => null,
					"cliente_id" => $this->request->data["Venda"]["cliente_id"],
					"usuario_id" => $sessao["Usuario"]["id"],
					"parceiro_id" => $sessao["Parceiro"]["id"]
				);

				if($this->Venda->save($dados_venda)){

					$venda_id = $this->Venda->id;

					$dados_prod_venda = array(
						"venda_id" => $venda_id,
						"produto_id" => $this->request->data["Venda"]["produto_id"],
						"preco" => $this->request->data["Venda"]["preco"]
					);

					if($this->ProdutoVenda->save($dados_prod_venda)){

						$this->Session->setFlash(__("Venda cadastrada com sucesso."),"default",array("class"=>"alert alert-success"));
						$this->redirect(array("action"=>"detalhes",$venda_id));

					}else{
						$this->Venda->delete($venda_id);

						$this->Session->setFlash(__("Houve um erro ao inserir o produto da venda"),"default",array("class"=>"alert alert-danger"));
						$this->redirect(array("action"=>"add"));

					}

				}else{
					$this->Session->setFlash(__("Houve um erro ao criar venda"),"default",array("class"=>"alert alert-danger"));
					$this->redirect(array("action"=>"add"));
				}

			}

		}

		public function vendedor_detalhes($id){
			
			$sessao = $this->Session->read("vendedor");

			$venda = $this->Venda->find("all",array("conditions"=>array(
				"Venda.id"=>$id,"Venda.parceiro_id"=>$sessao["Parceiro"]["id"])));

			$produto_venda = $this->ProdutoVenda->findByvenda_id($venda["0"]["Venda"]["id"]);

			$venda["0"]["Venda"]["created"] = $this->Ajuda->TratarData($venda["0"]["Venda"]["created"]);
			$venda["0"]["Cliente"]["cnpj_cpf"] = $this->Ajuda->TratarCnpjCpf($venda["0"]["Cliente"]["cnpj_cpf"]);
			$produto_venda["ProdutoVenda"]["preco"] = $this->Ajuda->TratarMoeda($produto_venda["ProdutoVenda"]["preco"]);

			$this->set("venda",$venda["0"]);
			$this->set("produto_venda",$produto_venda);

		}

		public function vendedor_buscar_preco(){

			$this->layout = "ajax";

			$sessao = $this->Session->read("vendedor");

			if($this->request->is("POST")){

				$produto_id = $this->request->data["Venda"]["produto_id"];

				$produto = $this->ProdutoTabela->query(
					"select 
						* 
						from produto_tabelas pt
						where pt.tabela_id = ".$sessao["Parceiro"]["tabela_id"]."
						and pt.produto_id = ".$produto_id
				);

				if(!empty($produto)){
					$this->set("produto",$produto[0]);
				}else{
					$this->set("produto",array());
				}

			}
			

		}

	}