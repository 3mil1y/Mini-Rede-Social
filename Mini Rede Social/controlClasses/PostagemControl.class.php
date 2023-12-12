<?php

include __DIR__ . '../../classes/Postagem.class.php';
require_once __DIR__ . '../../classes/Perfil.class.php';

class PostControl{
    private $conexao;
    private $postagem;   

    public function __construct($baseDados) {
        $this->conexao = $baseDados;
        $this->postagem = new Postagem();
    }

    public function listar() {
        $sql = "SELECT * FROM postagem";
        $result = $this->conexao->query($sql);

        $postagens = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $postagens[] = $this->buscarPorId($row["id_postagem"]);
            }
        }

        return $postagens;
    }

    public function listarPorUsuario($idPerf){
        $sql = "SELECT * FROM postagem WHERE idPerfFk = '$idPerf'";
        $result = $this->conexao->query($sql);

        $postagens = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $postagens[] = $this->buscarPorId($row["id_postagem"]);
            }
        }

        return $postagens;
    }

    public function atualizar($conteudo,$id) {        

        $sql = "UPDATE postagem SET conteudo='".$conteudo."' WHERE id_postagem='".$id."'";
        
        $result = $this->conexao->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function atualizarCurtidas($postagem){
        $sql = "UPDATE postagem SET curtidas='".$postagem->getCurtidas()."' WHERE id_postagem='".$postagem->getId()."'";
        
        $result = $this->conexao->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function deletar($id) {        
        $sql = "DELETE FROM postagem WHERE id_postagem='".$id."'";
        $sql_coment = "DELETE FROM comentariosPostagem WHERE id_postagem ='".$id."'";

        $result = $this->conexao->query($sql);
        $result_coment = $this->conexao->query($sql_coment);

        if ($result && $result_coment) {
            return true;
        } else {
            return false;
        }

    }

    public function deletarPorUsuario($id) {
        $sql = "SELECT id_postagem FROM postagem WHERE idPerfFk='".$id."'";

        $result = $this->conexao->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
               $this->deletar($row["id_postagem"]);
            }
        }
    }

    public function delComentario($id, $comentario){
        $sql = "DELETE FROM comentariospostagem WHERE id_postagem ='".$id."' AND textoComentario = '".$comentario."'";
        $result = $this->conexao->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function cadastrar($obj,$idPerf) {        
        $sql = "INSERT INTO postagem (conteudo, curtidas,idPerfFk)
        VALUES ('".$obj->getConteudo()."', '".$obj->getCurtidas()."', '".$idPerf."')";

        $result = $this->conexao->query($sql);

        $id = $this->conexao->getId();
        $comentarios = $obj->getComentarios();
        $this->cadastrarComentarios($id,$comentarios);

        if ($result) {
            $obj->setId($id);
            return true;
        } else {
            return false;
        }

    }

    public function cadastrarComentarios($id,$comentarios){

        for($i=0;$i<count($comentarios);$i++){
            $sqlF = "INSERT INTO comentariospostagem (id_postagem, textoComentario)
            VALUES ('".$id."', '".$comentarios[$i]."')";

            $resultF = $this->conexao->query($sqlF);
        }
    }

    public function getAutor($idPostagem){
        $sql = "SELECT idPerfFk FROM postagem WHERE id_postagem = $idPostagem";
        $result = $this->conexao->query($sql);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['idPerfFk'];
        } else {
            return false;
        }
    }

    public function buscarPorId($id){
        $sql = "SELECT * FROM postagem WHERE id_postagem = $id";
        $result = $this->conexao->query($sql);

        $sql_coment = "SELECT * FROM comentariosPostagem WHERE id_postagem = $id"; 
        $result_coment = $this->conexao->query($sql_coment);

        if ($result != false && $result->num_rows > 0) {

            $row = $result->fetch_assoc();

            $post = new Postagem($row["conteudo"], $row["curtidas"]);

            if ($result_coment->num_rows > 0) {
                while ($row_coment = $result_coment->fetch_assoc()) {
                    $post->addComentario($row_coment["textoComentario"]);
                }
            }

            $post->setID($row["id_postagem"]);

            return $post;
        } else {
            return null;
        }
    }
}

?>