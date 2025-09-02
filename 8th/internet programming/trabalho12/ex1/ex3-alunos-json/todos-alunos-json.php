<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

try {
  $stmt = $pdo->query(
    <<<SQL
    SELECT *
    FROM aluno
    LIMIT 30
    SQL
  );
  $arrayAlunos = $stmt->fetchAll(PDO::FETCH_OBJ);
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($arrayAlunos);
} 
catch (Exception $e) {
  exit('Falha inesperada: ' . $e->getMessage());
}
