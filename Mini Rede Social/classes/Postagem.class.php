<?php

class Postagem {
    private $idPost;
    private $conteudo;
    private $curtidas;
    private $comentarios;

    // Construtor
    public function __construct($conteudo = "", $curtidas = 0) {
        $this->conteudo = $conteudo;
        $this->curtidas = $curtidas;
        $this->comentarios = [];
    }

    // Getters
    public function getId(){
        return $this->idPost;
    }

    public function getConteudo() {
        return $this->conteudo;
    }

    public function getCurtidas() {
        return $this->curtidas;
    }

    public function getComentarios() {
        return $this->comentarios;
    }

    // Setters
    public function setConteudo($texto) {
        $this->conteudo = $texto;
    }

    public function setCurtidas($curtidas) {
        $this->curtidas = $curtidas;
    }

    public function setID($id){
        $this->idPost = $id;
    }

    // Funções de adição
    public function addCurtida() {
        $this->curtidas++;
    }

    public function rmCurtida(){
        $this->curtidas--;
    }

    public function addComentario($comentario) {
        $this->comentarios[] = $comentario;
    }

    public function numComentarios(){
        return count($this->comentarios);
    }

    public function toString() {
        return "Texto da Postagem: " . $this->conteudo . ";<br>" .
               "Número de Curtidas: " . $this->curtidas . ";<br>" .
               "Comentários: <br>" . implode("<br>", $this->comentarios);
    }
}

?>