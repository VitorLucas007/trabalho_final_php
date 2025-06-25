<?php
include_once('model.persistirBD.class.php');
include_once('model.administracao.class.php');

class administracaoColecao {
    public $colecao;
    public $paciente_id;

    function __construct($paciente_id) {
        $this->paciente_id = $paciente_id;
        $this->persistirAdministracoes();
    }

    function persistirAdministracoes() {
        $BDAdm = new persistirBD("127.0.0.1", "root", "", "bd_medicamentos");
        $BDAdm->conectar();

        $BDAdm->persistir("
            SELECT id_administracao, paciente_id, medicamento_id, dataa, hora, dose_administrada, observacoes
            FROM administracao
            WHERE paciente_id = $this->paciente_id
            ORDER BY dataa DESC, hora DESC
        ");

        $this->colecao = $BDAdm->retornoConsultas();
        $BDAdm->desconectar();
    }

    function retornaColecao() {
        $colecao_aux = [];
        foreach ($this->colecao as $valor) {
            $adm = new administracao(
                $valor[1], 
                $valor[2], 
                $valor[3],
                $valor[4], 
                $valor[5],
                $valor[6]
 
            );
            $adm->setIdAdministracao($valor[0]); 
            $colecao_aux[] = $adm;
        }
        return $colecao_aux;
    }
}
?>
