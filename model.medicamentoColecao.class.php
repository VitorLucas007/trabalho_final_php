<?php
#model.medicamentoColecao.class.php

include_once('model.persistirBD.class.php');
include_once('model.medicamento.class.php');

class medicamentoColecao {
    public $colecao;
    public $limitador;

    function __construct($limitador) {
        $this->limitador = $limitador;
        $this->persistirMedicamentos();
    }

    function persistirMedicamentos() {
        $bd = new persistirBD("127.0.0.1", "root", "", "bd_medicamentos");
        $bd->conectar();
        $bd->persistir("SELECT * FROM medicamento WHERE nome LIKE'%$this->limitador%'ORDER BY nome");
        $this->colecao = $bd->retornoConsultas();
        $bd->desconectar();
    }

    function retornaColecao() {
        $aux = $this->colecao;
        $colecao_aux = array();

        foreach ($aux as $valor) {
            $med = new medicamento($valor[1], $valor[2], $valor[3], $valor[4], $valor[5], $valor[6], $valor[7]);
            $med->setIdMedicamento($valor[0]);
            $colecao_aux[] = $med;
        }

        return $colecao_aux;
    }
}
?>
