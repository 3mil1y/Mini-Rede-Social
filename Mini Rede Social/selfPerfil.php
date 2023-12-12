<?php
include 'funcoes/filtro.php';

$idPerf = checaLogin();
$usuario = @$_SESSION["username"];

$perfil = buscaPerfil($usuario);

echo criaHead('Perfil','<link rel="stylesheet" href="css/reset.css">
// <link rel="stylesheet" href="css/style.css">');
echo criaHeaderPrincipal(3, $usuario, $idPerf);
echo criaPostagensUsuario($perfil,1);
echo criaFooter('<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>');
?>