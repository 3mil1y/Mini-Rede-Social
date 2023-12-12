<?php
include 'vetores.php';

checaLogin();

$id = @$_GET["id"];
$user = @$_SESSION["username"];

echo criaHead('Home','<link rel="stylesheet" href="css/reset.css">
// <link rel="stylesheet" href="css/style.css">');
echo criaHeaderPrincipal(5,$user);
echo criaDescricao($id);
echo '<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>';

?>