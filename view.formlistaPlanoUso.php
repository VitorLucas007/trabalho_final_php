<?php
include_once('view.cabecalho.php');
include_once('model.planoUsoColecao.class.php');
include_once('model.paciente.class.php'); 

$paciente_id = isset($_GET['paciente_id']) ? intval($_GET['paciente_id']) : 0;

$paciente = new paciente("", "", "", "");
$paciente->buscarPaciente($paciente_id);
$nome_paciente = $paciente->getNome();

$pegar_planos = new planoUsoColecao($paciente_id);
$lista_de_planos = $pegar_planos->retornaColecao();
?>

<div class="container mt-4">

    <h3 class="text-center mb-4">
        Planos de Uso
    </h3>

    <?php if (empty($lista_de_planos)) { ?>
        <div class="text-center">
            <a href="view.formCadPlanoUso.php?paciente_id=<?php echo $paciente_id; ?>" class="btn btn-success">
                Cadastrar Novo Plano
            </a>
            <a href="view.formlistaPaciente.php" class="btn btn-secondary">Voltar</a>
        </div>
    <?php } else { ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>ID Plano</th>
                        <th>ID Paciente</th>
                        <th>Data Criação</th>
                        <th>Observações</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_de_planos as $plano) { 
                        $id_plano = $plano->getIdPlano(); ?>
                        <tr>
                            <td><?php echo $id_plano; ?></td>
                            <td><?php echo $plano->getPacienteId(); ?></td>
                            <td><?php echo $plano->getDataCriacao(); ?></td>
                            <td><?php echo $plano->getObservacoes(); ?></td>
                            <td>
    <a href="view.formAltPlanoUso.php?id_plano=<?php echo $id_plano; ?>&paciente_id=<?php echo $paciente_id; ?>" class="btn btn-warning btn-sm me-1">
        Atualizar
    </a>
    <a href="controller.delPlanoUso.php?id_plano=<?php echo $id_plano; ?>&paciente_id=<?php echo $paciente_id; ?>" 
       onclick="return confirm('Tem certeza que deseja excluir este plano?');" 
       class="btn btn-danger btn-sm">
        Excluir
    </a>
    <a href="view.listarPlanoUsoMedicamento.php?plano_id=<?php echo $id_plano; ?>" class="btn btn-info btn-sm">
        Ver Medicamentos
    </a>
</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="text-center mt-3">
            <a href="view.formCadPlanoUso.php?paciente_id=<?php echo $paciente_id; ?>" class="btn btn-success">
                Cadastrar Novo Plano
            </a>
        </div>
    <?php } ?>

</div>

<?php
include_once('view.rodape.php');
?>
