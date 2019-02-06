<p><h3>Este mini projeto segue como meio de avaliação.</h3></p>
Para garantir melhor segurança foi implementado funções que deixam mais difíceis o acesso inesperado de invasão, dentro do repositório “home” o arquivo funções.php dentro dela existe uma função chamada mysql_filtro, responsável por filtrar todo tipo de dado enviado através do imput do html, podendo assim minimizar invasão por “sql_injector”. 

<p><h3><b>Função destinada a proteção (login)</b></h3></p>

function mysql_filtro($var){<br>
if(get_magic_quotes_gpc()) $var = stripslashes($var);<br>
return mysql_real_escape_string($var);<br>
} //proteção contra sql injector e outros<br>
function mysql_filtro_html($var){<br>
return htmlentities(mysql_filtro($var));<br>
}
