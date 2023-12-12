<?php
require_once 'Perfil.class.php';

class Pessoal extends Perfil {
    private $nome;
    private $aniversario;
    private $descricao;

    // Construtor
    public function __construct($userName = "", $senha = "", $nome = "", $aniversario = "", $descricao = "") {
        parent::__construct($userName, $senha);
        $this->nome = $nome;
        $this->aniversario = $aniversario;
        $this->descricao = $descricao;
    }

    // Getters
    public function getNome() {
        return $this->nome;
    }

    public function getAniversario() {
        return $this->aniversario;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    // Setters
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setAniversario($aniversario) {
        $this->aniversario = $aniversario;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function toString() {
        return "<strong>Perfil Pessoal:</strong><br>" .
               parent::toString() . 
               "Nome: " . $this->nome . ";<br>" .
               "Aniversário: " . $this->aniversario . ";<br>" .
               "Descrição: " . $this->descricao . ";<br>";
    }
}
?>