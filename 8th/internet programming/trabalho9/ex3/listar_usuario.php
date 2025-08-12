<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Usuários Cadastrados</h1>
    <?php
    $nome_arquivo = "usuarios.txt";

    if (file_exists($nome_arquivo) && is_readable($nome_arquivo)) {
        $linhas = file($nome_arquivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($linhas) {
            echo "<table>";
            echo "<thead><tr><th>E-mail</th><th>Hash da Senha</th></tr></thead>";
            echo "<tbody>";

            foreach ($linhas as $linha) {
                $dados = explode(";", $linha);
                if (count($dados) == 2) {
                    echo "<tr>";
                    echo "<td>" . htmlentities($dados[0], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>" . htmlentities($dados[1], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "</tr>";
                }
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>Nenhum usuário cadastrado ainda.</p>";
        }
    } else {
        echo "<p>O arquivo de usuários não existe ou não pode ser lido.</p>";
    }
    ?>
    <p><a href="index.html">Voltar ao Menu Principal</a></p>
</body>
</html>