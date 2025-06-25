<?php
include_once('model.medicamento.class.php');

$cad = new medicamento("", "", "", "", "", "", "");
$cad->excluirMedicamento($_GET['id_medicamento']);

header('location: view.formListaMedicamento.php');
?>
