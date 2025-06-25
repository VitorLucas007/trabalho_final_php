<?php
include_once('view.cabecalho.php');
include_once('model.medicamentoColecao.class.php');

$plano_id = isset($_GET['id_plano']) ? intval($_GET['id_plano']) : 0;

$meds = new medicamentoColecao("");
$lista_meds = $meds->retornaColecao();
?>

<div class="container mt-4">
    <h3 class="text-center mb-4">Adicionar Medicamento ao Plano ID: <?php echo $plano_id; ?></h3>

    <form method="POST" action="controller.cadPlanoUsoMedicamento.php" class="w-50 mx-auto">

        <input type="hidden" name="plano_id" value="<?php echo $plano_id; ?>">

        <div class="mb-3">
            <label for="medicamento_id" class="form-label">Medicamento:</label>
            <select class="form-control" name="medicamento_id" required>
                <option value="">Selecione...</option>
                <?php foreach ($lista_meds as $med) { ?>
                    <option value="<?php echo $med->getIdMedicamento(); ?>">
                        <?php echo $med->getNome(); ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade:</label>
            <input type="number" class="form-control" name="quantidade" required>
        </div>

        <div class="mb-3">
            <label for="posologia" class="form-label">Posologia:</label>
            <input type="text" class="form-control" name="posologia" required>
        </div>

        <div class="mb-3">
            <label for="duracao_dias" class="form-label">Duração (dias):</label>
            <input type="number" class="form-control" name="duracao_dias" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Adicionar ao Plano</button>
        </div>

    </form>
</div>

<?php
include_once('view.rodape.php');
?>
