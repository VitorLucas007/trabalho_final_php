<?php
include_once('model.administracao.class.php');

$cad = new administracao(
    $_POST['paciente_id'],
    $_POST['medicamento_id'],
    $_POST['dataa'],
    $_POST['hora'],
    $_POST['dose_administrada'],
    $_POST['observacoes']
);

$cad->setIdAdministracao($_POST['id_administracao']);
$cad->modificarAdministracao();

header('Location: view.formListaAdministracao.php?paciente_id=' . $_POST['paciente_id']);
?>
