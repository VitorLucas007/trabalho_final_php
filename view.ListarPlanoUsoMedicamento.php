<?php
#view.listarPlanoUsoMedicamento.php

include_once('view.cabecalho.php');
include_once('model.planoUsoMedicamentoColecao.class.php');

$plano_id = isset($_GET['plano_id']) ? intval($_GET['plano_id']) : 0;

echo "<div class='container mt-4'>";

if ($plano_id > 0) {
    $pegar_cad = new planoUsoMedicamentoColecao($plano_id);
    $lista_de_cad = $pegar_cad->retornaColecao();

    echo "<h3 class='text-center mb-4'>Medicamentos do Plano ID: $plano_id</h3>";

    echo "<table class='table table-bordered table-striped'>";
    echo "<thead class='table-primary'>
            <tr>
                <th>Plano ID</th>
                <th>Medicamento ID</th>
                <th>Nome do Medicamento</th>
                <th>Quantidade</th>
                <th>Posologia</th>
                <th>Duração (dias)</th>
                <th>Ações</th>
            </tr>
          </thead>";
    echo "<tbody>";

    if (!empty($lista_de_cad)) {
        foreach ($lista_de_cad as $valor) {
            echo "<tr>
                    <td>".$valor->getPlanoId()."</td>
                    <td>".$valor->getMedicamentoId()."</td>
                    <td>".$valor->getNomeMedicamento()."</td>
                    <td>".$valor->getQuantidade()."</td>
                    <td>".$valor->getPosologia()."</td>
                    <td>".$valor->getDuracaoDias()."</td>
                    <td>
                        <a href='view.formAltPlanoUsoMedicamento.php?plano_id=".$valor->getPlanoId()."&medicamento_id=".$valor->getMedicamentoId()."' class='btn btn-warning btn-sm me-1'>Editar</a>

                        <a href='controller.delPlanoUsoMedicamento.php?plano_id=".$valor->getPlanoId()."&medicamento_id=".$valor->getMedicamentoId()."' 
                           onclick=\"return confirm('Tem certeza que deseja excluir este medicamento do plano?');\" 
                           class='btn btn-danger btn-sm'>Excluir</a>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='7' class='text-center'>Nenhum medicamento encontrado para este plano</td></tr>";
    }

    echo "</tbody>";
    echo "</table>";
}

echo "</div>";

// Botões "Adicionar Medicamentos" e "Voltar"
echo "<div class='text-center mt-3'>";
echo "<a href='view.formCadPlanoUsoMedicamento.php?id_plano=$plano_id' class='btn btn-success me-2'>Adicionar Medicamentos</a>";
echo "<a href='view.formlistaPlanoUso.php?paciente_id=" . (isset($_GET['paciente_id']) ? intval($_GET['paciente_id']) : '') . "' class='btn btn-secondary'>Voltar</a>";
echo "</div>";

include_once('view.rodape.php');
?>
