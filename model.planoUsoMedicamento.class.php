    <?php
    #model.planousoMedicamento.class.php

    include_once('model.persistirBD.class.php');

    class planousoMedicamento {
        
        public $plano_id;
        public $medicamento_id;
        public $quantidade;
        public $posologia;
        public $duracao_dias;
        public $nome_medicamento;

        function __construct($plano_id = "", $medicamento_id = "", $quantidade = "", $posologia = "", $duracao_dias = "") {
            $this->plano_id = $plano_id;
            $this->medicamento_id = $medicamento_id;
            $this->quantidade = $quantidade;
            $this->posologia = $posologia;
            $this->duracao_dias = $duracao_dias;
        }

        function persistirPlanoUsoMedicamento() {
            $bd = new persistirBD("127.0.0.1", "root", "", "bd_medicamentos");
            $bd->conectar();
            $bd->persistir("INSERT INTO planouso_medicamento (plano_id, medicamento_id, quantidade, posologia, duracao_dias) 
                            VALUES ('".$this->plano_id."', '".$this->medicamento_id."', '".$this->quantidade."', '".$this->posologia."', '".$this->duracao_dias."')");
            $bd->desconectar();
        }

        function modificarPlanoUsoMedicamento() {
            $bd = new persistirBD("127.0.0.1", "root", "", "bd_medicamentos");
            $bd->conectar();
            $bd->persistir("UPDATE planouso_medicamento SET quantidade='".$this->quantidade."', posologia='".$this->posologia."', duracao_dias='".$this->duracao_dias."' 
                            WHERE plano_id=".$this->plano_id." AND medicamento_id=".$this->medicamento_id);
            $bd->desconectar();
        }

        function excluirPlanoUsoMedicamento($plano_id, $medicamento_id) {
            $bd = new persistirBD("127.0.0.1", "root", "", "bd_medicamentos");
            $bd->conectar();
            $bd->persistir("DELETE FROM planouso_medicamento WHERE plano_id=".$plano_id." AND medicamento_id=".$medicamento_id);
            $bd->desconectar();
        }

        function buscar($plano_id, $medicamento_id) {
            $bd = new persistirBD("127.0.0.1", "root", "", "bd_medicamentos");
            $bd->conectar();
            $bd->persistir("SELECT * FROM planouso_medicamento WHERE plano_id=".$plano_id." AND medicamento_id=".$medicamento_id);
            $res = $bd->retornoConsultas();
            $bd->desconectar();

            foreach ($res as $aux) {
                $this->plano_id = $aux[0];
                $this->medicamento_id = $aux[1];
                $this->quantidade = $aux[2];
                $this->posologia = $aux[3];
                $this->duracao_dias = $aux[4];
            }
        }

        // Métodos Getters
        function getPlanoId() {
            return $this->plano_id;
        }

        function getMedicamentoId() {
            return $this->medicamento_id;
        }

        function getQuantidade() {
            return $this->quantidade;
        }

        function getPosologia() {
            return $this->posologia;
        }

        function getDuracaoDias() {
            return $this->duracao_dias;
        }

        function setNomeMedicamento($nome) {
        $this->nome_medicamento = $nome;
        }

        function getNomeMedicamento() {
        return $this->nome_medicamento;
        }


        // Métodos Setters (se quiser usar)
        function setQuantidade($q) {
            $this->quantidade = $q;
        }

        function setPosologia($p) {
            $this->posologia = $p;
        }

        function setDuracaoDias($d) {
            $this->duracao_dias = $d;
        }
    }
    ?>
