<?php 
include_once('view.cabecalho.php');
include_once('model.paciente.class.php');

$paciente = new paciente("", "", "", "");
$paciente->buscarPaciente($_GET['id_paciente']);
?>

<div class="container mt-4">
    <h3 class="text-center mb-4">Alterar Dados do Paciente</h3>

    <form method="post" action="controller.updPaciente.php" class="border p-4 rounded shadow">
        <input type="hidden" name="id_paciente" value="<?php echo $paciente->getId(); ?>">

        <div class="mb-3">
            <label class="form-label">Nome:</label>
            <input type="text" name="nome" value="<?php echo $paciente->getNome(); ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Data de Nascimento:</label>
            <input type="date" name="data_nascimento" value="<?php echo $paciente->getDataNascimento(); ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Sexo:</label>
            <input type="text" name="sexo" value="<?php echo $paciente->getSexo(); ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" name="email" value="<?php echo $paciente->getEmail(); ?>" class="form-control" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Gravar Alteração</button>
            <a href="view.formUpdPaciente.php" class="btn btn-secondary">Voltar</a>
        </div>
    </form>
</div>

<?php 
include_once('view.rodape.php');
?>
