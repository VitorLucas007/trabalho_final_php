<?php
#model.medicamento.class.php

include_once('model.persistirBD.class.php');

class medicamento {
    public $id_medicamento;
    public $nome;
    public $principio_ativo;
    public $forma_farmaceutica;
    public $dosagem;
    public $fabricante;
    public $tarja;
    public $uso;

    function __construct($nome, $principio, $forma, $dosagem, $fabricante, $tarja, $uso) {
        $this->nome = $nome;
        $this->principio_ativo = $principio;
        $this->forma_farmaceutica = $forma;
        $this->dosagem = $dosagem;
        $this->fabricante = $fabricante;
        $this->tarja = $tarja;
        $this->uso = $uso;
    }

    function setIdMedicamento($id) {
        $this->id_medicamento = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setPrincipioAtivo($principio) {
        $this->principio_ativo = $principio;
    }

    function setFormaFarmaceutica($forma) {
        $this->forma_farmaceutica = $forma;
    }

    function setDosagem($dosagem) {
        $this->dosagem = $dosagem;
    }

    function setFabricante($fabricante) {
        $this->fabricante = $fabricante;
    }

    function setTarja($tarja) {
        $this->tarja = $tarja;
    }

    function setUso($uso) {
        $this->uso = $uso;
    }

    function getIdMedicamento() {
        return $this->id_medicamento;
    }

    function getNome() {
        return $this->nome;
    }

    function getPrincipioAtivo() {
        return $this->principio_ativo;
    }

    function getFormaFarmaceutica() {
        return $this->forma_farmaceutica;
    }

    function getDosagem() {
        return $this->dosagem;
    }

    function getFabricante() {
        return $this->fabricante;
    }

    function getTarja() {
        return $this->tarja;
    }

    
    function getUso() {
        return $this->uso;
    }


    function persistirMedicamento() {
        $bd = new persistirBD("127.0.0.1", "root", "", "bd_medicamentos");
        $bd->conectar();
        $bd->persistir("INSERT INTO medicamento (nome, principio_ativo, forma_farmaceutica, dosagem, fabricante, tarja, uso) VALUES ('{$this->nome}', '{$this->principio_ativo}', '{$this->forma_farmaceutica}', '{$this->dosagem}', '{$this->fabricante}', '{$this->tarja}', '{$this->uso}')");
        $bd->desconectar();
    }

    function modificarMedicamento() {
        $bd = new persistirBD("127.0.0.1", "root", "", "bd_medicamentos");
        $bd->conectar();
        $bd->persistir("UPDATE medicamento SET 
                    nome='{$this->nome}', 
                    principio_ativo='{$this->principio_ativo}', 
                    forma_farmaceutica='{$this->forma_farmaceutica}', 
                    dosagem='{$this->dosagem}', 
                    fabricante='{$this->fabricante}', 
                    tarja='{$this->tarja}',
                    uso='{$this->uso}'
                WHERE id_medicamento={$this->id_medicamento}");
        $bd->desconectar();
    }

    function excluirMedicamento($id) {
        $bd = new persistirBD("127.0.0.1", "root", "", "bd_medicamentos");
        $bd->conectar();
        // Apagar dependências em planouso_medicamento
        $bd->persistir("DELETE FROM planouso_medicamento WHERE medicamento_id = $id");  
        // Deletar administrações relacionadas
        $bd->persistir("DELETE FROM administracao WHERE medicamento_id = " . $id);
         // Agora deletar o medicamento
        $bd->persistir("DELETE FROM medicamento WHERE id_medicamento=$id");
        $bd->desconectar();
    }

    function buscarMedicamento($id) {
        $bd = new persistirBD("127.0.0.1", "root", "", "bd_medicamentos");
        $bd->conectar();
        $bd->persistir("SELECT * FROM medicamento WHERE id_medicamento=$id");
        $res = $bd->retornoConsultas();
        $bd->desconectar();

        foreach ($res as $aux) {
            $this->setIdMedicamento($aux[0]);
            $this->setNome($aux[1]);
            $this->setPrincipioAtivo($aux[2]);
            $this->setFormaFarmaceutica($aux[3]);
            $this->setDosagem($aux[4]);
            $this->setFabricante($aux[5]);
            $this->setTarja($aux[6]);
            $this->setUso($aux[7]);
        }
    }
}
?>
