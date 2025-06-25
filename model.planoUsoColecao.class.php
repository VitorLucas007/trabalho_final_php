<?php
#model.planoUsoColecao.class.php

include_once('model.persistirBD.class.php');
include_once('model.planoUso.class.php');

class planoUsoColecao {
    public $colecao;
    public $paciente_id;

    function __construct($paciente_id) {
        $this->paciente_id = $paciente_id;
        $this->persistirPlanos();
    }

    function persistirPlanos() {
        $BDplano = new persistirBD("127.0.0.1", "root", "", "bd_medicamentos");
        $BDplano->conectar();
        $BDplano->persistir("SELECT * FROM planouso WHERE paciente_id = " . intval($this->paciente_id) . " ORDER BY data_criacao DESC");
        $this->colecao = $BDplano->retornoConsultas();
        $BDplano->desconectar();
    }

    function retornaColecao() {
        $aux = $this->colecao;
        $colecao_aux = array();

        foreach ($aux as $valor) {
            $plano = new planoUso($valor[1], $valor[2], $valor[3]);  // paciente_id, data_criacao, observacoes
            $plano->setIdPlano($valor[0]); // id_plano
            $colecao_aux[] = $plano;
        }

        return $colecao_aux;
    }
}
?>
