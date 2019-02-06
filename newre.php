<?php

 include_once("home/config.inc");
 include_once("home/funcoes.php");
 
 date_default_timezone_set('America/Sao_Paulo');
$datas = date('d/m/Y');
$horas = date('H:i:s');
$tes = md5("$datas$horas");
 
 
 if(isset($_POST['cad'])){
     if(!empty($_POST['re_nome']) && !empty($_POST['re_cpf'])){

		 $re_nome = mysql_filtro_html($_POST['re_nome']);
		 $re_datnas = mysql_filtro_html($_POST['re_datnas']);
		 $re_cpf = mysql_filtro_html($_POST['re_cpf']);
         $re_filiap = mysql_filtro_html($_POST['re_filiap']);
		 $re_filiam = mysql_filtro_html($_POST['re_filiam']);
		 $re_tel = mysql_filtro_html($_POST['re_tel']);
		 $re_tel2 = mysql_filtro_html($_POST['re_tel2']);
		 $re_endereco = mysql_filtro_html($_POST['re_endereco']);
		 $re_n_casa = mysql_filtro_html($_POST['re_n_casa']);
		 $re_email = mysql_filtro_html($_POST['re_email']);
		 $re_tipo_causa = mysql_filtro_html($_POST['re_tipo_causa']);
		 $re_modo = mysql_filtro_html($_POST['re_modo']);
		 @$re_num_proc = mysql_filtro_html($_POST['re_num_proc']);
		 @$re_data_req = mysql_filtro_html($_POST['re_date_req']);
	

		  /*Verificando campos se estão prenchidos*/
		 if(empty($re_nome)){
		echo "<script>alert('Preencha o campo nome.'); history.back();</script>";
	    }elseif(empty($re_datnas)){
		echo "<script>alert('Preencha o campo Data de Nascimento.'); history.back();</script>";
		}elseif(empty($re_cpf)){
		echo "<script>alert('Preencha o campo CPF.'); history.back();</script>";
		}elseif(empty($re_tel)){
		echo "<script>alert('Preencha o campo numero telefone.'); history.back();</script>";
	    }elseif(empty($re_email)){
		echo "<script>alert('Preencha o campo email.'); history.back();</script>";
		}elseif(empty($re_tipo_causa)){
		echo "<script>alert('Preencha o campo tipo de causa.'); history.back();</script>";
		}elseif(empty($re_modo)){
		echo "<script>alert('Preencha o campo modo de requerimento'); history.back();</script>";
		}elseif(empty($re_filiap)){
		echo "<script>alert('Preencha o campo Filiação Pai.'); history.back();</script>";
		}elseif(empty($re_filiam)){
		echo "<script>alert('Preencha o campo Filiação Mãe.'); history.back();</script>";
		}elseif(empty($re_endereco)){
		echo "<script>alert('Preencha o campo endereço.'); history.back();</script>";
		}elseif(empty($re_n_casa)){
		echo "<script>alert('Preencha o campo numero da residencia.'); history.back();</script>";
		
	}else{
		 /*Convertendo data*/
		$re_datnas = inverteData($re_datnas);
		$re_data_req = inverteData($re_data_req);
		
		 
		  /*Salvando associado*/
		  

		 
		 $sqlass = mysql_query("INSERT INTO fr_request
		 (re_nome, re_cpf, re_filiap, re_filiam, re_datnas, re_tel, re_tel2, re_endereco, re_n_casa, re_email, re_tipo_causa, re_tipo_modo, re_num_proc, re_date_req, re_datepedido) 
		 VALUES ('$re_nome', '$re_cpf', '$re_filiap', '$re_filiam', '$re_datnas', '$re_tel','$re_tel2', '$re_endereco', '$re_n_casa', '$re_email', '$re_tipo_causa', '$re_modo', '$re_num_proc', '$re_data_req', NOW());
");


			/*Envia para os encarregado pelo setor diretoria*/
            $idpedido = mysql_insert_id();
			/*Salva o id na sessão para adicionar os arquivos um por vez e listar*/
			
            $_SESSION['idpedido'] = $idpedido;


		
		 //mostra confirmação

            $ocul = '1';
			$ocul2 = '1';

		
	}
	 }

}
 if(isset($_POST['generatec'])){
	 
	 $codefr = strtoupper(substr(md5(date("YmdHis")), 1, 6));
     $idsession = mysql_filtro_html($_POST['idsession']);
	 
	 mysql_query("UPDATE fr_request SET fr_code_hex='$codefr' WHERE id_request='$idsession';");


	 $ocul = '1';
	 $ocul2 = '2';
 }


?>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />   
<title>Falcão Rios - Novo requerimento.  </title>
    <link rel="icon" href="home/img/favicon.ico" />
    
      <link href="home/css/stylesheets.css" rel="stylesheet" type="text/css" /> 
              <!--Scripts especificos de cada pagina-->
           
     <script type='text/javascript' src='home/js/plugins/jquery/jquery-1.9.1.min.js'></script>  
     <script type='text/javascript' src='home/js/plugins/jquery/jquery-ui-1.10.1.custom.min.js'></script>
    <script type='text/javascript' src='home/js/plugins/jquery/jquery-migrate-1.1.1.min.js'></script>
    <script type='text/javascript' src='home/js/plugins/jquery/globalize.js'></script>
    <script type='text/javascript' src='home/js/plugins/other/excanvas.js'></script>
    
    <script type='text/javascript' src='home/js/plugins/other/jquery.mousewheel.min.js'></script>
        
    <script type='text/javascript' src='home/js/plugins/bootstrap/bootstrap.min.js'></script>
    
    <script type='text/javascript' src='home/js/plugins/cookies/jquery.cookies.2.2.0.min.js'></script>    
    
    <script type='text/javascript' src='home/js/plugins/jflot/jquery.flot.js'></script>    
    <script type='text/javascript' src='home/js/plugins/jflot/jquery.flot.stack.js'></script>    
    <script type='text/javascript' src='home/js/plugins/jflot/jquery.flot.pie.js'></script>
    <script type='text/javascript' src='home/js/plugins/jflot/jquery.flot.resize.js'></script>
    
    <script type='text/javascript' src='home/js/plugins/sparklines/jquery.sparkline.min.js'></script>        
    
    <script type='text/javascript' src='home/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'></script>
    
    <script type='text/javascript' src="home/js/plugins/uniform/jquery.uniform.min.js"></script>
    
    <script type='text/javascript' src='home/js/plugins/shbrush/XRegExp.js'></script>
    <script type='text/javascript' src='home/js/plugins/shbrush/shCore.js'></script>
    <script type='text/javascript' src='home/js/plugins/shbrush/shBrushXml.js'></script>
    <script type='text/javascript' src='home/js/plugins/shbrush/shBrushJScript.js'></script>
    <script type='text/javascript' src='home/js/plugins/shbrush/shBrushCss.js'></script>    
    
    <script type='text/javascript' src='home/js/plugins.js'></script>
    <script type='text/javascript' src='home/js/charts.js'></script>
    
    <script type='text/javascript' src='home/js/actions.js'></script>
              
              
    <script type='text/javascript' src='home/js/plugins/stepywizard/jquery.stepy.js'></script>
    <script type='text/javascript' src="home/js/plugins/select/select2.min.js"></script>
    <script type='text/javascript' src='home/js/plugins/validationEngine/languages/jquery.validationEngine-en.js'></script>
    <script type='text/javascript' src='home/js/plugins/validationEngine/jquery.validationEngine.js'></script>
    <script type='text/javascript' src='home/js/plugins/maskedinput/jquery.maskedinput.js'></script>
	<!--posto apos-->
    <link href="home/css/uploadfilemulti.css" rel="stylesheet">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <script type="text/javascript">
jQuery(function($) {
      $.mask.definitions['~']='[+-]';
      $('#re_datnas').mask('99-99-9999',{placeholder:"dd-mm-aaaa"});
	  $('#re_data_req').mask('99-99-9999',{placeholder:"dd-mm-aaaa"});	  
      $('#re_cpf').mask('999.999.999-99'); 
      $('#re_tel').mask('(99) 99999-9999', {placeholder:"(__) _____-____"});
	  $('#re_tel2').mask('(99) 99999-9999', {placeholder:"(__) _____-____"});
      $("nada3").mask("99-9999999");
      $("#nada4").mask("999-99-9999");
      $("#nada5").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
      $("#nada6").mask("999.999.999-99" );
   });
</script>
</head>
<body style=" margin: auto; width: 70%;  padding: 10px;">    
<center>
<div class="log_in">
  <p><img src="home/img/logoin.png" alt=""></p>
  </div>
</center>
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-stack-2"></span>
                    </div>
                    <h1>Requerimento <small>Formulario de novo requerimento</small></h1>
                </div>

                <div class="row-fluid" >

                    <div class="span8">  

                         <div class="block">
                                      
                            <div class="data-fluid">  
                       
<div   <?php
				
			
				if(isset($ocul)){
		echo  'style="display:none;"';
	
	}else{
		echo  'style="display:block;"';
	}
				
				
				?>>
                
                                <form  method="post" name="cad"  id="validate" action="">
                                <div id="wizard" >
                                
                                        <fieldset title="Passo 1">                            
                                                <legend>Dados pessoais</legend>
                                                                       
                                                
                                     <div class="row-form">
                                    <div class="span2">Nome:</div>
                                    <div class="span10">
                                      <input type="text" name="re_nome" class="validate[required,minSize[4],maxSize[30]]"/>
                                        <span class="bottom">Nome, max tamanho = 30</span>
                                    </div>
                                    </div>
                                     <div class="row-form">
                                    <div class="span2">Data Nascimento</div>
                                    <div class="span10">
                                      <input type="text" name="re_datnas"  id="re_datnas" class="validate[required] datepicker"/>
                                        <span class="bottom">Exemplo dd-mm-aaaa</span>
                                    </div>
                                    </div>
                                         <div class="row-form">
                                    <div class="span2">CPF:</div>
                                    <div class="span10">
                                      <input type="text" name="re_cpf" id="re_cpf" class="validate[required,minSize[4],maxSize[14]]"/>
                                        <span class="bottom">Exemplo 999.999.999-99</span>
                                    </div>
                                    </div>
                                    <div class="row-form">
                                    <div class="span2">Filiação Pai:</div>
                                    <div class="span10">
                                      <input type="text" name="re_filiap" class="validate[required,minSize[4],maxSize[48]]"/>
                                        <span class="bottom">Pai, max tamanho = 45</span>
                                    </div>
                                    </div>
                                       <div class="row-form">
                                    <div class="span2">Filiação Mãe:</div>
                                     <div class="span10">
                                      <input type="text" name="re_filiam" class="validate[required,minSize[4],maxSize[48]]"/>
                                        <span class="bottom">Mãe, max tamanho = 45</span>
                                    </div> 
                                    </div>
                                    <div class="row-form">
                                    <div class="span2">Numero Tel:</div>
                                    <div class="span10">
                                      <input type="text" name="re_tel" id="re_tel" class="validate[required,minSize[4],maxSize[17]]"/>
                                        <span class="bottom">(99) 99999-9999 </span>
                                    </div>
                                    </div>
                                       <div class="row-form">
                                    <div class="span2">Numero Tel 2:</div>
                                    <div class="span10">
                                      <input type="text" name="re_tel2" id="re_tel2" class="validate[required,minSize[4],maxSize[17]]"/>
                                        <span class="bottom">(99) 99999-9999 </span>
                                    </div>
                                    </div>
                                       <div class="row-form">
                                    <div class="span2">Endereço:</div>
                                    <div class="span10">
                                      <input type="text" name="re_endereco" class="validate[required,minSize[4],maxSize[30]]"/>
                                        <span class="bottom">Endereço, max tamanho = 30</span>
                                    </div>
                                    </div>
                                    
                                    
                                     <div class="row-form">
                                    <div class="span2">N°:</div>
                                    <div class="span10">
                                      <input type="text" name="re_n_casa" class="validate[required,minSize[1],maxSize[6]]"/>
                                        <span class="bottom">Nº, max tamanho = 30</span>
                                    </div>
                                    </div>
                                    
                                    
                                    <div class="row-form">
                                    <div class="span2">Email:</div>
                                    <div class="span10">
                                      <input type="text" name="re_email" class="validate[required,minSize[4],maxSize[25],custom[email]]"/>
                                        <span class="bottom">escritorio@falcaorios.adv.br = 8</span>
                                    </div>
                                    </div>
                                    
                                    </fieldset>
                                    
                                    <fieldset title="Passo 2">                            
                                                <legend>Dados do requerimento</legend>
                                    <div class="row-form">
                                   
                                   <div class="row-form">
                                    <div class="span2">Tipo de causa:</div>
                                    <div class="span10">
                                    
                                         <select name="re_tipo_causa"  class=""  style="width: 100%;">
										    <option value=""></option>
                                            <option value="Trabalhista">Trabalhista</option>
                                            <option value="Outros">Outros</option>
                             
                                          </select>
                                        
                                        <span class="bottom">Tipo do requerimento</span>   
                                    </div>
                                   </div> 
								   <!--neste  passo deveremos devolver somente o tipo de processo-->
								   
								   <!--tipo trabahista-->
								   <div class="row-form">
                                    <div class="span2">Meio do Requerimento:</div>
                                    <div class="span10">
                                    
                                         <select name="re_modo"  class=""  style="width: 100%;">
										    <option value=""></option>
                                            <option value="Reclamante">Reclamante(Autor)</option>
                                            <option value="Reclamado">Reclamado(Réu)</option>
                                          </select>
                                        
                                        <span class="bottom">Escolha o meio do requerimento</span>   
                                    </div>
                                   </div>

								   <!--so aparece quando liberar reclamante ou reu-->
								   <div class="row-form">
                                    <div class="span2">Numero do processo:</div>
                                    <div class="span10">
                                      <input type="text" name="re_num_proc" class="validate[minSize[1],maxSize[20]]"/>
                                        <span class="bottom">Nº, max tamanho = 20</span>
                                    </div>
                                    </div>
                                           <div class="row-form">
                                    <div class="span2">Data da emissão do autor ou reclamante</div>
                                    <div class="span10">
                                      <input type="text" name="re_data_req"  id="re_data_req" class="datepicker"/>
                                        <span class="bottom">Exemplo dd-mm-aaaa</span>
                                    </div>
                                    </div>
								   <!--fim dos tipos-->
              
                                        </fieldset>

                                        <input type="submit" name="cad" class="btn btn-primary finish" value="Cadastrar">
                                        
                                         </div> 
                                </form> 
                                
                                </div>
                                
                                
                                <div   <?php
				
			
				if(isset($ocul)){
		echo  'style="display:block;"';
	
	}else{
		echo  'style="display:none;"';
	}
				
				
				?> >
                              
                              
                              <?php
							  
							  if($ocul2== 1){
								
							   ?>
							   <ul id="wizard-titles" class="stepy-titles">
                              <li id="wizard-title-0" class="" style="cursor: default;"><div>Passo 1</div><span>Dados pessoais</span></li>
                              <li id="wizard-title-1" style="cursor: default;" class=""><div>Passo 2</div><span>Dados do requerimento</span></li>
							
                             
                              <li id="wizard-title-3" style="cursor: default;" class="current-step">
                              
                              <div>Passo 3</div><span>Upload de arquivos</span></li></ul>
                              
                              
                              
                              <div class="row-form">
                              <center>
  <div class="jumbotron">
 
    <button type="button" class="btn btn-new-fr" id="mulitplefileuploader">Importar arquivo(s)</button>
  </div>
<form method="post" action="">
        <div class="row-fluid">
           
            
         
            <div class="row-form">
			<input  name="idsession" value="<?php echo $_SESSION['idpedido'];?>" type="hidden">
			
                <div class="span12">
                    <button class="btn btn-new-fr" name="generatec">Salvar <span class="icon-arrow-next icon-white "></span></button>
                  
                </div>
               
                                
            </div>
    
                                 </div></form>
                            </center>
                            
                            <?php 
							
							
							  }else{
								  
							  
							
							?>
                            
                             <ul id="wizard-titles" class="stepy-titles">
                              <li id="wizard-title-0" class="" style="cursor: default;"><div>Passo 1</div><span>Dados pessoais</span></li>
                              <li id="wizard-title-1" style="cursor: default;" class=""><div>Passo 2</div><span>Dados do requerimento</span></li>
							<li id="wizard-title-2" style="cursor: default;" class=""><div>Passo 3</div><span>Upload de arquivos</span></li>
							
                             
                              <li id="wizard-title-3" style="cursor: default;" class="current-step">
                              
                              <div>Passo 4</div><span>Codigo Gerado</span></li></ul>
                              
                              
                              
                              <div class="row-form">
                              <center>
<h3>Codigo gerado com sucesso!</h3>

<h3><?php echo $codefr; ?></h3>

                            </center>
                            <?php } ?>
                         </div>            
                       
                            </div>

                        </div>             
                    </div>  
                </div> 
            
</body>  <script src="home/js/jquery.fileuploadmulti.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
     {

     var settings = {
        url: "home/importar.php?ses=<?php echo $_SESSION['idpedido'];?>",
        method: "POST",
		
    	allowedTypes:"jpg,png,pdf,jpeg",
        fileName: "file",
        multiple: false,
        
        onSuccess:function(files,data,xhr)
        {
           //faz alguma coisa

        },
     
         afterUploadAll:function()
         {
            $(".upload-bar").css("animation-play-state","paused");
            
         },
        onError: function(files,status,errMsg)
        {       
          
            alert(errMsg);
        }

        
     }
     $("#mulitplefileuploader").uploadFile(settings);
        
     });
</script>


