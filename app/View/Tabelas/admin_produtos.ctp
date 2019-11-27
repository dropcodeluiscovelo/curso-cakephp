<div class="col-md-12 box">
	
	<div class="row">
		
		<div class="col-md-2"></div>
		<div class="col-md-8">
			
			<a href="<?php echo $this->Html->url(array("controller"=>"tabelas","action"=>"index")) ?>" class="btn btn-info">
				Voltar
			</a>
			<hr>
			<table class="table">
				<thead>
					<tr>
						<th>Criado em</th>
						<th>Nome</th>
						<th>Preço</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($produtos as $p) { ?>
						<tr>
							<td><?php echo $p["ProdutoTabela"]["created"] ?></td>
							<td><?php echo $p["Produto"]["nome"] ?></td>
							<td>R$ <?php echo $p["ProdutoTabela"]["preco"] ?></td>
							<td>
								<?php 
									echo $this->Html->link("Alterar o Preço",
										array("action"=>"preco",$p["ProdutoTabela"]["tabela_id"],$p["ProdutoTabela"]["id"]),
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