<?php
include_once('view.cabecalho.php');
?>

<div class="container mt-4">
    <h3 class="text-center mb-4">Cadastro de Medicamento</h3>

    <form method="POST" action="controller.cadMedicamento.php" class="w-50 mx-auto">

        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>

        <div class="mb-3">
            <label for="principio_ativo" class="form-label">Princípio Ativo:</label>
            <input type="text" class="form-control" id="principio_ativo" name="principio_ativo" required>
        </div>

        <div class="mb-3">
            <label for="forma_farmaceutica" class="form-label">Forma Farmacêutica:</label>
            <input type="text" class="form-control" id="forma_farmaceutica" name="forma_farmaceutica" required>
        </div>

        <div class="mb-3">
            <label for="dosagem" class="form-label">Dosagem:</label>
            <input type="text" class="form-control" id="dosagem" name="dosagem" required>
        </div>

        <div class="mb-3">
            <label for="fabricante" class="form-label">Fabricante:</label>
            <input type="text" class="form-control" id="fabricante" name="fabricante" required>
        </div>

        <div class="mb-3">
            <label for="tarja" class="form-label">Tarja:</label>
            <input type="text" class="form-control" id="tarja" name="tarja" required>
        </div>

        <div class="mb-3">
            <label for="uso" class="form-label">Tarja:</label>
            <input type="text" class="form-control" id="uso" name="uso" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>
    </form>
</div>

<?php
include_once('view.rodape.php');
?>
