<?php
include 'funcoes/filtro.php';

checaLogin();

$postPesquisado = @$_POST["post"];
$usuarioLogado = $_SESSION["username"];

echo criaHead('Perfil','<link rel="stylesheet" href="css/reset.css">
// <link rel="stylesheet" href="css/style.css">');
echo criaHeaderPrincipal(5,$usuarioLogado);
echo buscaPostagensFiltro($postPesquisado);
echo criaFooter('<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>');
?>