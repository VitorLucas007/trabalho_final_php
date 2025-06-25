<?php
require('fpdf/fpdf.php');
include_once('model.persistirBD.class.php');

// Criar a classe do PDF
class PDF extends FPDF {
    function Header() {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, utf8_decode('Relatório de Pacientes e Planos de Uso'), 0, 1, 'C');
        $this->Ln(5);
    }
}

$bd = new persistirBD("127.0.0.1", "root", "", "bd_medicamentos");
$bd->conectar();

// Buscar todos os pacientes
$bd->persistir("SELECT id_paciente, nome FROM paciente");
$pacientes = $bd->retornoConsultas();

// Iniciar PDF
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

foreach ($pacientes as $pac) {
    $pacienteId = $pac[0];
    $pacienteNome = utf8_decode($pac[1]);  

    // Nome do paciente
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, "Paciente: $pacienteNome (ID: $pacienteId)", 0, 1);

    // Buscar planos de uso com observações desse paciente
    $bd->persistir("SELECT id_plano, observacoes FROM planouso WHERE paciente_id = $pacienteId");
    $planos = $bd->retornoConsultas();

    if (count($planos) > 0) {
        foreach ($planos as $plano) {
            $planoId = $plano[0];
            $observacoes = utf8_decode($plano[1]);  

            $pdf->SetFont('Arial', 'I', 11);
            $pdf->Cell(0, 8, "  Plano de Uso ID: $planoId", 0, 1);

            // Mostrar observações do plano, se existir
            if (!empty(trim($observacoes))) {
                $pdf->SetFont('Arial', '', 10);
                $pdf->MultiCell(0, 6, "    Observações: $observacoes");
            }

            // Buscar medicamentos desse plano
            $bd->persistir("
                SELECT m.nome, pum.quantidade, pum.posologia, pum.duracao_dias
                FROM planouso_medicamento AS pum
                JOIN medicamento AS m ON pum.medicamento_id = m.id_medicamento
                WHERE pum.plano_id = $planoId
            ");
            $medicamentos = $bd->retornoConsultas();

            if (count($medicamentos) > 0) {
                foreach ($medicamentos as $med) {
                    $nomeMedicamento = utf8_decode($med[0]);  
                    $quantidade = $med[1];
                    $posologia = utf8_decode($med[2]); 
                    $duracao = $med[3];

                    $pdf->SetFont('Arial', '', 10);
                    $pdf->Cell(0, 6, "    - Medicamento: $nomeMedicamento, Quantidade: $quantidade, Posologia: $posologia, Duração: $duracao dias", 0, 1);
                }
            } else {
                $pdf->Cell(0, 6, "    Nenhum medicamento cadastrado para este plano.", 0, 1);
            }
        }
    } else {
        $pdf->Cell(0, 6, "  Nenhum plano de uso encontrado para este paciente.", 0, 1);
    }

    $pdf->Ln(2);
}

$bd->desconectar();

// Saída do PDF
$pdf->Output();
?>
