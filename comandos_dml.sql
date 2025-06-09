-- Dados da tabela paciente
INSERT INTO paciente (nome, data_nascimento, sexo, email) VALUES
('João Silva', '1990-03-12', 'Masculino', 'joao@gmail.com'),
('Maria Oliveira', '1985-07-20', 'Feminino', 'maria@hotmail.com'),
('Carlos Souza', '1978-11-03', 'Masculino', 'carlos@outlook.com');

-- Dados da tabela medicamento
INSERT INTO medicamento (nome, principio_ativo, forma_farmaceutica, dosagem, fabricante, tarja) VALUES
('Paracetamol', 'Paracetamol', 'Comprimido', '500mg', 'Medley', 'Isento de prescrição'),
('Ibuprofeno', 'Ibuprofeno', 'Comprimido', '400mg', 'Neo Química', 'Vermelha'),
('Amoxicilina', 'Amoxicilina', 'Cápsula', '500mg', 'EMS', 'Vermelha'),
('Dipirona', 'Dipirona Sódica', 'Gotas', '500mg/mL', 'Sanofi', 'Isento de prescrição'),
('Losartana', 'Losartana Potássica', 'Comprimido', '50mg', 'Torrent', 'Vermelha');

-- Dados da tabela via_administracao
INSERT INTO via_administracao (descricao) VALUES
('Oral'),
('Intravenosa'),
('Intramuscular'),
('Subcutânea');

-- Dados da tabela planouso
INSERT INTO planouso (paciente_id, data_criacao, observacoes) VALUES
(1, '2025-06-01', 'Plano para dor de cabeça recorrente'),
(2, '2025-06-02', 'Plano para tratamento de infecção'),
(3, '2025-06-03', 'Controle de pressão arterial');

-- Dados da tabela planouso_medicamento
INSERT INTO planouso_medicamento (plano_id, medicamento_id, quantidade, posologia, duracao_dias) VALUES
(1, 1, 10, 'Tomar 1 comprimido de 8 em 8h', 5),
(1, 2, 6, '1 comprimido a cada 12h', 3),
(2, 3, 21, '1 cápsula de 8 em 8h', 7),
(3, 5, 30, '1 comprimido ao dia', 30);

-- Dados da tabela administracao
INSERT INTO administracao (paciente_id, medicamento_id, via_id, dataa, hora, dose_administrada, observacoes) VALUES
(1, 1, 1, '2025-06-04', '08:00:00', 500.00, 'Paciente apresentou melhora'),
(1, 1, 1, '2025-06-04', '16:00:00', 500.00, 'Sem queixas'),
(2, 3, 1, '2025-06-05', '07:00:00', 500.00, 'Paciente com náusea leve'),
(3, 5, 1, '2025-06-06', '09:00:00', 50.00, 'Sem efeitos colaterais'),
(1, 2, 1, '2025-06-05', '12:00:00', 400.00, 'Dor reduzida');
