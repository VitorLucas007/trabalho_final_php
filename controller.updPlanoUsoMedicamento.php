<?php
include_once('model.planousoMedicamento.class.php');

$cad = new planousoMedicamento(
    $_POST['plano_id'],
    $_POST['medicamento_id'],
    $_POST['quantidade'],
    $_POST['posologia'],
    $_POST['duracao_dias']
);

$cad->modificarPlanoUsoMedicamento();

header('location: view.ListarPlanoUsoMedicamento.php?plano_id=' . $_POST['plano_id']);
?>
