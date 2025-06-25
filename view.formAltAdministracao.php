<?php
#view.formAltAdministracao.php

include_once('view.cabecalho.php');
include_once('model.administracao.class.php');

$administracao = new administracao("", "", "", "", "", "", "");
$administracao->buscarAdministracao($_GET['id_administracao']);
?>

<div class="container mt-5">
    <div class="card shadow-lg mx-auto" style="max-width: 500px;">
        <div class="card-header bg-primary text-white text-center">
            <h4>Alterar Administração</h4>
        </div>
        <div class="card-body">
            <form method="post" action="controller.updAdministracao.php">

                <input type="hidden" name="id_administracao" value="<?php echo $administracao->getIdAdministracao(); ?>">

            <div class="mb-3">
                <label class="form-label fw-bold">Paciente ID</label>
                <input type="text" class="form-control" value="<?php echo $administracao->getPacienteId(); ?>" readonly>
                <input type="hidden" name="paciente_id" value="<?php echo $administracao->getPacienteId(); ?>">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Medicamento ID</label>
                <input type="text" class="form-control" value="<?php echo $administracao->getMedicamentoId(); ?>" readonly>
                <input type="hidden" name="medicamento_id" value="<?php echo $administracao->getMedicamentoId(); ?>">
            </div>

            <div class="mb-3">
                    <label class="form-label fw-bold">Data</label>
                    <input type="date" class="form-control" name="dataa" value="<?php echo $administracao->getDataa(); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Hora</label>
                    <input type="time" class="form-control" name="hora" value="<?php echo $administracao->getHora(); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Dose Administrada</label>
                    <input type="number" step="0.01" class="form-control" name="dose_administrada" value="<?php echo $administracao->getDoseAdministrada(); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Observações</label>
                    <input type="text" class="form-control" name="observacoes" value="<?php echo htmlspecialchars($administracao->getObservacoes()); ?>">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">
                         Gravar Alteração
                    </button>
                    <a href="view.formListaAdministracao.php" class="btn btn-secondary ms-2">
                         Cancelar
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>

<?php
include_once('view.rodape.php');
?>
