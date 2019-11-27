<?php  
	
	class ProdutoVenda extends AppModel {

		public $name = "ProdutoVenda";
		public $belongsTo = array("Produto");

	}