<div class="col-md-12 box">
	
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			
			<h1><center>ALTERAR PREÇO</center></h1>

			<?php  
				echo $this->Form->create("ProdutoTabela",array($tabela_id,$produto_tabela_id));
				echo $this->Form->input("preco",array("type"=>"text","label"=>"Preço","class"=>"form-control","required"))."<br>";
				echo $this->Form->button("Alterar",array("type"=>"submit","class"=>"btn btn-success"));
			?>

		</div>
		<div class="col-md-2"></div>
	</div>
	
</div>