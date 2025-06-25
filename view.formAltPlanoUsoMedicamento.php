<?php
include_once('view.cabecalho.php');
include_once('model.planousoMedicamento.class.php');

$plano_id = isset($_GET['plano_id']) ? intval($_GET['plano_id']) : 0;
$medicamento_id = isset($_GET['medicamento_id']) ? intval($_GET['medicamento_id']) : 0;

if ($plano_id > 0 && $medicamento_id > 0) {
    $registro = new planousoMedicamento();
    $registro->buscar($plano_id, $medicamento_id);
} else {
    echo "<div class='alert alert-danger text-center'>Parâmetros inválidos para edição.</div>";
    include_once('view.rodape.php');
    exit;
}
?>

<div class="container mt-4">
    <h3 class="text-center mb-4">Editar Medicamento no Plano</h3>

    <form method="POST" action="controller.updPlanoUsoMedicamento.php" class="w-50 mx-auto">
        <input type="hidden" name="plano_id" value="<?php echo $registro->getPlanoId(); ?>">
        <input type="hidden" name="medicamento_id" value="<?php echo $registro->getMedicamentoId(); ?>">

        <div class="mb-3">
            <label class="form-label">Plano ID</label>
            <input type="text" class="form-control" value="<?php echo $registro->getPlanoId(); ?>" disabled>
        </div>

        <div class="mb-3">
            <label class="form-label">Medicamento ID</label>
            <input type="text" class="form-control" value="<?php echo $registro->getMedicamentoId(); ?>" disabled>
        </div>

        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" value="<?php echo $registro->getQuantidade(); ?>" required>
        </div>

        <div class="mb-3">
            <label for="posologia" class="form-label">Posologia</label>
            <input type="text" class="form-control" id="posologia" name="posologia" value="<?php echo htmlspecialchars($registro->getPosologia()); ?>" required>
        </div>

        <div class="mb-3">
            <label for="duracao_dias" class="form-label">Duração (dias)</label>
            <input type="number" class="form-control" id="duracao_dias" name="duracao_dias" value="<?php echo $registro->getDuracaoDias(); ?>" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="view.ListarPlanoUsoMedicamento.php?plano_id=<?php echo $registro->getPlanoId(); ?>" class="btn btn-secondary ms-2">Cancelar</a>
        </div>
    </form>
</div>

<?php include_once('view.rodape.php'); ?>
