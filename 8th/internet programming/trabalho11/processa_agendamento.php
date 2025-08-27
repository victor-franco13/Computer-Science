<?php

// Configurações do banco de dados (substitua pelos seus dados)
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Inicia a transação
$conn->begin_transaction();

try {
    // 1. Inserir dados na tabela Paciente
    $sql_paciente = "INSERT INTO Paciente (Nome, Sexo, Email, Telefone) VALUES (?, ?, ?, ?)";
    $stmt_paciente = $conn->prepare($sql_paciente);
    $stmt_paciente->bind_param("ssss", $_POST['nome_paciente'], $_POST['sexo_paciente'], $_POST['email_paciente'], $_POST['telefone_paciente']);
    $stmt_paciente->execute();

    // Obtém o Código do paciente recém-inserido
    $codigo_paciente = $conn->insert_id;
    $stmt_paciente->close();

    // 2. Inserir dados na tabela Agendamento
    $sql_agendamento = "INSERT INTO Agendamento (Datahora, CodigoMedico, CodigoPaciente) VALUES (?, ?, ?)";
    $stmt_agendamento = $conn->prepare($sql_agendamento);
    $stmt_agendamento->bind_param("sii", $_POST['datahora'], $_POST['codigo_medico'], $codigo_paciente);
    $stmt_agendamento->execute();
    $stmt_agendamento->close();

    // Se tudo deu certo, comita a transação
    $conn->commit();
    echo "Agendamento realizado com sucesso!";

} catch (Exception $e) {
    // Se algo deu errado, reverte a transação (rollback)
    $conn->rollback();
    echo "Erro ao agendar a consulta: " . $e->getMessage();
}

// Fecha a conexão
$conn->close();

?>