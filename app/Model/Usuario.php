<?php  
	
	class Usuario extends AppModel {

		public $name = "Usuario";
		public $belongsTo = array("Parceiro");

	}