<?php
include '../../funcoes/site.funcoes.php';

$idPerf = @$_SESSION["idPerf"];
$tipo = @$_POST["tipo"];
$usuario = @$_SESSION["username"];
$senha = @$_POST["senha"];
$nome = @$_POST["nome"];
$data = @$_POST["data"];
$desc = @$_POST["desc"];

    if($tipo === "pessoal"){
        $perfil = new Pessoal($usuario,$senha,$nome,$data,$desc);
        $perfil->setId($idPerf);
        atualizaPessoa($perfil,$tipo);
    }
    if($tipo === "profissional"){
        $perfil = new Profissional($usuario,$senha,$nome,$data,$desc);
        $perfil->setId($idPerf);
        atualizaPessoa($perfil,$tipo);
    }
    header ('location: ../../selfPerfil.php');
?>