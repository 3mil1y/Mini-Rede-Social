<?php
include 'funcoes/site.funcoes.php';

checaLogin();

$id = @$_GET["id"];
$postagem=$postControl->buscarPorId($id);

echo criaHead('Home','<link rel="stylesheet" href="css/reset.css">
// <link rel="stylesheet" href="css/style.css">');
echo criaPostagemEstendida($postagem);
echo criaFooter('<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>');
?>