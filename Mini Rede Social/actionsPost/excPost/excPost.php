<?php
include '../../funcoes/site.funcoes.php';

checaLogin();

$id = @$_GET["id"];
deletaPostagem($id);

header ('location: ../../selfPerfil.php');
?>