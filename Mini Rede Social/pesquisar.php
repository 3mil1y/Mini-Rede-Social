<?php
include 'funcoes/filtro.php';

checaLogin();

$user = @$_POST["user"];
$usuarioLogado = $_SESSION["username"];

$usuarios = checaCorrespondencia($user);

echo criaHead('Perfil','<link rel="stylesheet" href="css/reset.css">
// <link rel="stylesheet" href="css/style.css">');
echo criaHeaderPrincipal(5,$usuarioLogado);
echo criaAutores($usuarios,2);
echo criaFooter('<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>');
?>