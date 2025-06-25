<?php
include_once('model.administracao.class.php');

if (isset($_GET['id_administracao'])) {
    $cadastro = new administracao("", "", "", "", "", "", "");
    $cadastro->excluirAdministracao($_GET['id_administracao']);
}


header('Location: view.formlistaPaciente.php');
exit;
?>
