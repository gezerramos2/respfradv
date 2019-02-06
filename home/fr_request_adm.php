<?php
if(!isset($_SESSION['user_session']) && !isset($_SESSION['pwd_session'])){
echo "<meta http-equiv='refresh' content='0, ../'>";
}else{
	/*Verifica o nivel do login*/

?>
              <!--Scripts especificos de cada pagina-->
               
    <script type='text/javascript' src='js/plugins/jquery/jquery-ui-1.10.1.custom.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/jquery-migrate-1.1.1.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/globalize.js'></script>
    <script type='text/javascript' src='js/plugins/other/excanvas.js'></script>
    
    <script type='text/javascript' src='js/plugins/other/jquery.mousewheel.min.js'></script>
        
    <script type='text/javascript' src='js/plugins/bootstrap/bootstrap.min.js'></script>
    
    <script type='text/javascript' src='js/plugins/cookies/jquery.cookies.2.2.0.min.js'></script>    
    
    <script type='text/javascript' src='js/plugins/jflot/jquery.flot.js'></script>    
    <script type='text/javascript' src='js/plugins/jflot/jquery.flot.stack.js'></script>    
    <script type='text/javascript' src='js/plugins/jflot/jquery.flot.pie.js'></script>
    <script type='text/javascript' src='js/plugins/jflot/jquery.flot.resize.js'></script>
    
    <script type='text/javascript' src='js/plugins/sparklines/jquery.sparkline.min.js'></script>        
    
    <script type='text/javascript' src='js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'></script>
    
    <script type='text/javascript' src="js/plugins/uniform/jquery.uniform.min.js"></script>
    
    <script type='text/javascript' src='js/plugins/shbrush/XRegExp.js'></script>
    <script type='text/javascript' src='js/plugins/shbrush/shCore.js'></script>
    <script type='text/javascript' src='js/plugins/shbrush/shBrushXml.js'></script>
    <script type='text/javascript' src='js/plugins/shbrush/shBrushJScript.js'></script>
    <script type='text/javascript' src='js/plugins/shbrush/shBrushCss.js'></script>    
    
    <script type='text/javascript' src='js/plugins.js'></script>
    <script type='text/javascript' src='js/charts.js'></script>
    
    <script type='text/javascript' src='js/actions.js'></script>
              
              
    <script type='text/javascript' src='js/plugins/stepywizard/jquery.stepy.js'></script>
    <script type='text/javascript' src="js/plugins/select/select2.min.js"></script>
    <script type='text/javascript' src='js/plugins/validationEngine/languages/jquery.validationEngine-en.js'></script>
    <script type='text/javascript' src='js/plugins/validationEngine/jquery.validationEngine.js'></script>
    <script type='text/javascript' src='js/plugins/maskedinput/jquery.maskedinput.js'></script>
     
    
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

<div class="page-header">
                    <div class="icon">
                        <span class="ico-stack-2"></span>
                    </div>
                    <h1>Lista <a href="?s=home"><button class="btn btn-primary"><span class="ico-step-backward icon-white"></span></button></a><small>Alterar pedido de requerimento</small></h1>
</div>

                <div class="row-fluid">

                    <div class="span8">  
                    
  	<?php
	$get_edit= $_REQUEST['edit'];
	if(empty($get_edit)){
		$ocul = '';
	}else{

        $sql_listaass2 = mysql_query("SELECT * FROM fr_request WHERE id_request=$get_edit;");				
		$resultado_fina = mysql_fetch_array($sql_listaass2);
		//$nivelas = $resultado_fina['log_id_nivel'];	

	}
?>

                         <div class="block">
                            <div class="head dblue">
                                <div class="icon"><span class="ico-layout-9"></span></div>
                                <h2>Alterar pedido-(a) <?php echo @$resultado_fina['re_nome'];?> Code: <?php echo $resultado_fina['fr_code_hex'];?> </h2>
                                <ul class="buttons">
                                    <li><div class="icon"><span class="ico-info"></span></div></li>
                                </ul> 
                                </div>             
                            <div class="data-fluid">  
                       <div>
                        <form  method="post" name="cad2"  id="validate" action="">
                        
                                <div id="wizard">
                                
                                
                             <fieldset title="Passo 1">                            
                                                <legend>Dados pessoais</legend>
                                                                       
                                                
                                     <div class="row-form">
                                    <div class="span2">Nome:</div>
                                    <div class="span10">
									<input type="hidden" name="id_request" value="<?php echo $get_edit?>">
                                      <input type="text" value="<?php echo $resultado_fina['re_nome'];?>" name="re_nome" class="validate[required,minSize[4],maxSize[30]]"/>
                                        <span class="bottom">Nome, max tamanho = 30</span>
                                    </div>
                                    </div>
                                     <div class="row-form">
                                    <div class="span2">Data Nascimento</div>
                                    <div class="span10">
                                      <input type="text" value="<?php echo inverteData($resultado_fina['re_datnas']);?>" name="re_datnas"  id="re_datnas" class="validate[required] datepicker"/>
                                        <span class="bottom">Exemplo dd-mm-aaaa</span>
                                    </div>
                                    </div>
                                         <div class="row-form">
                                    <div class="span2">CPF:</div>
                                    <div class="span10">
                                      <input type="text" value="<?php echo $resultado_fina['re_cpf'];?>"name="re_cpf" id="re_cpf" class="validate[required,minSize[4],maxSize[14]]"/>
                                        <span class="bottom">Exemplo 999.999.999-99</span>
                                    </div>
                                    </div>
                                    <div class="row-form">
                                    <div class="span2">Filiação Pai:</div>
                                    <div class="span10">
                                      <input type="text" name="re_filiap" value="<?php echo $resultado_fina['re_filiap'];?>" class="validate[required,minSize[4],maxSize[48]]"/>
                                        <span class="bottom">Pai, max tamanho = 45</span>
                                    </div>
                                    </div>
                                       <div class="row-form">
                                    <div class="span2">Filiação Mãe:</div>
                                     <div class="span10">
                                      <input type="text" name="re_filiam" value="<?php echo $resultado_fina['re_filiam'];?>" class="validate[required,minSize[4],maxSize[48]]"/>
                                        <span class="bottom">Mãe, max tamanho = 45</span>
                                    </div> 
                                    </div>
                                    <div class="row-form">
                                    <div class="span2">Numero Tel:</div>
                                    <div class="span10">
                                      <input type="text" name="re_tel" value="<?php echo $resultado_fina['re_tel'];?>" id="re_tel" class="validate[required,minSize[4],maxSize[17]]"/>
                                        <span class="bottom">(99) 99999-9999 </span>
                                    </div>
                                    </div>
                                       <div class="row-form">
                                    <div class="span2">Numero Tel 2:</div>
                                    <div class="span10">
                                      <input type="text" name="re_tel2" id="re_tel2" value="<?php echo @$resultado_fina['re_tel2'];?>" class="validate[required,minSize[4],maxSize[17]]"/>
                                        <span class="bottom">(99) 99999-9999 </span>
                                    </div>
                                    </div>
                                       <div class="row-form">
                                    <div class="span2">Endereço:</div>
                                    <div class="span10">
                                      <input type="text" name="re_endereco" value="<?php echo $resultado_fina['re_endereco'];?>" class="validate[required,minSize[4],maxSize[30]]"/>
                                        <span class="bottom">Endereço, max tamanho = 30</span>
                                    </div>
                                    </div>
                                    
                                    
                                     <div class="row-form">
                                    <div class="span2">N°:</div>
                                    <div class="span10">
                                      <input type="text" name="re_n_casa" value="<?php echo $resultado_fina['re_n_casa'];?>" class="validate[required,minSize[1],maxSize[6]]"/>
                                        <span class="bottom">Nº, max tamanho = 30</span>
                                    </div>
                                    </div>
                                    
                                    
                                    <div class="row-form">
                                    <div class="span2">Email:</div>
                                    <div class="span10">
                                      <input type="text" name="re_email" value="<?php echo $resultado_fina['re_email'];?>" class="validate[required,minSize[4],maxSize[25],custom[email]]"/>
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
                                    
  
										    <select name="re_tipo_causa"  class="select"  style="width: 100%;">
											<?php $catr = $resultado_fina["re_tipo_causa"];?>
                                                            <option value=""></option>
                                                            <option <?php if($catr=="Trabalhista"){echo "selected='selected'";}else{} ?> value="Trabalhista">Trabalhista</option>
                                                            <option <?php if($catr=="Outros"){echo "selected='selected'";}else{} ?> value="Outros">Outros</option>
															
                                          </select>
                                        
                                        <span class="bottom">Tipo do requerimento</span>   
                                    </div>
                                   </div> 
								   <!--neste  passo deveremos devolver somente o tipo de processo-->
								   
								   <!--tipo trabahista-->
								   <div class="row-form">
                                    <div class="span2">Meio do Requerimento:</div>
                                    <div class="span10">

										   <select name="re_modo"  class="select"  style="width: 100%;">
											<?php $catr = $resultado_fina["re_tipo_modo"];?>
                                                            <option value=""></option>
                                                            <option <?php if($catr=="Reclamante"){echo "selected='selected'";}else{} ?> value="Reclamante">Reclamante(Autor)</option>
                                                            <option <?php if($catr=="Reclamado"){echo "selected='selected'";}else{} ?> value="Reclamado">Reclamado(Réu)</option>
															
                                          </select>
                                        
                                        <span class="bottom">Escolha o meio do requerimento</span>   
                                    </div>
                                   </div>

								   <!--so aparece quando liberar reclamante ou reu-->
								   <div class="row-form">
                                    <div class="span2">Numero do processo:</div>
                                    <div class="span10">
                                      <input type="text" value="<?php echo @$resultado_fina['re_num_proc'];?>" name="re_num_proc" class="validate[minSize[1],maxSize[20]]"/>
                                        <span class="bottom">Nº, max tamanho = 20</span>
                                    </div>
                                    </div>
                                           <div class="row-form">
                                    <div class="span2">Data da emissão do autor ou reclamante</div>
                                    <div class="span10">
                                      <input type="text" value="<?php echo inverteData($resultado_fina['re_date_req']);?>" name="re_date_req"  id="re_data_req" class="datepicker"/>
                                        <span class="bottom">Exemplo dd-mm-aaaa</span>
                                    </div>
                                    </div>
								   <!--fim dos tipos-->
              
                                        </fieldset>

                                        <fieldset title="Passo 3">
                                            <legend>Arquivos anexados</legend>
											  <input type="submit" name="cad2" style="float: right;" class="btn btn-primary" value="Salvar">
												
											</form>
                                        
                       
                                 <!--inicio exibição de arquivos-->
								 <div class="data-fluid">
                                <table cellpadding="0" cellspacing="0" width="100%" class="table">
                                    <thead>
                                        <tr>
                                            <th width="25%">
                                            Nome
                                            </th>
                                            <th width="25%">
                                            Exibir
                                            </th>
											<th width="25%">
                                            Tipo
                                            </th>
											<th width="25%">
                                            Tamanho
                                            </th>
                                            <th width="25%">
                                            Ações
                                            </th>
                                        </tr>
                                    </thead>
									   
                                    <tbody>
									<?php
										
                                        $sql_lista = mysql_query("SELECT * FROM fr_data where fr_request_id_request =$get_edit;");
                                        while($resultado = mysql_fetch_array($sql_lista)){
										?>
                                        <tr>
                                            <td>
                                                <?php echo $resultado['dat_nome'];?>
                                            </td>
											<td>
                                                <a href="<?php echo $resultado['dat_code'];?>" target="_blank">Exibir</a>
                                            </td>
											<td>
                                                <?php echo $resultado['dat_tipo'];?>
                                            </td>
                                            <td>
											 <?php echo By2M($resultado['dat_size']);?>
                                               											 
											</td>
                                            <td><form method="post" name="cad" action="">
												 <input type="hidden" name="id_data" value="<?php echo $resultado['id_data'];?>">
												 <input type="hidden" name="dat_code" value="<?php echo $resultado['dat_code'];?>">
												 <input type="submit" onclick="return confirm('Tem certeza que deseja excluir?')" name="cad" class="btn label-important" value="Excluir">
												 </form>
											</td>
                                          
                                        </tr>
                                        <?php }?> 
                                    </tbody>
                                </table>
                            </div>
								 <!--fim da exibição de arquivos-->
                              
                                   
                                            <div class="toolbar bottom tar">
                                                <div class="btn-group">

                                                </div>
                                            </div> 

                                        											
                                        </fieldset>
										<input type="hidden" name="cad2" class="btn btn-primary finish" value="Alterar">
                                        
                                       
                                         </div> 
                                 
                                
                                </div>
                                

                        </div>             
                    </div>  
                </div> 
            
                         
   <?php 
   if(isset($_POST['cad'])){
	   $id_data = mysql_filtro_html($_POST['id_data']);
	   $dat_code = mysql_filtro_html($_POST['dat_code']);
	   mysql_query("DELETE FROM fr_data WHERE id_data='$id_data';");
	   unlink($dat_code);
	   header("Refresh: 0");

   }
   
   if(isset($_POST['cad2'])){
	   
     if(!empty($_POST['re_nome']) && !empty($_POST['re_cpf'])){
        
		 $id_request = mysql_filtro_html($_POST['id_request']);
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
		 $re_num_proc = mysql_filtro_html($_POST['re_num_proc']);
		 $re_date_req = mysql_filtro_html($_POST['re_date_req']);
		 

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

		$re_date_req = inverteData($re_date_req);
		$re_datnas = inverteData($re_datnas);
		$sql = mysql_query("UPDATE fr_request SET re_nome='$re_nome', re_cpf='$re_cpf', re_filiap='$re_filiap', re_filiam='$re_filiam', re_datnas='$re_datnas', re_tel='$re_tel', re_tel2='$re_tel2', re_endereco='$re_endereco', re_n_casa='$re_n_casa', re_email='$re_email', re_tipo_causa='$re_tipo_causa', re_tipo_modo='$re_modo', re_num_proc='$re_num_proc', re_date_req='$re_date_req' WHERE id_request='$id_request';");
		header("Refresh: 0");
		if(!$sql){
          echo "<script>alert('Erro ao excluir requerimento, favor verificar se existe arquivos!'); </script>";
        }
	}
	}}

   } ?>