<div class="col-md-12 box">
	
	<div class="row">
		
		<div class="col-md-2"></div>
		<div class="col-md-8">
			
			<a href="<?php echo $this->Html->url(array("controller"=>"produtos","action"=>"add")) ?>" class="btn btn-success">
				Cadastrar
			</a>
			<hr>
			<table class="table">
				<thead>
					<tr>
						<th>Criado em</th>
						<th>Nome</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($produtos as $p) { ?>
						<tr>
							<td><?php echo $p["Produto"]["created"] ?></td>
							<td><?php echo $p["Produto"]["nome"] ?></td>
							<td>
								<?php 
									echo $this->Html->link("Alterar",
										array("action"=>"edit",$p["Produto"]["id"]),
										array("class"=>"btn btn-primary btn-sm")); 
								?>

							</td>
							<td>
								<?php  
									echo $this->Html->link(
										"Excluir",
										array("action"=>"delete",$p["Produto"]["id"]),
										array(
											"class"=>"btn btn-danger btn-sm",
											"confirm"=>"Deseja realmente excluir?"
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