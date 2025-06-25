<?php

include_once('model.persistirBD.class.php');
include_once('model.paciente.class.php');

$id = intval($_GET['id_paciente']);

$bd = new persistirBD("127.0.0.1", "root", "", "bd_medicamentos");
$bd->conectar();
// 1. Excluir os medicamentos do plano
$bd->persistir("DELETE FROM planouso_medicamento WHERE plano_id IN (SELECT id_plano FROM planouso WHERE paciente_id = $id)");

// 2. Excluir os planos do paciente
$bd->persistir("DELETE FROM planouso WHERE paciente_id = $id");

// 3. Excluir as administrações do paciente
$bd->persistir("DELETE FROM administracao WHERE paciente_id = $id");

$cadastro = new paciente("","","","");
$cadastro->excluirPaciente($_GET['id_paciente']);

$bd->desconectar();

header('location:./view.formlistaPaciente.php');