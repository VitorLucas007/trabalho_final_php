<?php
#view.formcad.php
include_once('view.cabecalho.php');
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Cadastrar Novo Paciente</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="controller.cadPaciente.php">
                    <div class="mb-3">
                        <label for="cad_nome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="cad_nome" name="cad_nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="cad_data_nascimento" class="form-label">Data de Nascimento:</label>
                        <input type="date" class="form-control" id="cad_data_nascimento" name="cad_data_nascimento" required>
                    </div>
                    <div class="mb-3">
                        <label for="cad_sexo" class="form-label">Sexo:</label>
                        <input type="text" class="form-control" id="cad_sexo" name="cad_sexo" required>
                    </div>
                    <div class="mb-3">
                        <label for="cad_email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="cad_email" name="cad_email" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include_once('view.rodape.php');
?>
