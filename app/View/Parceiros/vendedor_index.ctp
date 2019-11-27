<div class="col-md-12 box">
	
	<div class="row">
		
		<div class="col-md-2"></div>
		<div class="col-md-8">
			
			<h1>Parceiro</h1>
			<hr>
			<table class="table">
				<thead>
					<tr>
						<th>Criado em</th>
						<th>Razão Social</th>
						<th>Tabela de Preço</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($parceiros as $p) { ?>
						<tr>
							<td><?php echo $p["Parceiro"]["created"] ?></td>
							<td><?php echo $p["Parceiro"]["razaosocial"] ?></td>
							<td><?php echo $p["Tabela"]["nome"] ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>

		</div>
		<div class="col-md-2"></div>

	</div>	

</div>