-- Tabela Medico
CREATE TABLE Medico (
    Codigo INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(100),
    Especialidade VARCHAR(100),
    CRM VARCHAR(20)
);

-- Tabela Paciente
CREATE TABLE Paciente (
    Codigo INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(100),
    Sexo VARCHAR(15),
    Email VARCHAR(100),
    Telefone VARCHAR(20)
);

-- Tabela Agendamento
CREATE TABLE Agendamento (
    Codigo INT PRIMARY KEY AUTO_INCREMENT,
    Datahora DATETIME,
    CodigoMedico INT,
    CodigoPaciente INT,
    FOREIGN KEY (CodigoMedico) REFERENCES Medico(Codigo),
    FOREIGN KEY (CodigoPaciente) REFERENCES Paciente(Codigo)
);

-- Tabela Contato
CREATE TABLE Contato (
    Codigo INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(100),
    Email VARCHAR(100),
    Telefone VARCHAR(20),
    Mensagem TEXT,
    Datahora DATETIME
);

-- Tabela Funcionario
CREATE TABLE Funcionario (
    Codigo INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(100),
    Email VARCHAR(100),
    Senhahash VARCHAR(255),
    EstadoCivil VARCHAR(20),
    DataNascimento DATE,
    Funcao VARCHAR(50)
);