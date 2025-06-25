<?php
#view.formlista.php

include_once('view.cabecalho.php');
include_once('model.pacienteColecao.class.php');

$limitador = isset($_POST['busca']) ? $_POST['busca'] : "";

$pegar_cad = new pacienteColecao($limitador);
$lista_de_cad = $pegar_cad->retornaColecao();
?>

<div class="container">
    <h3 class="text-center mb-4">Lista de Pacientes</h3>

    <!-- Formulário de busca -->
    <form method="POST" action="view.formlistaPaciente.php" class="mb-4">
        <div class="input-group">
            <input type="text" class="form-control" name="busca" placeholder="Digite um nome para buscar" value="<?php echo htmlspecialchars($limitador); ?>">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </form>

    <!-- Tabela de pacientes -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-primary">
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Data Nascimento</th>
                    <th>Sexo</th>
                    <th>Email</th>
                    <th>Ações</th>
                    <th>Administração</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista_de_cad as $valor) { ?>
                    <tr>
                        <td><?php echo $valor->getId(); ?></td>
                        <td><?php echo $valor->getNome(); ?></td>
                        <td><?php echo $valor->getDataNascimento(); ?></td>
                        <td><?php echo $valor->getSexo(); ?></td>
                        <td><?php echo $valor->getEmail(); ?></td>
                        <td>
                        <a href="view.formCadPlanoUso.php?paciente_id=<?php echo $valor->getId(); ?>" class="btn btn-success btn-sm">
                            Adicionar Plano Uso
                        </a>
                        </td>
                        <td>
                        <a href="view.formListaAdministracao.php?paciente_id=<?php echo $valor->getId(); ?>" class="btn btn-secondary btn-sm">
                            Ver Administração
                        </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Selecionar paciente para ver planos -->
    <form method="GET" action="view.formlistaPlanoUso.php" class="mt-4 text-center">
        <label for="id_paciente" class="form-label mb-2">Selecione o paciente para ver os planos de uso:</label>
        <select id="id_paciente" name="paciente_id" class="form-select d-inline-block w-auto me-2" required>
            <option value="" disabled selected>Escolha um paciente</option>
            <?php foreach ($lista_de_cad as $valor) { ?>
                <option value="<?php echo $valor->getId(); ?>">
                    <?php echo $valor->getNome() . " (ID: " . $valor->getId() . ")"; ?>
                </option>
            <?php } ?>
        </select>
        <button type="submit" class="btn btn-info">Ver todos os planos</button>
    </form>
</div>

<?php
include_once('view.rodape.php');
?>
