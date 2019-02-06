<?php

    
    
    /* formatos de imagem permitidos */
    $permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp");
    
    if(isset($_POST)){
        @$nome_imagem    = $_FILES['imagem']['name'];
        @$tamanho_imagem = $_FILES['imagem']['size'];
        
        /* pega a extensão do arquivo */
        $ext = strtolower(strrchr($nome_imagem,"."));
        
        /*  verifica se a extensão está entre as extensões permitidas */
        if(in_array($ext,$permitidos)){
            
            /* converte o tamanho para KB */
            $tamanho = round($tamanho_imagem / 2024);
            
            if($tamanho < 2024){ //se imagem for até 2MB envia
                $nome_atual = md5(uniqid(time())).$ext; //nome que dará a imagem
                $tmp = $_FILES['imagem']['tmp_name']; //caminho temporário da imagem
				
				/*pega data atual*/
                date_default_timezone_set("Brazil/East");
                $ano =  date('Y');
                $mes =  date('m');
               /*cria primeira pasta ano e depois mes*/
               $pasta1 = @mkdir("$ano", 0777);
               $pasta2 = @mkdir("$ano/$mes", 0777);
               /*pega o ano e mes das pastas que foram criadas*/
               $a1 = array("$ano","$mes");
               /*salvou ano e mes no implode para nova pasta $a1*/
               $a1 = implode("/",$a1);
                $pasta = "$a1/";
				
				
                /* se enviar a foto, insere o nome da foto no banco de dados */
                if(move_uploaded_file($tmp,$pasta.$nome_atual)){
	
					/*fim area redimeciona imagem*/

                    echo "<a class='fb' rel='group' href='img/posts/".$a1."/".$nome_atual."' width='420'><center><img  class='img-polaroid' src='img/posts/".$a1."/".$nome_atual."' id='previsualizar'> </center></a> <input type='hidden' value='img/posts/".$a1."/".$nome_atual."' name='post_imagem'>"; //imprime a foto na tela
                }else{
                    echo "Falha ao enviar";
                }
            }else{
                echo "A imagem deve ser de no máximo 2MB";
            }
        }else{
            echo "Somente são aceitos arquivos do tipo Imagem";
        }
    }else{
        echo "Selecione uma imagem";
        exit;
    }
   
?>