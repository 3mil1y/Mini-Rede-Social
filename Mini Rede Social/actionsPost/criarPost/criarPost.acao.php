<?php

include '../../funcoes/site.funcoes.php';

$conteudo = @$_POST["conteudo"];
$idAutor = $_SESSION["idPerf"];
$postagem = new Postagem($conteudo);

criaPost($postagem,$idAutor);
header('location: ../../selfPerfil.php');

?>