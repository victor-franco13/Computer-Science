<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
            text-transform: uppercase;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>Clientes Cadastrados</h1>

<?php
$nome_arquivo = "clientes.txt";

// Verifica se o arquivo existe e é legível
if (file_exists($nome_arquivo) && is_readable($nome_arquivo)) {
    // Lê o conteúdo do arquivo para um array de linhas
    $linhas = file($nome_arquivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // Verifica se o arquivo não está vazio
    if ($linhas) {
        echo "<table>";
        echo "<thead><tr>";
        echo "<th>Nome Completo</th>";
        echo "<th>CPF</th>";
        echo "<th>E-mail</th>";
        echo "<th>Senha</th>"; // AVISO: Não é seguro armazenar senhas em texto plano
        echo "<th>CEP</th>";
        echo "<th>Endereço</th>";
        echo "<th>Bairro</th>";
        echo "<th>Cidade</th>";
        echo "<th>Estado</th>";
        echo "</tr></thead>";
        echo "<tbody>";

        // Percorre cada linha do arquivo
        foreach ($linhas as $linha) {
            // Divide a linha em um array de dados, usando a vírgula como delimitador
            $dados = explode(",", $linha);

            // Verifica se a linha tem o número de campos esperado (9)
            if (count($dados) == 9) {
                echo "<tr>";
                // Percorre cada dado e o exibe em uma célula da tabela
                foreach ($dados as $dado) {
                    // Usa htmlentities para sanitizar os dados e evitar XSS
                    echo "<td>" . htmlentities($dado, ENT_QUOTES, 'UTF-8') . "</td>";
                }
                echo "</tr>";
            }
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>Nenhum cliente cadastrado ainda.</p>";
    }
} else {
    echo "<p>O arquivo de clientes não existe ou não pode ser lido.</p>";
}
?>

</body>
</html>