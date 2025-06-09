-- Criação do banco de dados
DROP DATABASE IF EXISTS medicamento_bd;
CREATE DATABASE medicamento_bd;
USE medicamento_bd;

-- Tabela: paciente
CREATE TABLE paciente (
	id_paciente INTEGER NOT NULL AUTO_INCREMENT,
	nome VARCHAR(100) NOT NULL,
	data_nascimento DATE NOT NULL,
	sexo VARCHAR(10) NOT NULL,
	email VARCHAR(50) NOT NULL,
	PRIMARY KEY (id_paciente)
);

-- Tabela: medicamento
CREATE TABLE medicamento (
	id_medicamento INTEGER NOT NULL AUTO_INCREMENT,
	nome VARCHAR(100) NOT NULL,
	principio_ativo VARCHAR(50) NOT NULL,
	forma_farmaceutica VARCHAR(50) NOT NULL,
	dosagem VARCHAR(20) NOT NULL,
	fabricante VARCHAR(100) NOT NULL,
	tarja VARCHAR(30) NOT NULL,
	PRIMARY KEY (id_medicamento)
);

-- Tabela: via_administracao
CREATE TABLE via_administracao (
	id_via INTEGER NOT NULL AUTO_INCREMENT,
	descricao VARCHAR(50) NOT NULL,
	PRIMARY KEY (id_via)
);

-- Tabela: planouso
CREATE TABLE planouso (
	id_plano INTEGER NOT NULL AUTO_INCREMENT,
	paciente_id INTEGER NOT NULL,
	data_criacao DATE NOT NULL,
	observacoes VARCHAR(250) NOT NULL,
	PRIMARY KEY (id_plano),
	FOREIGN KEY (paciente_id) REFERENCES paciente(id_paciente)
);

-- Tabela: planouso_medicamento
CREATE TABLE planouso_medicamento (
	plano_id INTEGER NOT NULL,
	medicamento_id INTEGER NOT NULL,
	quantidade INTEGER NOT NULL,
	posologia VARCHAR(100) NOT NULL,
	duracao_dias INTEGER NOT NULL,
	PRIMARY KEY (plano_id, medicamento_id),
	FOREIGN KEY (plano_id) REFERENCES planouso(id_plano),
	FOREIGN KEY (medicamento_id) REFERENCES medicamento(id_medicamento)
);

-- Tabela: administracao
CREATE TABLE administracao (
	id_administracao INTEGER NOT NULL AUTO_INCREMENT,
	paciente_id INTEGER NOT NULL,
	medicamento_id INTEGER NOT NULL,
	via_id INTEGER NOT NULL,
	dataa DATE NOT NULL,
	hora TIME NOT NULL,
	dose_administrada NUMERIC(5,2) NOT NULL,
	observacoes VARCHAR(250) NOT NULL,
	PRIMARY KEY (id_administracao),
	FOREIGN KEY (paciente_id) REFERENCES paciente(id_paciente),
	FOREIGN KEY (medicamento_id) REFERENCES medicamento(id_medicamento),
	FOREIGN KEY (via_id) REFERENCES via_administracao(id_via)
);
