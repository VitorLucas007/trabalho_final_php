<?php
#view.formListaMedicamento.php

include_once('view.cabecalho.php');
include_once('model.medicamentoColecao.class.php');

$limitador = isset($_POST['busca']) ? $_POST['busca'] : "";

$pegar_cad = new medicamentoColecao($limitador);
$lista_de_cad = $pegar_cad->retornaColecao();
?>

<div class="container mt-4">
    <h3 class="text-center mb-4">Lista de Medicamentos</h3>

    <!-- Formulário de busca -->
    <form method="POST" action="view.formListaMedicamento.php" class="mb-4">
        <div class="input-group">
            <input type="text" class="form-control" name="busca" placeholder="Digite um nome de um medicamento para buscar" value="<?php echo htmlspecialchars($limitador); ?>">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-primary text-center">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Princípio Ativo</th>
                    <th>Forma Farmacêutica</th>
                    <th>Dosagem</th>
                    <th>Fabricante</th>
                    <th>Tarja</th>
                    <th>Uso</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista_de_cad as $valor) { ?>
                    <tr>
                        <td><?php echo $valor->getIdMedicamento(); ?></td>
                        <td><?php echo $valor->getNome(); ?></td>
                        <td><?php echo $valor->getPrincipioAtivo(); ?></td>
                        <td><?php echo $valor->getFormaFarmaceutica(); ?></td>
                        <td><?php echo $valor->getDosagem(); ?></td>
                        <td><?php echo $valor->getFabricante(); ?></td>
                        <td><?php echo $valor->getTarja(); ?></td>
                        <td><?php echo $valor->getUso(); ?></td>
                        <td>
                            <div class="d-flex flex-column align-items-center gap-2">
                                <a href="view.formAltMedicamento.php?id_medicamento=<?php echo $valor->getIdMedicamento(); ?>"  class="btn btn-warning btn-sm me-1">
                                Atualizar
                                </a>
                                <a href="controller.delMedicamento.php?id_medicamento=<?php echo $valor->getIdMedicamento(); ?>" 
                               onclick="return confirm('Tem certeza que deseja excluir?');" 
                               class="btn btn-danger btn-sm">
                                Excluir
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Botão para adicionar novo medicamento -->
    <div class="text-center mt-3">
        <a href="view.formCadMedicamento.php" class="btn btn-success">Cadastrar Novo Medicamento</a>
    </div>
</div>

<?php
include_once('view.rodape.php');
?>
