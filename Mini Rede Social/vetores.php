<?php
    include __DIR__ . './funcoes/site.funcoes.php';

    //Guarda os vetores que recuperam os dados do banco

    $perfisPessoais = recuperaObjPessoal();
    $perfisProfissionais = recuperaObjProfissional();
    $postagens = recuperaObjPostagem();

?>