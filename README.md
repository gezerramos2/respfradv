<p><h3>Este mini projeto segue como meio de avaliação.</h3></p>
Para garantir melhor segurança foi implementado funções que deixam mais difíceis o acesso inesperado de invasão, dentro do repositório “home” o arquivo funções.php dentro dela existe uma função chamada mysql_filtro, responsável por filtrar todo tipo de dado enviado através do imput do html, podendo assim minimizar invasão por “sql_injector”. 

<p><h3><b>Função destinada a proteção (login)</b></h3></p>

![sem titulo](https://user-images.githubusercontent.com/29003914/52319199-8cd07c80-29af-11e9-8380-6d5bcf60cfb2.png)


<br>

Por meio do plugin fileuploadmulti em conjunto com ajax foi possivel enviar multiplos arquivos sem que fosse nescessario sair da pagina, atual do requerimento atraves do acesso externo.
<br>
<br>http://hayageek.github.io/jQuery-Upload-File/4.0.11/jquery.uploadfile.min.js
![sem titulo](https://user-images.githubusercontent.com/29003914/52319112-1c296000-29af-11e9-92ac-661a3206644a.png)

<br>Para gerar um código para cada requerimento apos finalizar o formulários de requerimento é gerado um code hexadecimal de tamanho 6. Para isso foi necessário implantar funções do próprio php. 
<br><b>Strtoupper </b> ele permite transformar toda stringer em letras maiúsculas.
<br><b>Substr </b> é responsável por retornar um pedaço da string.
<br><b>md5 </b>Retorna o hash como um número hexadecimal.
<br> Para que seja aleatorio tambem foi preciso usar outra função a <b>date</b>, com ela foi possivel gerar varios codigos diferentes pois a junção da data com horario atual nunca serão iguais.
![sem titulo](https://user-images.githubusercontent.com/29003914/52319563-8b07b880-29b1-11e9-87ab-7aa5d82cecfd.png)



