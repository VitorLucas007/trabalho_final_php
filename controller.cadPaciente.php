<?php

#controller.cadPaciente.php

include_once('model.paciente.class.php');

$novo_cadastro = new paciente($_POST['cad_nome'], $_POST['cad_data_nascimento'], $_POST['cad_sexo'], $_POST['cad_email'],);
$novo_cadastro->persistirPaciente();

header("Location: index.php?info=Paciente cadastrada com sucesso!");

?>