<?php

class Perfil {
    private $idPerf;
    private $userName;
    private $senha;
    private $postagens;

    // Construtor
    public function __construct($userName = "", $senha = "") {
        $this->userName = $userName;
        $this->senha = md5($senha);
        $this->postagens = [];
    }

    // Getters
    public function getUserName() {
        return $this->userName;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getId(){
        return $this->idPerf;
    }

    public function getPostagens() {
        return $this->postagens;
    }

    // Setters
    public function setUserName($userName) {
        $this->userName = $userName;
    }

    public function setSenha($senha) {
        $this->senha = md5($senha);
    }

    public function setId($id){
        $this->idPerf = $id;
    }

    public function addPostagem($novaPostagem){
        $this->postagens[] = $novaPostagem;
    }

    public function rmPostagem($idRemove) {
        foreach ($this->postagens as $posicao => $objeto) {
            if ($objeto->id == $idRemove) {
                unset($this->postagens[$posicao]);
                break;
            }
        }
    }

    public function toString() {
       // $postagensStr = implode(", ", $this->postagens);

        return "Nome de Usuário: " . $this->userName . ";<br>" .
               "Senha: " . $this->senha . ";<br>";
    }
    
}

?> 