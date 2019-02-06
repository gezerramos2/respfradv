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
    
    <script type='text/javascript' src="js/plugins/uniform/jquery.uniform.min.js"></script>
    
    <script type='text/javascript' src='js/plugins/datatables/jquery.dataTables.min.posts.js'></script>
    
    <script type='text/javascript' src='js/plugins/shbrush/XRegExp.js'></script>
    <script type='text/javascript' src='js/plugins/shbrush/shCore.js'></script>
    <script type='text/javascript' src='js/plugins/shbrush/shBrushXml.js'></script>
    <script type='text/javascript' src='js/plugins/shbrush/shBrushJScript.js'></script>
    <script type='text/javascript' src='js/plugins/shbrush/shBrushCss.js'></script>    
    
    <script type='text/javascript' src='js/plugins.js'></script>
    <script type='text/javascript' src='js/charts.js'></script>
    <script type='text/javascript' src='js/actions.js'></script>
   

    <!--continuação da pagina-->
 
      <style type="text/css">
    .ui-dialog iframe {
    box-sizing: border-box;
    margin: 0px;
    padding: 0px !important;
    border: 0px none black;
    width: 100% !important;
    height: 100%;    
}

.label {
 
    line-height: 14px !important;
}
.linka a{

    color: #fff;
    display: block;
    
    line-height: 18px;
    margin-bottom: 0px;
    text-decoration: none !important;	
}
.linka a:hover{

    color: #b0e0f8

}
  </style>

              <div class="page-header">
                    <div class="icon">
                        <span class="ico-layout-7"></span>
                    </div>
                    <h1>Posts </h1>
              </div>

              <div class="row-fluid">
                    <div class="span12">
                      <div class="block">

                                <div class="data-fluid">
                                    <table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>

                                                <th >Code</th>
                                                <th>Autor</th>
                                                <th >Tipo causa</th>
												<th >Tipo modo</th>
                                                <th>Data</th>
												<th>Ações</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
										
                                        $sql_lista = mysql_query("SELECT * FROM fr_request order by id_request desc");
while($resultado = mysql_fetch_array($sql_lista)){
										?>
                                           <tr>
                                                <td><?php echo $resultado['fr_code_hex'];?></td>
                                                <td  align="left" width="30%"><?php echo $resultado['re_nome'];?></td>
                                                <td><?php echo $resultado['re_tipo_causa'];?> </td>
                                                <td><?php echo $resultado['re_tipo_modo'];?></td>
												<td><?php echo inverteData($resultado['re_datnas']);?></td>
												
												<td><small><span class="btn btn-success"><div class="linka"><a href="?s=update&edit=<?php echo $resultado['id_request'];?>" title="Editar">Editar</a></div></span>
																						</div>
																						<form method="post" name="cad" action="">
												 <input type="hidden" name="id_data" value="<?php echo $resultado['id_request'];?>">
												 <input type="submit" onclick="return confirm('Tem certeza que deseja excluir o requerimento?')" name="cad" class="btn btn-danger" value="Excluir">
												 </form></small>
												</td>
												

                                            </tr>  
                                            <?php }?>                                                      
                                        </tbody>
                                    </table>                    
                                </div> 
                      </div>           



                </div>
                </div> 
    
    
    

                            
                            
                        </div>
                    </div>       
                </div>
            </div>  
            
                
                
                

                


 <?php 


 
 /*fim do testa session	*/	
  } 
  
   /*Salva postagem	*/
      if(isset($_POST['cad'])){
	   $id_data = mysql_filtro_html($_POST['id_data']);
	   $sql =mysql_query("DELETE FROM fr_request WHERE id_request='$id_data';");
	   
	  if(!$sql){
          echo "<script>alert('Erro ao excluir requerimento, favor verificar se existe arquivos!'); </script>";
        }
     header("Refresh: 0");
   }
if(isset($_POST['cadpost'])){
	if(!empty($_POST['post_cat']) && !empty($_POST['post_text']) && !empty($_POST['post_imagem']) && !empty($_POST['post_titulo'])){
	date_default_timezone_set("Brazil/East");
	$data_atual =  date('Y-m-d');
	$id_rep = $_SESSION['id_ass'];
	
	$post_titulo = mysql_filtro_html($_POST['post_titulo']);
	$post_cat = mysql_filtro_html($_POST['post_cat']);
	$post_text = mysql_filtro_html($_POST['post_text']);
	$post_imagem = mysql_filtro_html($_POST['post_imagem']);
	

	/*Faz insert postagem*/								
		mysql_query("INSERT INTO ass_postagens (post_titulo, post_texto, post_img, post_cat, post_datacri, post_autor_id) VALUES ('$post_titulo', '$post_text', '$post_imagem', '$post_cat ', '$data_atual', '$id_rep');");
	
	}else {

	echo "<script>alert('Preencha todos os campos!'); history.back();</script>";
	}
}



?> 
                
                                          
        