<?php
#model.planoUsoMedicamentoColecao.class.php

include_once('model.persistirBD.class.php');
include_once('model.planousoMedicamento.class.php');
include_once('model.medicamento.class.php');

class planoUsoMedicamentoColecao {
    public $colecao;
    public $plano_id;

    function __construct($plano_id) {
        $this->plano_id = $plano_id;
        $this->persistirPlanoUsoMedicamentos();
    }

function persistirPlanoUsoMedicamentos() {
    if(empty($this->plano_id)) {
        echo "Erro: plano_id vazio!";
        return;
    }

    $bd = new persistirBD("127.0.0.1", "root", "", "bd_medicamentos");
    $bd->conectar();
    $bd->persistir("SELECT p.plano_id, p.medicamento_id, m.nome AS nome_medicamento, p.quantidade, p.posologia, p.duracao_dias
            FROM planouso_medicamento p
            JOIN medicamento m ON p.medicamento_id = m.id_medicamento
            WHERE p.plano_id = ".$this->plano_id);
    $this->colecao = $bd->retornoConsultas();
    $bd->desconectar();
}

    function retornaColecao() {
        $aux = $this->colecao;
        $colecao_aux = array();

        foreach ($aux as $valor) {
            $item = new planousoMedicamento(
                $valor[0],  
                $valor[1],  
                $valor[3],  
                $valor[4],
                $valor[5]
            );
            $item->setNomeMedicamento($valor[2]);
            $colecao_aux[] = $item;
        }

        return $colecao_aux;
    }
}
?>
