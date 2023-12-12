<?php

include '../../funcoes/site.funcoes.php';

$conteudo = @$_POST["conteudo"];
$idPostagem = @$_GET["idP"];

editarPostagem($conteudo,$idPostagem);
header('location: ../../selfPerfil.php');

?>