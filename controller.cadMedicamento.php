 <?php
include_once('model.medicamento.class.php');

$cad = new medicamento($_POST['nome'], $_POST['principio_ativo'], $_POST['forma_farmaceutica'],
                       $_POST['dosagem'], $_POST['fabricante'], $_POST['tarja'], $_POST['uso']);
$cad->persistirMedicamento();

header('location: view.formListaMedicamento.php?info=Medicamento cadastrada com sucesso!');
?>
