<?php
include '../../funcoes/site.funcoes.php';
//include '../sair.php';

$idPerf = $_SESSION["idPerf"];
$tipo = checaPerfil($idPerf);

excluirPessoa($idPerf,$tipo);

header ('location: ../sair.php');
?>