<?php
$nome_arquivo = "usuarios.txt";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_login = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha_login = $_POST['senha'];

    $login_sucesso = false;

    if (file_exists($nome_arquivo) && is_readable($nome_arquivo)) {
        $arquivo = fopen($nome_arquivo, "r");
        if ($arquivo) {
            while (($linha = fgets($arquivo)) !== false) {
                $dados = explode(";", trim($linha));
                // Verifica se a linha tem o formato correto (email;hash)
                if (count($dados) == 2) {
                    $email_salvo = $dados[0];
                    $hash_salvo = $dados[1];

                    // Compara o e-mail e verifica a senha com o hash
                    if ($email_salvo === $email_login && password_verify($senha_login, $hash_salvo)) {
                        $login_sucesso = true;
                        break; // Sai do loop assim que o usuário é encontrado
                    }
                }
            }
            fclose($arquivo);
        }
    }

    if ($login_sucesso) {
        // Redireciona para a página de sucesso
        header("Location: sucesso.html");
        exit();
    } else {
        // Redireciona de volta para a página de login
        header("Location: login_usuario.html?erro=1");
        exit();
    }
} else {
    // Redireciona para a página de login se o acesso não for via POST
    header("Location: login_usuario.html");
    exit();
}
?>