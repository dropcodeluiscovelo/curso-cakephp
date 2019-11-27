<div class="col-md-12">
	
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			
			<div style="margin-top: 5%">
				<h1><center>LOGIN</center></h1>
			</div>

			<?php  
				echo $this->Form->create("Usuario",array("url"=>"login"));
				echo $this->Form->input("email",array("type"=>"email","label"=>"E-mail","class"=>"form-control","required"));
				echo $this->Form->input("senha",array("type"=>"password","label"=>"Senha","class"=>"form-control","required"))."<br>";
				echo $this->Form->button("LOGAR",array("type"=>"submit","class"=>"btn btn-success"));
			?>

			<hr>

			<h3><small>Usuários</small></h3>

			<ul>
				<li>
					Administrador
					<ul>
						<li>E-mail: admin@admin.com.br</li>
						<li>Senha: 1</li>
					</ul>
				</li>
				<li>
					Vendedor
					<ul>
						<li>E-mail: vendedor@vendedor.com.br</li>
						<li>Senha: 1</li>
					</ul>
				</li>
			</ul>

		</div>
		<div class="col-md-4"></div>
	</div>
	
</div>