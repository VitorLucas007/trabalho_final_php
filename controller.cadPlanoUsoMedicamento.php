<?php

include_once('model.planousoMedicamento.class.php');

$novo_cadastro = new planousoMedicamento(
    $_POST['plano_id'],
    $_POST['medicamento_id'],
    $_POST['quantidade'],
    $_POST['posologia'],
    $_POST['duracao_dias']
);

$novo_cadastro->persistirPlanoUsoMedicamento();

// Redireciona para a listagem de medicamentos do plano
header("Location: view.formListaPlanoUso.php?paciente_id=" . $_POST['paciente_id']);

?>
