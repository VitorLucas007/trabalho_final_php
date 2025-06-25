<?php
#view.formAltPlanoUso.php

include_once('view.cabecalho.php');
include_once('model.planoUso.class.php');

$plano = new planoUso("", "", "");
$plano->buscarPlano($_GET['id_plano']);
?>

<div class="container mt-4">
    <h3 class="text-center mb-4">Alterar Plano de Uso</h3>

    <form method="post" action="controller.updPlanoUso.php" class="mx-auto" style="max-width: 600px;">
        <input type="hidden" name="id_plano" value="<?php echo $plano->getIdPlano(); ?>">
        <input type="hidden" name="paciente_id" value="<?php echo $plano->getPacienteId(); ?>">

        <div class="mb-3">
            <label class="form-label">Paciente ID:</label>
            <input type="text" class="form-control" value="<?php echo $plano->getPacienteId(); ?>" disabled>
        </div>

        <div class="mb-3">
            <label for="data_criacao" class="form-label">Data de Criação:</label>
            <input type="date" id="data_criacao" name="data_criacao" class="form-control" value="<?php echo $plano->getDataCriacao(); ?>">
        </div>

        <div class="mb-3">
            <label for="observacoes" class="form-label">Observações:</label>
            <textarea id="observacoes" name="observacoes" class="form-control" rows="4"><?php echo $plano->getObservacoes(); ?></textarea>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Gravar Alteração</button>
        </div>
    </form>
</div>

<?php
include_once('view.rodape.php');
?>
