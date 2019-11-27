<div class="col-md-12 box">
	
	<div class="row">
		
		<div class="col-md-2"></div>
		<div class="col-md-8">
			
			<a href="<?php echo $this->Html->url(array("controller"=>"parceiros","action"=>"add")) ?>" class="btn btn-success">
				Cadastrar
			</a>
			<hr>
			<table class="table">
				<thead>
					<tr>
						<th>Criado em</th>
						<th>Razão Social</th>
						<th>Tabela de Preço</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($parceiros as $p) { ?>
						<tr>
							<td><?php echo $p["Parceiro"]["created"] ?></td>
							<td><?php echo $p["Parceiro"]["razaosocial"] ?></td>
							<td><?php echo $p["Tabela"]["nome"] ?></td>
							<td>
								<?php 
									echo $this->Html->link("Alterar",
										array("action"=>"edit",$p["Parceiro"]["id"]),
										array("class"=>"btn btn-info btn-sm")
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