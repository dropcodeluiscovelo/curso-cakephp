<div class="col-md-12 box">
	
	<div class="row">
		
		<div class="col-md-2"></div>
		<div class="col-md-8">
			
			<a href="<?php echo $this->Html->url(array("controller"=>"vendas","action"=>"index")) ?>" class="btn btn-success">
				Voltar
			</a>
			<hr>
				<h2>DETALHES</h2>
			<hr>
			<table class="table">
				<thead>
					<tr>
						<th>Nº Único</th>
						<th>Data</th>
						<th>Vendedor</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>#<?php echo $venda["Venda"]["id"] ?></td>
						<td><?php echo $venda["Venda"]["created"] ?></td>
						<td><?php echo $venda["Usuario"]["nome"] ?></td>
					</tr>
				</tbody>
			</table>

			<hr>
				<h2>PRODUTO</h2>
			<hr>
			<table class="table">
				<thead>
					<tr>
						<th>Produto</th>
						<th>Preço</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $produto_venda["Produto"]["nome"] ?></td>
						<td>R$ <?php echo $produto_venda["ProdutoVenda"]["preco"] ?></td>
					</tr>
				</tbody>
			</table>

			<hr>
				<h2>CLIENTE</h2>
			<hr>
			<table class="table">
				<thead>
					<tr>
						<th>Nome</th>
						<th>CNPJ/CPF</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $venda["Cliente"]["nome"] ?></td>
						<td><?php echo $venda["Cliente"]["cnpj_cpf"] ?></td>
					</tr>
				</tbody>
			</table>

		</div>
		<div class="col-md-2"></div>

	</div>	

</div>