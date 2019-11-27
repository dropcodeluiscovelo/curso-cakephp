<div class="col-md-12 box">
	
	<div class="row">
		
		<div class="col-md-2"></div>
		<div class="col-md-8">
			
			<a href="<?php echo $this->Html->url(array("controller"=>"clientes","action"=>"add")) ?>" class="btn btn-success">
				Cadastrar
			</a>
			<hr>
			<table class="table">
				<thead>
					<tr>
						<th>Criado em</th>
						<th>Nome</th>
						<th>CNPJ/CPF</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($clientes as $c) { ?>
						<tr>
							<td><?php echo $c["Cliente"]["created"] ?></td>
							<td><?php echo $c["Cliente"]["nome"] ?></td>
							<td><?php echo $c["Cliente"]["cnpj_cpf"] ?></td>
							<td>
								<?php 
									echo $this->Html->link("Alterar",
										array("action"=>"edit",$c["Cliente"]["id"]),
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