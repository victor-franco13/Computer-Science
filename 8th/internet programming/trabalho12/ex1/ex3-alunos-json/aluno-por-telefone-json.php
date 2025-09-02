<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

$telefone = $_GET['telefone'] ?? '';

try {
  $stmt = $pdo->prepare(
    <<<SQL
    SELECT *
    FROM aluno
    WHERE telefone = ?
    SQL
  );
  $stmt->execute([$telefone]);
  $aluno = $stmt->fetch(PDO::FETCH_OBJ);
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($aluno);
} 
catch (Exception $e) {
  exit('Falha inesperada: ' . $e->getMessage());
}
