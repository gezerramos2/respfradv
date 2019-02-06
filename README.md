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

<br>

Por meio do plugin fileuploadmulti em conjunto com ajax foi possivel enviar multiplos arquivos sem que fosse nescessario sair da pagina, atual do requerimento atraves do acesso externo.
<br>

<script type="text/javascript"><br>
$(document).ready(function()<br>
     {<br>
     var settings = {<br>
        url: "home/importar.php?ses=",<br>
        method: "POST",<br>
		
    	allowedTypes:"jpg,png,pdf,jpeg",<br>
        fileName: "file",<br>
        multiple: false,<br>
        onSuccess:function(files,data,xhr)<br>
        {<br>
           //faz alguma coisa<br>
       },<br>
         afterUploadAll:function()<br>
         {<br>
            $(".upload-bar").css("animation-play-state","paused");<br>
         },<br>
        onError: function(files,status,errMsg)<br>
        { <br>      
            alert(errMsg);<br>
        }<br>
     }<br>
     $("#mulitplefileuploader").uploadFile(settings);<br>
     });<br>
</script>
