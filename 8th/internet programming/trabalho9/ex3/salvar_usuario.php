<?php
$nome_arquivo = "usuarios.txt";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha = $_POST['senha'];

    if ($email && $senha) {
        // Gera o hash da senha. PASSWORD_DEFAULT é a opção mais segura e recomendada.
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        // Prepara a linha para ser salva no arquivo
        // Usamos ";" como delimitador para evitar problemas com vírgulas em e-mails
        $dados_usuario = "$email;$senha_hash\n";

        // Abre o arquivo em modo de escrita, adicionando ao final (append)
        $arquivo = fopen($nome_arquivo, "a");

        if ($arquivo) {
            if (fwrite($arquivo, $dados_usuario)) {
                echo "<h1>Usuário cadastrado com sucesso!</h1>";
            } else {
                echo "<h1>Erro ao escrever no arquivo.</h1>";
            }
            fclose($arquivo);
        } else {
            echo "<h1>Erro ao abrir o arquivo para escrita.</h1>";
        }
    } else {
        echo "<h1>Dados de e-mail ou senha inválidos.</h1>";
    }
} else {
    echo "<h1>Método de requisição inválido.</h1>";
}
echo "<p><a href='index.html'>Voltar ao Menu Principal</a></p>";
?>