<div class="col-md-12 box">
	
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			
			<h1><center>ALTERAR PRODUTO</center></h1>

			<?php  
				echo $this->Form->create("Produto");
				echo $this->Form->input("nome",array("type"=>"text","label"=>"Nome","class"=>"form-control","required"))."<br>";
				echo $this->Form->button("Alterar",array("type"=>"submit","class"=>"btn btn-success"));
			?>

		</div>
		<div class="col-md-2"></div>
	</div>
	
</div>