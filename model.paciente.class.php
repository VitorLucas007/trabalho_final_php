<?php
#model.pessoa.class.php

include_once('model.persistirBD.class.php');

class paciente {
	
	public $id;
	public $nome;
	public $data_nascimento;
    public $sexo;
    public $email;
	

	function modificarPaciente(){
		$cad= new persistirBD("127.0.0.1", "root", "", "bd_medicamentos");
		$cad -> conectar();
		$cad -> persistir("UPDATE paciente SET nome='".$this->nome."', data_nascimento='".$this->data_nascimento."', sexo='".$this->sexo."', email='".$this->email."' WHERE id_paciente=".$this->id);
		$cad->desconectar();
	}
	
	function persistirConsulta($vid){
		$cad= new persistirBD("127.0.0.1", "root", "", "bd_medicamentos");
		$cad->conectar();
		$cad->persistir("SELECT * FROM paciente WHERE id_paciente=".$vid);

		$rel = $cad->retornoConsultas();
		$cad -> desconectar();
		return $rel;
	}

	function buscarPaciente($pio){
		$valorCad=$this->persistirConsulta($pio);
		foreach($valorCad as $aux){
			$this->setId($aux[0]);
			$this->setNome($aux[1]);
			$this->setDataNascimento($aux[2]);
			$this->setSexo($aux[3]);
			$this->setEmail($aux[4]);
		}
	}
	
	function __construct($vnm,$vdn,$vsx, $vem) {
			$this->nome = $vnm;
			$this->data_nascimento = $vdn;
			$this->sexo = $vsx;
			$this->email = $vem;
	}
	
	function setId($idf){
	    $this->id=$idf;
	}
	function getId(){
		return $this->id;
	}
	function setNome($vnm){
		$this->nome=$vnm;
	}
	function getNome(){
	return $this->nome;
	}
	function setDataNascimento($vdn){
	$this->data_nascimento=$vdn;
	}
	function getDataNascimento(){
		return $this->data_nascimento;
	}
	function setSexo($vsx){
	$this->sexo=$vsx;
	}
	function getSexo(){
		return $this->sexo;
	}
	function setEmail($vem){
	$this->email=$vem;
	}
	function getEmail(){
		return $this->email;
	}
	
	function buscaPaciente($nome){
		if($nome == $this->getNome()){
			return $this;
		}
		return null;
	}
	
	function persistirPaciente() {
		$bdpaciente = new persistirBD("127.0.0.1","root","","bd_medicamentos");
		$bdpaciente->conectar();
		$bdpaciente->persistir("INSERT INTO paciente (nome,data_nascimento, sexo, email) VALUES ('".$this->nome."','". $this->data_nascimento ."', '". $this->sexo ."', '". $this->email ."')");
		$bdpaciente->desconectar();
	}
	
	function excluirPaciente($vid) {
		$bdpaciente = new persistirBD("127.0.0.1","root","","bd_medicamentos");
		$bdpaciente->conectar();
		$bdpaciente->persistir("DELETE FROM paciente WHERE id_paciente = ".$vid);
		$bdpaciente->desconectar();
	}	
}

?>