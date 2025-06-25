<?php
include_once('view.cabecalho.php');
include_once('model.medicamento.class.php');

$med = new medicamento("", "", "", "", "", "", "");
$med->buscarMedicamento($_GET['id_medicamento']);
?>

<div class="container mt-4">
    <h3 class="text-center mb-4">Alterar Medicamento</h3>

    <form method="POST" action="controller.updMedicamento.php" class="w-50 mx-auto">

        <input type="hidden" name="id_medicamento" value="<?php echo $med->getIdMedicamento(); ?>">

        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($med->nome); ?>" required>
        </div>

        <div class="mb-3">
            <label for="principio_ativo" class="form-label">Princípio Ativo:</label>
            <input type="text" class="form-control" id="principio_ativo" name="principio_ativo" value="<?php echo htmlspecialchars($med->principio_ativo); ?>" required>
        </div>

        <div class="mb-3">
            <label for="forma_farmaceutica" class="form-label">Forma Farmacêutica:</label>
            <input type="text" class="form-control" id="forma_farmaceutica" name="forma_farmaceutica" value="<?php echo htmlspecialchars($med->forma_farmaceutica); ?>" required>
        </div>

        <div class="mb-3">
            <label for="dosagem" class="form-label">Dosagem:</label>
            <input type="text" class="form-control" id="dosagem" name="dosagem" value="<?php echo htmlspecialchars($med->dosagem); ?>" required>
        </div>

        <div class="mb-3">
            <label for="fabricante" class="form-label">Fabricante:</label>
            <input type="text" class="form-control" id="fabricante" name="fabricante" value="<?php echo htmlspecialchars($med->fabricante); ?>" required>
        </div>

        <div class="mb-3">
            <label for="tarja" class="form-label">Tarja:</label>
            <input type="text" class="form-control" id="tarja" name="tarja" value="<?php echo htmlspecialchars($med->tarja); ?>" required>
        </div>
        
        <div class="mb-3">
            <label for="uso" class="form-label">Uso:</label>
            <input type="text" class="form-control" id="uso" name="uso" value="<?php echo htmlspecialchars($med->uso); ?>" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Gravar Alteração</button>
        </div>

    </form>
</div>

<?php
include_once('view.rodape.php');
?>
