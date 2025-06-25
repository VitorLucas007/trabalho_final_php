<?php

include_once('model.persistirBD.class.php');
include_once('model.planoUso.class.php');

$excluir = new planoUso("", "", "");
$excluir->excluirPlano($_GET['id_plano']);

header("Location: ./view.formListaPlanoUso.php?paciente_id=".$_GET['paciente_id']);

?>
