<?php
include_once('model.administracao.class.php');

$novo_cadastro = new administracao(
    $_POST['paciente_id'],
    $_POST['medicamento_id'],
    $_POST['dataa'],
    $_POST['hora'],
    $_POST['dose_administrada'],
    $_POST['observacoes']
);

$novo_cadastro->persistirAdministracao();

header("Location: index.php?info=Administração cadastrada com sucesso!");
?>
