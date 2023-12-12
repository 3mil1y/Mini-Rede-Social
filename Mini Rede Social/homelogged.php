<?php
include 'vetores.php';

checaLogin();

$user = @$_SESSION["username"];

echo criaHead('Home','<link rel="stylesheet" href="css/reset.css">
// <link rel="stylesheet" href="css/style.css">');
echo criaHeaderPrincipal(2,$user);
echo criaCampoPesquisa();
echo criaPesquisaPost();
echo criaAutores($perfisProfissionais);
echo criaAutores($perfisPessoais);
echo criaFooter('<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>');
?>