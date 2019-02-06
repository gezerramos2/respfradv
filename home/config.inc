
<?php
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
$con = @mysql_connect("localhost", "root", "") or die("<center> <h3>Não foi possível conectar com o servidor de dados!</h3><br> <img src='associado/img/erro_banco.png' width='212'height='212'  alt=''/></center>" );
mysql_select_db("frdb", $con) or die("<center> <h3>Banco de dados não localizado!</h3><br> <img src='associado/img/banco_nao_encontrado.png' width='212'height='212'  alt=''/></center>");

?>


