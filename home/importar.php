
<?php
        
        $get_id = $_REQUEST['ses'];
		$arquivo 	= $_FILES["file"];
        $nome 		= $arquivo["name"];
		$tamanho 		= $arquivo[size];
		//altera o nome do arquivo
        $newfilename = round(microtime(true)) . '.' . end(explode(".", $nome ));

        $generatecode = strtoupper(substr
		                            (md5(date("Ymd")), 1, 6)
									);
		
		mkdir("files/".$generatecode, 0755, true);
	    move_uploaded_file($arquivo["tmp_name"], "files/".$generatecode."/".$newfilename );
		include_once("config.inc");
		include_once("funcoes.php");
		$TipoArq =TipoArq($nome);
		mysql_query("INSERT INTO fr_data (dat_code, dat_nome, dat_tipo, dat_size, fr_request_id_request) VALUES ('files/$generatecode/$newfilename', '$nome', '$TipoArq', '$tamanho', $get_id)");


?>