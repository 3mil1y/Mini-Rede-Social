<?php
include __DIR__ . '../../vetores.php';

function buscaPerfil($userName){
    global $perfisPessoais;
    global $perfisProfissionais;
    $perfil;
foreach($perfisPessoais as $pessoa){
    if($pessoa->getUserName() == $userName){
        $perfil = $pessoa;
    }
}
foreach($perfisProfissionais as $pessoa){
    if($pessoa->getUserName() == $userName){
        $perfil = $pessoa;
    }
}
return $perfil;
}

function checaCorrespondencia($stringPesq){
    $perfis = array();
    global $perfisPessoais;
    global $perfisProfissionais;

    foreach($perfisPessoais as $perfil){
        $userName = $perfil->getUserName();
        if(strpos($userName, $stringPesq) !== false){
            $perfis[] = $perfil;
        }
    }
    foreach($perfisProfissionais as $perfil){
        $userName = $perfil->getUserName();
        if(strpos($userName, $stringPesq) !== false){
            $perfis[] = $perfil;
        }
    }

    return $perfis;
}

function buscaPostagensFiltro($stringPesq){
    $strgPosts = '<div class="line"></div>';
    global $perfisPessoais;
    global $perfisProfissionais;

    foreach($perfisPessoais as $perfil){
        $posts = $perfil->getPostagens();
        $autor = $perfil->getUserName();
        if($posts != []){
            foreach($posts as $postagem){
                $conteudo = $postagem->getConteudo();
                if(strpos($conteudo, $stringPesq) !== false){
                    $strgPosts .= criaPostagemIndividual($postagem,$autor);
                }
            }
        }
    }

    foreach($perfisProfissionais as $perfil){
        $posts = $perfil->getPostagens();
        $autor = $perfil->getUserName();
        if($posts != []){
            foreach($posts as $postagem){
                $conteudo = $postagem->getConteudo();
                if(strpos($conteudo, $stringPesq) !== false){
                    $strgPosts .= criaPostagemIndividual($postagem,$autor);
                }
            }
        }
    }
    return $strgPosts;
}
?>