<?php
include '../../funcoes/site.funcoes.php';

checaLogin();

$id = @$_GET["id"];
$txt = @$_GET["texto"];

deletaComentario($id,$txt);

header('location: ../../selfPerfil.php');
?>