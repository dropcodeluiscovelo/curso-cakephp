<?php  
	
	class Parceiro extends AppModel {

		public $name = "Parceiro";
		public $displayField = "razaosocial";
		public $belongsTo = array("Tabela");

	}