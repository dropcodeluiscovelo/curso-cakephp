<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Mini | SIGEP');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
	</title>
	<?php
	echo $this->Html->css(array(
		'bootstrap.min','simple-sidebar'
	));
	echo $this->Html->script(array(
		'jquery-3.3.1.min','bootstrap.min','jquery.slim.min','bootstrap.bundle.min'
	));

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	?>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		.box{
			padding-top: 5%;
		}
	</style>
</head>
<body>
	
	<body>

		<div class="d-flex" id="wrapper">

			<!-- Sidebar -->
			<div class="bg-light border-right" id="sidebar-wrapper">
				<div class="sidebar-heading">
					<a href="<?php echo $this->Html->url(array("controller"=>"dashboard","action"=>"index")) ?>">Administrador</a>
				</div>
				<div class="list-group list-group-flush">
					<a href="<?php echo $this->Html->url(array("controller"=>"produtos","action"=>"index")) ?>" class="list-group-item list-group-item-action bg-light">Produtos</a>
					<a href="<?php echo $this->Html->url(array("controller"=>"tabelas","action"=>"index")) ?>" class="list-group-item list-group-item-action bg-light">Tabela de Preço</a>
					<a href="<?php echo $this->Html->url(array("controller"=>"parceiros","action"=>"index")) ?>" class="list-group-item list-group-item-action bg-light">Parceiros</a>
					<a href="<?php echo $this->Html->url(array("controller"=>"usuarios","action"=>"index")) ?>" class="list-group-item list-group-item-action bg-light">Usuarios</a>
					<a href="<?php echo $this->Html->url(array("controller"=>"usuarios","action"=>"logout")) ?>" class="list-group-item list-group-item-action bg-light">Sair</a>
				</div>
			</div>
			<!-- /#sidebar-wrapper -->

			<!-- Page Content -->
			<div id="page-content-wrapper">

				<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
					<button class="btn btn-primary" id="menu-toggle">
						<i class="fa fa-bars" aria-hidden="true"></i>
					</button>

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
							<li class="nav-item active">
								<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Link</a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Dropdown
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">Something else here</a>
								</div>
							</li>
						</ul>
					</div> -->

				</nav>

				<div class="container-fluid">
					<?php echo $this->Flash->render(); ?>
					<?php echo $this->fetch('content'); ?>
				</div>
			</div>
			<!-- /#page-content-wrapper -->
			
		</div>
		<!-- /#wrapper -->

		<!-- Menu Toggle Script -->
		<script>
			$("#menu-toggle").click(function(e) {
				e.preventDefault();
				$("#wrapper").toggleClass("toggled");
			});
		</script>
		<?php //echo $this->element('sql_dump'); ?>
	</body>

</body>
</html>
