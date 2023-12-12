<?php
require_once 'Perfil.class.php';

class Profissional extends Perfil {
    private $nomeFantasia;
    private $dataCriacao;
    private $contato;

    // Construtor
    public function __construct($userName = "", $senha = "", $nomeFantasia = "", $dataCriacao = "", $contato = "") {
        parent::__construct($userName, $senha);
        $this->nomeFantasia = $nomeFantasia;
        $this->dataCriacao = $dataCriacao;
        $this->contato = $contato;
    }

    // Getters
    public function getNomeFantasia() {
        return $this->nomeFantasia;
    }

    public function getDataCriacao() {
        return $this->dataCriacao;
    }

    public function getContato() {
        return $this->contato;
    }

    // Setters
    public function setNomeFantasia($nomeFantasia) {
        $this->nomeFantasia = $nomeFantasia;
    }

    public function setDataCriacao($dataCriacao) {
        $this->dataCriacao = $dataCriacao;
    }

    public function setContato($contato) {
        $this->contato = $contato;
    }

    public function toString() {
        return "<strong>Perfil Profissional:</strong><br>" .
               parent::toString().
               "Nome Fantasia: " . $this->nomeFantasia . ";<br>" .
               "Data de Criação: " . $this->dataCriacao . ";<br>" .
               "Contato: " . $this->contato . ";<br>";
    }
}