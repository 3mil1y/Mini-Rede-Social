<?php
include 'vetores.php';

echo criaHead('Home','<link rel="stylesheet" href="css/reset.css">
// <link rel="stylesheet" href="css/style.css">');
echo criaHeaderPrincipal(1);
echo criaPostagens($postagens);
echo criaFooter('<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>');

?>