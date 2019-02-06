<h3>Este mini projeto segue como meio de avaliação.</h3>
Para garantir melhor segurança foi implementado funções que deixam mais difíceis o acesso inesperado de invasão, dentro do repositório “home” o arquivo funções.php dentro dela existe uma função chamada mysql_filtro que filtra todos tipo de dado enviado através do imput do html podendo assim minimizar invasão por “sql_injector”.
//função destinada a proteção (login)
function mysql_filtro($var){
	if(get_magic_quotes_gpc()) $var = stripslashes($var);
	return mysql_real_escape_string($var);
}
//proteção contra sql injector e outros
function mysql_filtro_html($var){
	return htmlentities(mysql_filtro($var));
}
