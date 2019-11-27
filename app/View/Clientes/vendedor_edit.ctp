<div class="col-md-12 box">
	
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			
			<h1><center>NOVO CLIENTE</center></h1>

			<?php  
				echo $this->Form->create("Cliente");
				echo $this->Form->input("nome",array("type"=>"text","label"=>"Nome","class"=>"form-control","required"));
				echo $this->Form->input("cnpj_cpf",array("type"=>"text","label"=>"CNPJ/CPF","class"=>"form-control","required"))."<br>";
				echo $this->Form->button("Cadastrar",array("type"=>"submit","class"=>"btn btn-success"));
			?>

		</div>
		<div class="col-md-2"></div>
	</div>
	
</div>