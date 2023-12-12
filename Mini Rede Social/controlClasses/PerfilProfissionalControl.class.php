<?php

include __DIR__ . '../../classes/Profissonal.class.php';

class PerfProfControl{
    private $conexao;
    private $perfilProfissional;

    public function __construct($baseDados) {
        $this->conexao = $baseDados;
        $this->perfilProfissional = new Profissional;
    }

    public function listar() {
        $sql = "SELECT * FROM profissional";
        $result = $this->conexao->query($sql);

        $perfis = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $perfis[] = $this->buscarPorId($row["idPerfPfk"]);
            }
        }

        return $perfis;
    }


    public function atualizar($obj) {        

        $sql = "UPDATE perfil SET userName='".$obj->getUserName()."', senha='".$obj->getSenha()."' WHERE idPerfPfk='".$obj->getId()."'";
        $result = $this->conexao->query($sql);

        $sqlPro = "UPDATE profissional SET nomeFantasia='".$obj->getNomeFantasia()."', dataCriacao='".$obj->getDataCriacao()."', contato='".$obj->getContato()."' WHERE idPerfPfk='".$obj->getId()."'";
        $resultPro = $this->conexao->query($sqlPro);

        if ($result && $resultPro) {
            return true;
        } else {
            return false;
        }

    }

    public function deletar($id) {        
        $sql = "DELETE FROM perfil WHERE idPerf=".$id;
        $sqlPro = "DELETE FROM profissional WHERE idPerfPfk ='".$id."'";

        $resultPro = $this->conexao->query($sqlPro);
        $result = $this->conexao->query($sql);

        if ($result && $resultPro) {
            return true;
        } else {
            return false;
        }
    }

    public function cadastrar($obj) {        
        $sql = "INSERT INTO perfil (userName, senha)
        VALUES ('".$obj->getUserName()."', '".$obj->getSenha()."')";
        $result = $this->conexao->query($sql);

        $id = $this->conexao->getId();

        $sql2 = "INSERT INTO profissional (idPerfPfk, nomeFantasia, dataCriacao, contato)
        VALUES('".$id."', '".$obj->getNomeFantasia()."', '".$obj->getDataCriacao()."', '".$obj->getContato()."')";
        $result2 = $this->conexao->query($sql2);

        if ($result && $result2) {
            return true;
        } else {
            return false;
        }
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM perfil WHERE idPerf = $id";
        $result = $this->conexao->query($sql);

        $sql2 = "SELECT * FROM profissional WHERE idPerfPfk = $id";
        $result2 = $this->conexao->query($sql2);

        if ($result2->num_rows > 0) {

            $row = $result->fetch_assoc();
            $row2 = $result2->fetch_assoc();

            $perfil = new Profissional($row["userName"], $row["senha"], $row2["nomeFantasia"], $row2["dataCriacao"], $row2["contato"]);

            $perfil->setId($row["idPerf"]);

            return $perfil;
        } else {
            return null;
        }
    }
}

?>