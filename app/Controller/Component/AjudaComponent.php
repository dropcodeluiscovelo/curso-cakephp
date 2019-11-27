<?php

	class AjudaComponent extends Component {

		function TratarData($valor){

			$valor = date("d/m/Y H:i", strtotime($valor));
			return $valor;

		}

		function TratarVirgulaParaPonto($valor){

			$valor = str_replace(",", ".", $valor);
	    	$valor = str_replace(".", ".", $valor);
            return $valor;	

		}

		function TratarMoeda($valor){

	    	$valor =  number_format($valor, 2, ',', '.');
            return $valor;

	    }

	    function TratarCnpjCpf($texto){

	    	$cnpj = "##.###.###/####-##";
	    	$cpf = "###.###.###-##";

	    	if(strlen($texto)==14){

			    for($i=0;$i<strlen($texto);$i++){
			        $cnpj[strpos($cnpj,"#")] = $texto[$i];
	    		}

	    		return $cnpj;

	    	}elseif(strlen($texto)==11){

	    		for($i=0;$i<strlen($texto);$i++){
			        $cpf[strpos($cpf,"#")] = $texto[$i];
	    		}

	    		return $cpf;
	    	}
	    	
	    }

	}