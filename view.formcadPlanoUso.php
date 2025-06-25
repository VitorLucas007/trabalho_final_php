<?php
#view.formCadPlanoUso.php
include_once('view.cabecalho.php');

$paciente_id = isset($_GET['paciente_id']) ? intval($_GET['paciente_id']) : 0;
?>

<div class="container mt-4">
    <h3 class="text-center mb-4">Cadastro de Plano de Uso</h3>

    <form method="POST" action="controller.cadPlanoUso.php" class="mx-auto" style="max-width: 600px;">
        <input type="hidden" name="paciente_id" value="<?php echo $paciente_id; ?>">

        <div class="mb-3">
            <label for="data_criacao" class="form-label">Data de Criação:</label>
            <input type="date" id="data_criacao" name="data_criacao" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="observacoes" class="form-label">Observações:</label>
            <textarea id="observacoes" name="observacoes" class="form-control" rows="4" required></textarea>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Cadastrar Plano de Uso</button>
        </div>
    </form>
</div>

<?php
include_once('view.rodape.php');
?>
