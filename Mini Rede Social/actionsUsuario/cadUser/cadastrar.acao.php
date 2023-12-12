<?php
include '../../funcoes/site.funcoes.php';

$tipo = @$_POST["tipo"];
$usuario = @$_POST["username"];
$senha = @$_POST["senha"];
$nome = @$_POST["nome"];
$data = @$_POST["data"];
$desc = @$_POST["desc"];

$sql = "SELECT * FROM perfil WHERE userName = '$usuario'";
$result = $db->query($sql);

if($result->num_rows > 0){
    header('location: cadastrar.php?msg=userName existente');
}else{
    if($tipo === "pessoal"){
        $perfil = new Pessoal($usuario,$senha,$nome,$data,$desc);
        cadastraPessoa($perfil,$tipo);
    }
    if($tipo === "profissional"){
        $perfil = new Profissional($usuario,$senha,$nome,$data,$desc);
        cadastraPessoa($perfil,$tipo);
    }
    header('location: ../logar/site.login.php?msg=sucesso');
}
?>