<div class="col-md-12 box">
	
	<div class="row">
		
		<div class="col-md-2"></div>
		<div class="col-md-8">
			
			<a href="<?php echo $this->Html->url(array("controller"=>"tabelas","action"=>"add")) ?>" class="btn btn-success">
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
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($tabelas as $tab) { ?>
						<tr>
							<td><?php echo $tab["Tabela"]["created"] ?></td>
							<td><?php echo $tab["Tabela"]["nome"] ?></td>
							<td>
								<?php 
									echo $this->Html->link("Produtos",
										array("action"=>"produtos",$tab["Tabela"]["id"]),
										array("class"=>"btn btn-info btn-sm")
									); 
								?>
	
							</td>
							<td>
								<?php 
									echo $this->Html->link("Alterar",
										array("action"=>"edit",$tab["Tabela"]["id"]),
										array("class"=>"btn btn-primary btn-sm")
									); 
								?>
								
							</td>
							<td>
								<?php 
									echo $this->Html->link("Excluir",
										array("action"=>"delete",$tab["Tabela"]["id"]),
										array(
											"class"=>"btn btn-danger btn-sm",
											"confirm" => "Deseja realmente deletar?"
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