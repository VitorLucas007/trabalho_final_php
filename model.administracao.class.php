<?php
include_once('model.persistirBD.class.php');

class administracao {
    
    private $id_administracao;
    private $paciente_id;
    private $medicamento_id;
    private $dataa;
    private $hora;
    private $dose_administrada;
    private $observacoes;

    function __construct($paciente_id, $medicamento_id, $dataa, $hora, $dose_administrada, $observacoes) {
        $this->paciente_id = $paciente_id;
        $this->medicamento_id = $medicamento_id;
        $this->dataa = $dataa;
        $this->hora = $hora;
        $this->dose_administrada = $dose_administrada;
        $this->observacoes = $observacoes;
    }

    function persistirAdministracao() {
        $bd = new persistirBD("127.0.0.1", "root", "", "bd_medicamentos");
        $bd->conectar();
        $sql = "INSERT INTO administracao (paciente_id, medicamento_id, dataa, hora, dose_administrada, observacoes)
                VALUES ('".$this->paciente_id."', '".$this->medicamento_id."', '".$this->dataa."', '".$this->hora."', '".$this->dose_administrada."', '".$this->observacoes."')";
        $bd->persistir($sql);
        $bd->desconectar();
    }

    function excluirAdministracao($id) {
        $bd = new persistirBD("127.0.0.1", "root", "", "bd_medicamentos");
        $bd->conectar();
        $sql = "DELETE FROM administracao WHERE id_administracao = ".$id;
        $bd->persistir($sql);
        $bd->desconectar();
    }

    function modificarAdministracao() {
        $bd = new persistirBD("127.0.0.1", "root", "", "bd_medicamentos");
        $bd->conectar();
        $sql = "UPDATE administracao SET
                    paciente_id = '".$this->paciente_id."',
                    medicamento_id = '".$this->medicamento_id."',
                    dataa = '".$this->dataa."',
                    hora = '".$this->hora."',
                    dose_administrada = '".$this->dose_administrada."',
                    observacoes = '".$this->observacoes."'
                WHERE id_administracao = '".$this->id_administracao."'";
        $bd->persistir($sql);
        $bd->desconectar();
    }

    function buscarAdministracao($id) {
        $bd = new persistirBD("127.0.0.1", "root", "", "bd_medicamentos");
        $bd->conectar();
        $sql = "SELECT * FROM administracao WHERE id_administracao = ".$id;
        $bd->persistir($sql);
        $resultado = $bd->retornoConsultas();
        $bd->desconectar();

        foreach ($resultado as $linha) {
            $this->id_administracao = $linha[0];
            $this->paciente_id = $linha[1];
            $this->medicamento_id = $linha[2];
            $this->dataa = $linha[3];
            $this->hora = $linha[4];
            $this->dose_administrada = $linha[5];
            $this->observacoes = $linha[6];
        }
    }

    function setIdAdministracao($id) {
        $this->id_administracao = $id; 
    }
    function getIdAdministracao() { 
        return $this->id_administracao; 
    }
    function getPacienteId() { 
        return $this->paciente_id;
    }
    function getMedicamentoId() { 
        return $this->medicamento_id; 
    }
    function getDataa() { 
        return $this->dataa; 
    }
    function getHora() { 
        return $this->hora; 
    }
    function getDoseAdministrada() { 
        return $this->dose_administrada; 
    }
    function getObservacoes() { 
        return $this->observacoes; 
    }
}
?>
