-- View com medicamentos dos planos de uso por paciente
CREATE OR REPLACE VIEW vw_planos_com_medicamentos AS
SELECT 
    p.nome AS paciente,
    pu.id_plano,
    m.nome AS medicamento,
    pum.quantidade,
    pum.posologia,
    pum.duracao_dias
FROM planouso pu
JOIN paciente p ON pu.paciente_id = p.id_paciente
JOIN planouso_medicamento pum ON pu.id_plano = pum.plano_id
JOIN medicamento m ON pum.medicamento_id = m.id_medicamento;

-- View com detalhes dos pacientes e seus planos
CREATE OR REPLACE VIEW vw_detalhes_pacientes AS
SELECT 
    p.id_paciente,
    p.nome,
    p.email,
    p.data_nascimento,
    p.sexo,
    pl.id_plano,
    pl.data_criacao,
    pl.observacoes
FROM paciente p
LEFT JOIN planouso pl ON p.id_paciente = pl.paciente_id;
