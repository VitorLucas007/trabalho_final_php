<?php
#model.planoUso.class.php

include_once('model.persistirBD.class.php');

class planoUso {

    public $id_plano;
    public $paciente_id;
    public $data_criacao;
    public $observacoes;

    function modificarPlano() {
        $cad = new persistirBD("127.0.0.1", "root", "", "bd_medicamentos");
        $cad->conectar();
        $cad->persistir("UPDATE planouso SET paciente_id='" . $this->paciente_id . "', data_criacao='" . $this->data_criacao . "', observacoes='" . $this->observacoes . "' WHERE id_plano=" . $this->id_plano);
        $cad->desconectar();
    }

    function persistirConsulta($vid) {
        $cad = new persistirBD("127.0.0.1", "root", "", "bd_medicamentos");
        $cad->conectar();
        $cad->persistir("SELECT * FROM planouso WHERE id_plano=" . $vid);
        $rel = $cad->retornoConsultas();
        $cad->desconectar();
        return $rel;
    }

    function buscarPlano($id) {
        $valorCad = $this->persistirConsulta($id);
        foreach ($valorCad as $aux) {
            $this->setIdPlano($aux[0]);
            $this->setPacienteId($aux[1]);
            $this->setDataCriacao($aux[2]);
            $this->setObservacoes($aux[3]);
        }
    }

    function __construct($vpac, $vdata, $vobs) {
        $this->paciente_id = $vpac;
        $this->data_criacao = $vdata;
        $this->observacoes = $vobs;
    }

    function setIdPlano($idp) {
        $this->id_plano = $idp;
    }
    function getIdPlano() {
        return $this->id_plano;
    }

    function setPacienteId($pid) {
        $this->paciente_id = $pid;
    }
    function getPacienteId() {
        return $this->paciente_id;
    }

    function setDataCriacao($dt) {
        $this->data_criacao = $dt;
    }
    function getDataCriacao() {
        return $this->data_criacao;
    }

    function setObservacoes($obs) {
        $this->observacoes = $obs;
    }
    function getObservacoes() {
        return $this->observacoes;
    }

    function persistirPlano() {
        $bdplano = new persistirBD("127.0.0.1", "root", "", "bd_medicamentos");
        $bdplano->conectar();
        $bdplano->persistir("INSERT INTO planouso (paciente_id, data_criacao, observacoes) VALUES ('" . $this->paciente_id . "', '" . $this->data_criacao . "', '" . $this->observacoes . "')");
        $bdplano->desconectar();
    }

    function excluirPlano($vid) {
        $bdplano = new persistirBD("127.0.0.1", "root", "", "bd_medicamentos");
        $bdplano->conectar();
        // Deletar registros filhos na tabela planouso_medicamento
        $bdplano->persistir("DELETE FROM planouso_medicamento WHERE plano_id = " . $vid);
        // Agora pode deletar o plano
        $bdplano->persistir("DELETE FROM planouso WHERE id_plano = " . $vid);
        $bdplano->desconectar();
    }
}
?>
