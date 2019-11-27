<div class="col-md-12 box">
	
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			
			<h1><center>NOVA VENDA</center></h1>

			<?php  
				echo $this->Form->create("Venda");

				echo $this->Form->input("cliente_id",array("label"=>"Cliente","class"=>"form-control","required","options"=>$clientes,"empty"=>"Selecione o cliente"));

				echo $this->Form->input("produto_id",array("id"=>"produto","label"=>"Produto","class"=>"form-control","required","options"=>$produtos,"empty"=>"Selecione o produto"));

			?>

			<div id="preco_produto"></div>

			<?php

				echo $this->Ajax->observeField('produto', array('url'=>array('controller'=>'vendas','action'=>'buscar_preco'), 'update'=>'preco_produto'))."<br>"; 

				echo $this->Form->button("Salvar",array("type"=>"submit","class"=>"btn btn-success"));
			?>

		</div>
		<div class="col-md-2"></div>
	</div>
	
</div>