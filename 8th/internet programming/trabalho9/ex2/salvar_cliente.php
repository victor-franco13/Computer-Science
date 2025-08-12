<?php
// Define o nome do arquivo onde os dados serão armazenados
$nome_arquivo = "clientes.txt";

// Verifica se o método de requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitiza e obtém os dados do formulário
    $nome_completo = filter_input(INPUT_POST, 'nome_completo', FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
    $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
    $bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);

    // Concatena os dados em uma única string, separados por vírgula
    $dados_cliente = "$nome_completo,$cpf,$email,$senha,$cep,$endereco,$bairro,$cidade,$estado\n";

    // Abre o arquivo para escrita, em modo "append" (a) para adicionar ao final
    $arquivo = fopen($nome_arquivo, "a");

    // Verifica se o arquivo foi aberto com sucesso
    if ($arquivo) {
        // Escreve a string de dados no arquivo
        if (fwrite($arquivo, $dados_cliente)) {
            echo "Dados do cliente salvos com sucesso!";
        } else {
            echo "Erro ao escrever no arquivo!";
        }
        // Fecha o arquivo
        fclose($arquivo);
    } else {
        echo "Erro ao abrir o arquivo para escrita!";
    }
} else {
    echo "Método de requisição inválido.";
}
?>