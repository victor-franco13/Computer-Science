<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Exemplo de uso da função htmlspecialchars</title>
</head>

<body>
  <h1>Nomes inscritos</h1>
  <ul>
  <?php
    $arq = fopen("nomes.txt", "r");  
    while ($nome = fgets($arq)) {
      $nomeClean = htmlspecialchars($nome);
      echo "<li>$nomeClean</li>";
    }
  ?>
  </ul>
</body>

</html>