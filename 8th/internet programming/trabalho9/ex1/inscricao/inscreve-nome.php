<?php

// resgata o nome submetido no formulário
$nome = $_POST["nome"] ?? "";

// abre/cria um arquivo de texto (modo "append"), 
// acrescenta o nome no final e fecha o arquivo
$arq = fopen("nomes.txt", "a");
fwrite($arq, "$nome \n");
fclose($arq);

// redireciona de volta para o formulário
header("location: form-inscricao.html");
?>


