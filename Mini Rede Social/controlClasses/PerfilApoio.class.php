<?php

require_once __DIR__ . '../../classes/Perfil.class.php';

class PerfApoio{
    private $conexao;
    private $perfil;

    public function __construct($baseDados) {
        $this->conexao = $baseDados;
        $this->perfil = new Perfil();
    }

    public function checarPerfil($Id) {
        $sqlPro = "SELECT * FROM profissional WHERE idPerfPfk ='".$Id."'";
        $resultPro = $this->conexao->query($sqlPro);

        $sqlPes = "SELECT * FROM pessoal WHERE idPerfPfk ='".$Id."'";
        $resultPes = $this->conexao->query($sqlPes);

        if($resultPro->num_rows >0){
            return "prof";
        }
        if($resultPes->num_rows >0){
            return "pess";
        }
        
    }

    public function retornaUsername($id){
        $sql = "SELECT * FROM perfil WHERE idPerf='".$id."'";
        $result = $this->conexao->query($sql);

        $row = $result->fetch_assoc();
        $userName = $row["userName"];

        if($result){
            return $userName; 
        } else{
            return null;
        }
    }

    public function buscaAutorPostagem($idPost){
        $sql = "SELECT * FROM postagem WHERE id_postagem='".$idPost."'";
        $result = $this->conexao->query($sql);

        $row = $result->fetch_assoc();
        $idPerfil = $row["idPerfFk"];

        if($result){
            return $idPerfil; 
        } else{
            return null;
        }
    }
}
?>