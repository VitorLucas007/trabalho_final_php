<?php
#controller.cadPlanoUso.php

include_once('model.planoUso.class.php');

$novo_plano = new planoUso($_POST['paciente_id'], $_POST['data_criacao'], $_POST['observacoes']);
$novo_plano->persistirPlano();

header("Location: ./view.formlistaPlanoUso.php?paciente_id=" . $_POST['paciente_id'] . "&info=Plano de Uso Gravado com Sucesso!");
?>
