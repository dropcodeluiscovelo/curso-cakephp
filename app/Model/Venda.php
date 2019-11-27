<?php  
	
	class Venda extends AppModel {

		public $name = "Venda";
		public $belongsTo = array("Parceiro","Usuario","Cliente");

	}