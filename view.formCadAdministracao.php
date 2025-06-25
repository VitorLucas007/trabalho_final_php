<?php
include_once('view.cabecalho.php');
include_once('model.medicamentoColecao.class.php');

// Carregar a lista de medicamentos
$medicamentosColecao = new medicamentoColecao("");
$listaMedicamentos = $medicamentosColecao->retornaColecao();

$paciente_id = isset($_GET['paciente_id']) ? intval($_GET['paciente_id']) : '';
?>

<div class="container mt-5" style="max-width: 600px;">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            <h4>Cadastrar Administração</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="controller.cadAdministracao.php">

                <div class="mb-3">
                    <label for="paciente_id" class="form-label">Paciente ID</label>
                    <input type="text" class="form-control" id="paciente_id_display" value="<?php echo $paciente_id; ?>" readonly>
                    <input type="hidden" name="paciente_id" value="<?php echo $paciente_id; ?>">
                </div>

                <div class="mb-3">
                    <label for="medicamento_id" class="form-label">Medicamento</label>
                    <select class="form-select" id="medicamento_id" name="medicamento_id" required>
                        <option value="">-- Selecione o medicamento --</option>
                        <?php foreach ($listaMedicamentos as $med) { ?>
                            <option value="<?php echo $med->getIdMedicamento(); ?>">
                                <?php echo htmlspecialchars($med->getNome()); ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="dataa" class="form-label">Data</label>
                    <input type="date" class="form-control" id="dataa" name="dataa" required>
                </div>

                <div class="mb-3">
                    <label for="hora" class="form-label">Hora</label>
                    <input type="time" class="form-control" id="hora" name="hora" required>
                </div>

                <div class="mb-3">
                    <label for="dose_administrada" class="form-label">Dose Administrada</label>
                    <input type="number" step="0.01" class="form-control" id="dose_administrada" name="dose_administrada" required>
                </div>

                <div class="mb-3">
                    <label for="observacoes" class="form-label">Observações</label>
                    <input type="text" class="form-control" id="observacoes" name="observacoes" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>

            </form>
        </div>
    </div>
</div>

<?php
include_once('view.rodape.php');
?>
