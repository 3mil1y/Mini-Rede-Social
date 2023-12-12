<?php
include __DIR__ . '../../funcoes/site.funcoes.php';

$id = @$_GET["id"];
addCurtida($id);

header ('location: ../postagemEstendida.php?id='.$id.'');
?>