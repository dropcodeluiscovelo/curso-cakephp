<?php  
	
	if(!empty($produto)){
		echo $this->Form->create("Venda");
		echo $this->Form->input("preco",array("type"=>"text","label"=>"Preço","class"=>"form-control","required","readonly"=>true,"value"=>$produto["pt"]["preco"]));
	}else{
		echo "<h2>Produto não encontrado</h2>";
	}

	

