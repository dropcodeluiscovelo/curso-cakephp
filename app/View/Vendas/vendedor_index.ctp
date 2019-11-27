<div class="col-md-12 box">
	
	<div class="row">
		
		<div class="col-md-1"></div>
		<div class="col-md-10">
			
			<a href="<?php echo $this->Html->url(array("controller"=>"vendas","action"=>"add")) ?>" class="btn btn-success">
				Nova Venda
			</a>
			<hr>
			<table class="table">
				<thead>
					<tr>
						<th>Nº Único</th>
						<th>Data</th>
						<th>Vendedor</th>
						<th>Cliente</th>
						<th>Produto</th>
						<th>Preço</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($vendas as $v) { ?>
						<tr>
							<td>#<?php echo $v["Venda"]["id"] ?></td>
							<td><?php echo $v["Venda"]["created"] ?></td>
							<td><?php echo $v["Usuario"]["nome"] ?></td>
							<td><?php echo $v["Cliente"]["nome"] ?></td>
							<td><?php echo $v["Venda"]["produto"] ?></td>
							<td>R$ <?php echo $v["Venda"]["preco"] ?></td>
							<td>
								<?php 
									echo $this->Html->link("Detalhes",
										array("action"=>"detalhes",$v["Venda"]["id"]),
										array("class"=>"btn btn-primary btn-sm")
									); 
								?>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>

		</div>
		<div class="col-md-1"></div>

	</div>	

</div>