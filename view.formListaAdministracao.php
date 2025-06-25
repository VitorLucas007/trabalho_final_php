<?php
include_once('view.cabecalho.php');
include_once('model.administracaoColecao.class.php');

$paciente_id = isset($_GET['paciente_id']) ? intval($_GET['paciente_id']) : 0;

$colecao = new administracaoColecao($paciente_id);
$lista = $colecao->retornaColecao();
?>

<div class="container mt-4">
    <h3 class="text-center mb-4">Administrações do Paciente ID: <?php echo $paciente_id; ?></h3>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-primary text-center">
                <tr>
                    <th>ID</th>
                    <th>Medicamento</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Dose</th>
                    <th>Observações</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($lista)) {
                    foreach ($lista as $adm) { ?>
                        <tr>
                            <td><?php echo $adm->getIdAdministracao(); ?></td>
                            <td><?php echo $adm->getMedicamentoId(); ?></td>
                            <td><?php echo $adm->getDataa(); ?></td>
                            <td><?php echo $adm->getHora(); ?></td>
                            <td><?php echo $adm->getDoseAdministrada(); ?></td>
                            <td><?php echo $adm->getObservacoes(); ?></td>
                            <td>
                                <a href="view.formAltAdministracao.php?id_administracao=<?php echo $adm->getIdAdministracao(); ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="controller.delAdministracao.php?id_administracao=<?php echo $adm->getIdAdministracao(); ?>" onclick="return confirm('Confirma exclusão?');" class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr>
                <?php }
                } else {
                    echo "<tr><td colspan='8' class='text-center'>Nenhuma administração encontrada para este paciente.</td></tr>";
                } ?>
            </tbody>
        </table>
    </div>

    <div class="text-center mt-3">
        <a href="view.formCadAdministracao.php?paciente_id=<?php echo $paciente_id; ?>" class="btn btn-success">Nova Administração</a>
    </div>
</div>

<?php include_once('view.rodape.php'); ?>
