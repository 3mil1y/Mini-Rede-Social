<?php

include __DIR__ . '../../classes/Pessoal.class.php';

class PerfPessControl{
    private $conexao;
    private $perfilPessoal;

    public function __construct($baseDados) {
        $this->conexao = $baseDados;
        $this->perfilPessoal = new Pessoal;
    }

    public function listar() {
        $sql = "SELECT * FROM pessoal";
        $result = $this->conexao->query($sql);

        $perfis = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $perfilPessoal = $this->buscarPorId($row["idPerfPfk"]);

                if ($perfilPessoal !== null) {
                    $perfis[] = $perfilPessoal;
                }
            }
        }

        return $perfis;
    }


    public function atualizar($obj) {        

        $sql = "UPDATE perfil SET userName='".$obj->getUserName()."', senha='".$obj->getSenha()."' WHERE idPerf='".$obj->getId()."'";
        $result = $this->conexao->query($sql);

        $sqlPes = "UPDATE pessoal SET nome='".$obj->getNome()."', aniversario='".$obj->getAniversario()."',descricao='".$obj->getDescricao()."' WHERE idPerfPfk='".$obj->getId()."'";
        $resultPes = $this->conexao->query($sqlPes);

        if ($result && $resultPes) {
            return true;
        } else {
            return false;
        }
    }

    public function deletar($id) {        
        $sqlPro = "DELETE FROM pessoal WHERE idPerfPfk='".$id."'";
        $sql = "DELETE FROM perfil WHERE idPerf='".$id."'";

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

        $sql2 = "INSERT INTO pessoal (idPerfPfk, nome, aniversario, descricao)
        VALUES('".$id."', '".$obj->getNome()."', '".$obj->getAniversario()."', '".$obj->getDescricao()."')";
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

        $sql2 = "SELECT * FROM pessoal WHERE idPerfPfk = $id";
        $result2 = $this->conexao->query($sql2);

        if ($result2->num_rows > 0) {

            $row = $result->fetch_assoc();
            $row2 = $result2->fetch_assoc();

            $perfil = new Pessoal($row["userName"], $row["senha"], $row2["nome"], $row2["aniversario"], $row2["descricao"]);

            $perfil->setId($row["idPerf"]);

            return $perfil;
        } else {
            return null;
        }
    }
}

?>