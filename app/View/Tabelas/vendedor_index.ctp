<div class="col-md-12 box">
	
	<div class="row">
		
		<div class="col-md-2"></div>
		<div class="col-md-8">
			
			<table class="table">
				<thead>
					<tr>
						<th>Criado em</th>
						<th>Nome</th>
						<th>Preço</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($produtos as $p) { ?>
						<tr>
							<td><?php echo $p["ProdutoTabela"]["created"] ?></td>
							<td><?php echo $p["Produto"]["nome"] ?></td>
							<td>R$ <?php echo $p["ProdutoTabela"]["preco"] ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>

		</div>
		<div class="col-md-2"></div>

	</div>	

</div>