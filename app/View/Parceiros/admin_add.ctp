<div class="col-md-12 box">
	
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			
			<h1><center>NOVO PARCEIRO</center></h1>

			<?php  
				echo $this->Form->create("Parceiro");
				echo $this->Form->input("razaosocial",array("type"=>"text","label"=>"Razão Social","class"=>"form-control","required"));
				echo $this->Form->input("tabela_id",array("label"=>"Tabela de Preço","class"=>"form-control","required","options"=>$tabelas,"empty"=>"Selecione uma tabela"))."<br>";
				echo $this->Form->button("Cadastrar",array("type"=>"submit","class"=>"btn btn-success"));
			?>

		</div>
		<div class="col-md-2"></div>
	</div>
	
</div>