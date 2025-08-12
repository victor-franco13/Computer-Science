<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Exemplo de código vulnerável</title>
</head>
<body>
  <h1>Nomes inscritos</h1>
  <ul>
  <?php
    $arq = fopen("nomes.txt", "r");  
    while ($nome = fgets($arq))
      echo "<li>$nome</li>\n";
  ?>
  </ul>
</body></html>

