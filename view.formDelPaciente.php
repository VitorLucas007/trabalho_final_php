<?php
include_once('view.cabecalho.php');
include_once('model.pacienteColecao.class.php');

$paciente_cad = new pacienteColecao();
$lista_de_cad = $paciente_cad->retornaColecao();
?>

<div class="container">
    <h3 class="text-center mb-4">Excluir Pacientes</h3>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-danger">
                <tr>
                    <th>Cod</th>
                    <th>Nome</th>
                    <th>Data Nascimento</th>
                    <th>Sexo</th>
                    <th>Email</th>
                    <th>Ação</th>
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
                            <a href="controller.delPaciente.php?id_paciente=<?php echo $valor->getId(); ?>" 
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Tem certeza que deseja excluir o paciente <?php echo $valor->getNome(); ?>?')">
                                Excluir
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include_once("view.rodape.php");
?>
