<?php 
include_once('model.paciente.class.php');


$cad = new paciente($_POST['nome'], $_POST['data_nascimento'], $_POST['sexo'], $_POST['email']);
$cad->setId($_POST['id_paciente']);
$cad->modificarPaciente();

header('location: view.formlistaPaciente.php');
?>