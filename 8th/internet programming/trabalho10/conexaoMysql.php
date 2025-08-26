<?php

function mysqlConnect()
{
  $db_host = "sql112.infinityfree.com";
  $db_username = "if0_39202615";
  $db_password = "64EEhF64irl1";
  $db_name = "if0_39202615_ppi";

  $options = [
    PDO::ATTR_EMULATE_PREPARES => false, // desativa a execução emulada de prepared statements
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // ativa o lançamento de exceções em casos de erros
  ];

  try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_username, $db_password, $options);
    return $pdo;
  } 
  catch (Exception $e) {
    exit('Ocorreu uma falha na conexão com o MySQL: ' . $e->getMessage());
  }
}

?>
