<?php
	
	class DashboardController extends AppController {

		public $uses = array("Venda");

		public function admin_index(){
			
			$dados = $this->Venda->query(
				"select 
					sum(pv.preco) as total,pro.nome 
					from vendas v
						join produto_vendas pv on pv.venda_id = v.id
						join produtos pro on pro.id = pv.produto_id
						group by pro.nome"
			);
			
			$labels = "";
			$valores = "";

			for ($i=0; $i <count($dados) ; $i++) { 
				
				$labels .= "'".$dados[$i]["pro"]["nome"]."',";
				$valores .= $dados[$i]["0"]["total"].",";

			}

			$labels = substr($labels, 0,-1);
			$valores = substr($valores, 0,-1);
			
			$this->set("labels",$labels);
			$this->set("valores",$valores);

		}

		public function vendedor_index(){
			
			$sessao = $this->Session->read("vendedor");

			$dados = $this->Venda->query(
				"select 
					sum(pv.preco) as total,pro.nome 
					from vendas v
						join produto_vendas pv on pv.venda_id = v.id
						join produtos pro on pro.id = pv.produto_id
						where v.parceiro_id = ".$sessao["Parceiro"]["id"]."
						group by pro.nome"
			);
			
			$labels = "";
			$valores = "";

			for ($i=0; $i <count($dados) ; $i++) { 
				
				$labels .= "'".$dados[$i]["pro"]["nome"]."',";
				$valores .= $dados[$i]["0"]["total"].",";

			}

			$labels = substr($labels, 0,-1);
			$valores = substr($valores, 0,-1);
			
			$this->set("labels",$labels);
			$this->set("valores",$valores);

		}

	}