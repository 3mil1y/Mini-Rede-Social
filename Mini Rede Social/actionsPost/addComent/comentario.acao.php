<?php
include '../../funcoes/site.funcoes.php';

$id = @$_GET["idP"];
$texto = @$_POST["texto"];
$usuario = @$_POST["username"];
$txtUser = $usuario . "-->" . $texto;
addComentario($txtUser,$id);

header ('location: ../../selfPerfil.php')
?>