<div class="col-md-12 box">
	
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			
			<h1><center>NOVO USUÁRIO</center></h1>

			<?php  
				echo $this->Form->create("Usuario");
				echo $this->Form->input("nome",array("type"=>"text","label"=>"Nome","class"=>"form-control","required"));
				echo $this->Form->input("email",array("type"=>"email","label"=>"E-mail","class"=>"form-control","required"));
				echo $this->Form->input("senha",array("type"=>"password","label"=>"Senha","class"=>"form-control","required"));
				echo $this->Form->input("parceiro_id",array("label"=>"Parceiro","class"=>"form-control","required","options"=>$parceiros));
				echo $this->Form->input("tipo_usuario",array("label"=>"Perfil","class"=>"form-control","required","options"=>$tipo_usuario))."<br>";
				echo $this->Form->button("Cadastrar",array("type"=>"submit","class"=>"btn btn-success"));
			?>

		</div>
		<div class="col-md-2"></div>
	</div>
	
</div>