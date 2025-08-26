<?php

require "../conexaoMysql.php";
$pdo = mysqlConnect();

$nome = $_POST["nome"] ?? "";
$cpf = $_POST["cpf"] ?? "";
$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";
$dataNascimento = $_POST["dataNascimento"] ?? "";
$estadoCivil = $_POST["estadoCivil"] ?? "";
$altura = $_POST["altura"] ?? "";

// calcula um hash de senha seguro para armazenar no BD
$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

try {

  $sql = <<<SQL
  -- Repare que a coluna Id foi omitida por ser auto_increment
  INSERT INTO cliente (nome, cpf, email, senhaHash, 
                       dataNascimento, estadoCivil, altura)
  VALUES (?, ?, ?, ?, ?, ?, ?)
  SQL;

  // Neste caso utilize prepared statements para prevenir
  // ataques do tipo SQL Injection, pois precisamos
  // cadastrar dados fornecidos pelo usuário 
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    $nome, $cpf, $email, $senhaHash,
    $dataNascimento, $estadoCivil, $altura
  ]);

  header("location: mostra-clientes.php");
  exit();
} 
catch (Exception $e) {  
  exit('Falha ao cadastrar cliente: ' . $e->getMessage());
}
