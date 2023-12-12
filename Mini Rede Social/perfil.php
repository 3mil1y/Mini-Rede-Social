<?php
include 'vetores.php';

checaLogin();
$idPerf = @$_GET["id"];

$perfil;
foreach($perfisPessoais as $pessoa){
    if($pessoa->getId() == $idPerf){
        $perfil = $pessoa;
    }
}
foreach($perfisProfissionais as $pessoa){
    if($pessoa->getId() == $idPerf){
        $perfil = $pessoa;
    }
}

$usuario = $perfil->getUserName();

echo criaHead('Perfil','<link rel="stylesheet" href="css/reset.css">
// <link rel="stylesheet" href="css/style.css">');
echo criaHeaderPrincipal(4, $usuario,$idPerf);
echo criaPostagensUsuario($perfil,0);
echo criaFooter('<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>');
?>