<?php
session_start();
if(!isset($_SESSION['user_session']) && !isset($_SESSION['pwd_session'])){

 include_once("home/config.inc");
 include_once("home/funcoes.php");
?>
<?php

if(isset($_POST['logando'])){
	@$user = $_POST['usuario'];
	@$pwd = $_POST['senha'];
	
	if(empty($user)){		
		$erro1 = "<div id='alert-error' class='alert alert-error'><strong><center>Preencha todos os campos.</center></strong></div>";

	}elseif(empty($pwd)){		
		$erro1 = "<div id='alert-error' class='alert alert-error'><strong><center>Preencha todos os campos.</center></strong></div>";
	
	}else{
     if(!empty($_POST['usuario']) && !empty($_POST['senha'])){
		 
		 $user = mysql_filtro_html($_POST['usuario']);	
		 $senha = mysql_filtro_html($_POST['senha']);
		 /*Pega login e senha e transforma em md5 segura*/

		 $sql3 = mysql_query("SELECT * FROM fr_log where log_user='$user'");
		 
		 if(mysql_num_rows($sql3)>0){

			 $sql1 = mysql_fetch_assoc($sql3);

			 if($senha == $sql1['log_pass']){



				 /*Pega todos os dados e armazena na sessao*/				 
				 $_SESSION['user_session'] = $user;
		         $_SESSION['pwd_session'] = $senha;
		   
				 
							 
				 /*Entra na pasta associação*/
		         echo "<meta http-equiv='refresh' content='0, url=./home/'>";
				 $tem = 1;

		
			 }else{
				 /*Avisa que op login não existe*/
		
				 $erro2 = "<div id='alert-error' class='alert alert-error'><strong><center>Usuario ou Senha incorreta.</center></strong></div>";
 
			 }
			
		 }else{
			 $erro2 = "<div id='alert-error' class='alert alert-error'><strong><center>Usuario ou Senha incorreta.</center></strong></div>";

		 }
	
	 }
}

}


?>
<?php 
if(@$tem != 1){
?>
<!DOCTYPE html>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />    
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />        
    <![endif]-->                
     <title>Login Falcão Rios | Advocacia & Advogados Associados </title>
  <link rel="icon" type="image/ico" href="home/img/favicon.ico"/>
    
    <link href="home/css/stylesheets.css" rel="stylesheet" type="text/css" />
    <!--[if lt IE 10]>
        <link href="css/ie.css" rel="stylesheet" type="text/css" />
    <![endif]-->           
    <!--[if lte IE 7]>
        <script type='text/javascript' src='home/js/plugins/other/lte-ie7.js'></script>
    <![endif]-->    
    <script type='text/javascript' src='home/js/plugins/jquery/jquery-1.9.1.min.js'></script>
    <script type='text/javascript' src='home/js/plugins/jquery/jquery-ui-1.10.1.custom.min.js'></script>
    <script type='text/javascript' src='home/js/plugins/jquery/jquery-migrate-1.1.1.min.js'></script>
    <script type='text/javascript' src='home/js/plugins/jquery/globalize.js'></script>
    <script type='text/javascript' src='home/js/plugins/other/excanvas.js'></script>
    
    <script type='text/javascript' src='home/js/plugins/other/jquery.mousewheel.min.js'></script>
        
    <script type='text/javascript' src='home/js/plugins/bootstrap/bootstrap.min.js'></script>
    
    <script type='text/javascript' src="home/js/plugins/uniform/jquery.uniform.min.js"></script>
    
    <script type='text/javascript' src='home/js/plugins/shbrush/XRegExp.js'></script>
    <script type='text/javascript' src='home/js/plugins/shbrush/shCore.js'></script>
    <script type='text/javascript' src='home/js/plugins/shbrush/shBrushXml.js'></script>
    <script type='text/javascript' src='home/js/plugins/shbrush/shBrushJScript.js'></script>
    <script type='text/javascript' src='home/js/plugins/shbrush/shBrushCss.js'></script>    
    
    <script type='text/javascript' src='home/js/plugins.js'></script>
    <script type='text/javascript' src='home/js/charts.js'></script>
    <script type='text/javascript' src='home/js/actions.js'></script>
 <script src="files/js/jquery.min.js"></script>
    <script type="text/javascript"> 


$(document).ready(function() {

<!-- Abrir modal login pagina descktop -->
 $('.alert-error').click(function () {

 
		$('.alert-error').hide();
	});	
	
	});	

	</script>
    
</head>
<body>    
<div id="loader"><img src="home/img/loader.gif"/></div>


              
				<!--Final parte-->
                <div class="row-fluid">
                     <div class="span4">
                        <div class="block">
                       <!--Block loader inicio-->
                        </div>                          
                     </div>
                     <div class="span4">
                        <div class="block">
                       <!--Inicio code login-->                                    
                             <div class="log_in">
    
<center>
  <p><img src="home/img/logoin.png"  alt=""/></p>
</center>
        <div class="page-header">
		  <div class="page-header">
        
            <div class="icon">
                <span class="ico-arrow-right"></span>
            </div>
            <h1>Login <small>LOGIN ADMIN</small></h1>
        </div> 
	
		</div> 
	
   
	                           </div>
                        </div>                        
                     </div>
					  <div class="log_in_req">
                     <div class="span4">
                        <div class="block">
						<!--zerado-->
                         </div>                          
                     </div>
                      </div>					 
                </div>
				
				
				<!--novo teste para separação de tags-->
				
				
					<!--Final parte-->
                <div class="row-fluid">
                     <div class="span4">
                        <div class="block">
                       <!--Block loader inicio-->
                        </div>                          
                     </div>
                     <div class="span4">
                        <div class="block">
                       <!--Inicio code login-->                                    
                             <div class="log_in">

	
        <form method="post" action="">
        <div class="row-fluid">
            <div class="row-form">
                <div class="span12">
                    
                     <input class="txt" type="text" value="<?php echo @$_POST['usuario']; ?>" placeholder="Login do Sócio" id="usuario" name="usuario" />
                </div>
            </div>
            <div class="row-form">
                <div class="span12">
                     <input class="txt"  type="password" placeholder="Senha do Sócio" id="senha" name="senha" />
                </div>            
            </div>
            <div class="row-form">
                <div class="span12">
                    <a href="recovery.php"> Esqueci meu login!</a>
                </div>
            </div>
            <div class="row-form">
                <div class="span12">
                    <button class="btn btn-new-fr" name="logando">Entrar <span class="icon-arrow-next icon-white "></span></button>
                  
                </div>
               </form>
                                <div class="row-form">
                                 <div class="span12">

<?php

if(isset($erro2)){
	echo $erro2;

}
if(isset($erro1)){
	echo $erro1;

}

?>
      
                                    </div> 
        
                                </div>
            </div>
    
                                 </div>
	                           </div>
                        </div>                        
                     </div>
					  <div class="log_in_req">
                     <div class="span4">
                        <div class="block log_in ">
						<div class="span12">
                   
               

		  <div class="page-header">
        
            <div class="icon">
                <span class="ico-pen-2"></span>
            </div>
            <h1>Novo<small>Novo Requerimento</small></h1>
        </div> 

<a  class="a_subli" href="newre.php" target="_blank"  >
 <button class="btn btn-new-fr" name="logando">Acessar novo requeriemnto  <span class="icon-arrow-next icon-white "></span></button>
                  
</a>					 
                        </div>

 </div>
						
                     </div>
                      </div>					 
                </div>

</body>
</html>
                



<?php
}else{
	
}

//se existir sessão ele entra na pasta se n existir ele sai.

}else{
echo "<meta http-equiv='refresh' content='0, url=./home/'>";

  }
?>
