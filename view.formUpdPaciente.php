<?php
include_once('view.cabecalho.php');
include_once('model.pacienteColecao.class.php');

$pegar_cad = new pacienteColecao();
$ret_cad = $pegar_cad->retornaColecao();
?>

<div class="container">
    <h3 class="text-center mb-4">Atualizar Pacientes</h3>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-warning">
                <tr>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>Sexo</th>
                    <th>Email</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ret_cad as $aux) { ?>
                    <tr>
                        <td><?php echo $aux->getNome(); ?></td>
                        <td><?php echo $aux->getDataNascimento(); ?></td>
                        <td><?php echo $aux->getSexo(); ?></td>
                        <td><?php echo $aux->getEmail(); ?></td>
                        <td>
                            <a href="view.formAltPaciente.php?id_paciente=<?php echo $aux->getId(); ?>" 
                               class="btn btn-sm btn-primary">
                               Alterar
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include_once('view.rodape.php');
?>
