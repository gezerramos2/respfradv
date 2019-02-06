<?php 
session_start();
if(!isset($_SESSION['user_session']) && !isset($_SESSION['pwd_session'])){
echo "<meta http-equiv='refresh' content='0, ../'>";
}else{
?>
 <?php  
 include_once("config.inc");
include_once("funcoes.php"); 

/*
Cria codigo para o report
*/
date_default_timezone_set('America/Sao_Paulo');
$datas = date('d/m/Y');
$horas = date('H:i:s');
$tes = md5("$datas$horas");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />  
      
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />        
    <![endif]-->                
   <title>Falcão Rios | Advocacia & Advogados Associados</title>
    <link rel="icon" type="image/ico" href="img/favicon.ico"/>
    
    <link href="css/stylesheets.css" rel="stylesheet" type="text/css" />
    <!--[if lte IE 7]>
        <link href="css/ie.css" rel="stylesheet" type="text/css" />
        <script type='text/javascript' src='js/plugins/other/lte-ie7.js'></script>
    <![endif]--> 
	 <script type='text/javascript' src='js/plugins/jquery/jquery-1.9.1.min.js'></script>
  
</head>
<body> 

	<?php 
	include_once("header_lateral.php"); 
	?>
    <div class="wrapper">
     
        <div class="body">

			<?php 
	include_once("header_wrapper.php"); 
	?>

            <div class="content" id="conteudo" >
			<?php 
            
            
            if(isset($_GET['s'])){
				switch($_GET['s']){

					case $_GET['s'] == 'home':
					include_once('fr_new_request.php');
					break;
					
					case $_GET['s'] == 'update':
					include_once('fr_request_adm.php');
					break;
	
				    default:
					include_once('404.php');

				}
            
            }else{
				include_once("fr_new_request.php"); 
			}
				
				?>
            
            </div>
			<!--terminou aqui conteudo-->
        </div>

    </div>
    <div class="dialog" id="source" style="display: none;" title="Source"></div>
    <div id="escurecer" class="" ></div>
</body>
</html>
<?php

   if(@$_GET['sai'] =='sair'){
	   
   unset($_SESSION['user_session']);
   unset($_SESSION['pwd_session']);
   echo "<meta http-equiv='refresh' content='0, ../'>";
   }  
   }   
   
?>