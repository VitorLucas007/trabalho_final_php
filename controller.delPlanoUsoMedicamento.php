<?php

include_once('model.persistirBD.class.php');
include_once('model.planousoMedicamento.class.php');

if (isset($_GET['plano_id']) && isset($_GET['medicamento_id'])) {
    $plano_id = intval($_GET['plano_id']);
    $medicamento_id = intval($_GET['medicamento_id']);

    $cadastro = new planousoMedicamento();
    $cadastro->excluirPlanoUsoMedicamento($plano_id, $medicamento_id);

    // Redireciona para a lista de medicamentos do plano, por exemplo
    header("Location: view.listarPlanoUsoMedicamento.php?plano_id=$plano_id&msg=excluido");
    exit;
} else {
    // Se parâmetros não existirem, redireciona para uma página de erro ou para a lista geral
    header("Location: view.listarPlanoUsoMedicamento.php?msg=erro");
    exit;
}
?>
