<?php 
include_once('model.planoUso.class.php');

$upd = new planoUso($_POST['paciente_id'], $_POST['data_criacao'], $_POST['observacoes']);
$upd->setIdPlano($_POST['id_plano']);
$upd->modificarPlano();

header('location: view.formlistaPlanoUso.php?paciente_id=' . $_POST['paciente_id']);
?>
