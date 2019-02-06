<?php

//função destinada a proteção (login)
function mysql_filtro($var){
	if(get_magic_quotes_gpc()) $var = stripslashes($var);
	return mysql_real_escape_string($var);
}
//proteção contra sql injector e outros
function mysql_filtro_html($var){
	return htmlentities(mysql_filtro($var));
}

 //Inverte a data para o banco de dados
		
		function inverteData($data){
        if(count(explode("-",$data)) > 1){
        return implode("-",array_reverse(explode("-",$data)));
    }
}
        //exemplo
		 //Inverte a data para o banco de dados
		


		function inverteDataHora($data){
			$data = explode(" ",$data);
				
$data[0]; // Ano
$data[1]; // Hora
        if(count(explode("-",$data[0])) > 1){
        $ano = implode("-",array_reverse(explode("-",$data[0])));
		return "$ano $data[1]";
    
	}
}
      // inverte data e retira a hora
		function inverteDatasHora($data){
			$data = explode(" ",$data);
				
$data[0]; // Ano

        if(count(explode("-",$data[0])) > 1){
        $ano = implode("/",array_reverse(explode("-",$data[0])));
		return "$ano";
    
	}
}

function By2M($size){
    $filesizename = array(" Bytes", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
    return $size ? round($size/pow(1024, ($i = floor(log($size, 1024)))), 2) . $filesizename[$i] : '0 Bytes';
}

function TipoArq($arquivo){		
$tipo = strtolower(end(explode(".", $arquivo)));
    return $tipo;
}

?>