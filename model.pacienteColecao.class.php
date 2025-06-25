<?php 
#model.pacienteColecao.class.php

include_once('model.persistirBD.class.php');
include_once('model.paciente.class.php');

class pacienteColecao{
    public $colecao;
    public $limitador;
    function __construct($limitador = ""){
        $this->limitador = $limitador;
        $this->persistirPacientes();
            }
    function persistirPacientes(){
        $BDpaciente = new persistirBD("127.0.0.1", "root","", "bd_medicamentos");
        $BDpaciente-> conectar();
        $BDpaciente-> persistir("SELECT * FROM paciente WHERE nome LIKE'%$this->limitador%'ORDER BY nome");
        $this->colecao=$BDpaciente->retornoConsultas();
        $BDpaciente->desconectar();
    }
    function retornaColecao(){
        $aux=$this->colecao;
        foreach($aux as $valor){
            $pacientes = new paciente("","","","");
            $pacientes->setId($valor[0]);
            $pacientes->setNome($valor[1]);
            $pacientes->setDataNascimento($valor[2]);
            $pacientes->setSexo($valor[3]);
            $pacientes->setEmail($valor[4]);
            $colecao_aux[] = $pacientes;
        }
        return $colecao_aux;
    }

}

?>
