<div class="col-md-12 box">
	
	<div class="row">
		
		<div class="col-md-2"></div>
		<div class="col-md-8">
			
			<a href="<?php echo $this->Html->url(array("controller"=>"usuarios","action"=>"add")) ?>" class="btn btn-success">
				Cadastrar
			</a>
			<hr>
			<table class="table">
				<thead>
					<tr>
						<th>Criado em</th>
						<th>Nome</th>
						<th>Parceiro</th>
						<th>Tipo</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($usuarios as $u) { ?>
						<tr>
							<td><?php echo $u["Usuario"]["created"] ?></td>
							<td><?php echo $u["Usuario"]["nome"] ?></td>
							<td><?php echo $u["Parceiro"]["razaosocial"] ?></td>
							<td><?php echo $u["Usuario"]["tipo_usuario"] ?></td>
							<td>
								<?php 
									echo $this->Html->link("Alterar",
										array("action"=>"edit",$u["Usuario"]["id"]),
										array("class"=>"btn btn-info btn-sm")
									); 
								?>
							</td>
							<td>
								<?php 
									echo $this->Html->link("Excluir",
										array("action"=>"delete",$u["Usuario"]["id"]),
										array(
											"class"=>"btn btn-danger btn-sm",
											"confirm"=>"Deseja realmente exluir?"
										)
									); 
								?>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>

		</div>
		<div class="col-md-2"></div>

	</div>	

</div>