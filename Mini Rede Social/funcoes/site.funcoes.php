<?php
include 'site.config.php';

function criaPostagensUsuario($usuario,$tipo){
    $autor = $usuario->getUserName();
    $vetPostagens = $usuario->getPostagens();
    $strgPosts = '<div class="line"></div>';
    if($tipo == 1){
    foreach($vetPostagens as $postagem){
        $id=$postagem->getId();
        $strgPosts .= '<div class="flex container w60p">
        <div class="flex conteudo">
            <div class="flex">
                <a class = "limpar" href = "selfpostagemEstendida.php?id='.$id.'"><p>'.$postagem->getConteudo().'</p><a>
            </div>
            <div class="flex h50">
                 <ul class="flex">
                    <li class="flex center">
                        <a href="actionsPost/curtida.php?id='.$id.'">
                            <iconify-icon class="black" icon="solar:heart-broken"></iconify-icon>
                        </a>'.$postagem->getCurtidas().'
                    </li>
                    <li class="flex center">
                        <a href="actionsPost/addComent/comentario.php?id='.$id.'">
                            <iconify-icon class="black" icon="mingcute:thought-line"></iconify-icon>
                        </a>'.$postagem->numComentarios().'
                    </li>
                </ul>
            </div>
        </div>
        <div class="autor">
            <p>@'.$autor.'</p>
        </div>
        </div>
        <div class="line"></div>';
      }
    }else{
        foreach($vetPostagens as $postagem){
            $id=$postagem->getId();
            $strgPosts .= '<div class="flex container w60p">
            <div class="flex conteudo">
                <div class="flex">
                    <a class = "limpar" href="postagemEstendida.php?id='.$id.'"><p>'.$postagem->getConteudo().'</p><a>
                </div>
                <div class="flex h50">
                     <ul class="flex">
                        <li class="flex center">
                            <a href="actionsPost/curtida.php?id='.$id.'">
                                <iconify-icon class="black" icon="solar:heart-broken"></iconify-icon>
                            </a>'.$postagem->getCurtidas().'
                        </li>
                        <li class="flex center">
                            <a href="actionsPost/addComent/comentario.php?id='.$id.'">
                                <iconify-icon class="black" icon="mingcute:thought-line"></iconify-icon>
                            </a>'.$postagem->numComentarios().'
                        </li>
                    </ul>
                </div>
            </div>
            <div class="autor">
                <p>@'.$autor.'</p>
            </div>
            </div>
            <div class="line"></div>';
        }
    }
    return $strgPosts;
}

function criaPostagens($vetPostagens = ""){
    if($vetPostagens == "" || $vetPostagens == null){
        return "";
    }
    $strgPosts = '<div class="line"></div>';
    foreach($vetPostagens as $postagem){
        $id=$postagem->getId();
        $strgPosts .= '<div class="flex container w60p">
        <div class="flex conteudo">
            <div class="flex">
                <p>'.$postagem->getConteudo().'</p>
            </div>
            <div class="flex h50">
                 <ul class="flex">
                    <li class="flex center">
                        <a href="actionsPost/curtida.php?id="'.$id.'">
                            <iconify-icon class="black" icon="solar:heart-broken"></iconify-icon>
                        </a>'.$postagem->getCurtidas().'
                    </li>
                    <li class="flex center">
                        <a href="actionsPost/addComent/comentario.php?id="'.$id.'">
                            <iconify-icon class="black" icon="mingcute:thought-line"></iconify-icon>
                        </a>'.$postagem->numComentarios().'
                    </li>
                </ul>
            </div>
        </div>
        <div class="autor">
            <p>@Realize o Login para ver o autor</p>
        </div>
        </div>
        <div class="line"></div>';
    }
    return $strgPosts;
}

function criaPostagemIndividual($postagem,$autor){
    $id = $postagem->getId();
    $strgPosts = '';
    $strgPosts .= '<div class="flex container w60p">
            <div class="flex conteudo">
                <div class="flex">
                    <a class = "limpar" href="postagemEstendida.php?id='.$id.'"><p>'.$postagem->getConteudo().'</p><a>
                </div>
                <div class="flex h50">
                     <ul class="flex">
                        <li class="flex center">
                            <a href="actionsPost/curtida.php?id='.$id.'">
                                <iconify-icon class="black" icon="solar:heart-broken"></iconify-icon>
                            </a>'.$postagem->getCurtidas().'
                        </li>
                        <li class="flex center">
                            <a href="actionsPost/addComent/comentario.php?id='.$id.'">
                                <iconify-icon class="black" icon="mingcute:thought-line"></iconify-icon>
                            </a>'.$postagem->numComentarios().'
                        </li>
                    </ul>
                </div>
            </div>
            <div class="autor">
                <p>@'.$autor.'</p>
            </div>
            </div>
            <div class="line"></div>';
    
    return $strgPosts;
}

function criaAutores($autores,$tipo=1){
    $strAutores = "";
    if($tipo != 1){
        $strAutores .= '<div class = "flex center"><p class="flex center bkWhite buttonInitMaior txtC"><a href="homelogged.php" class="limpar">Home</a></p></div>';
    }
    foreach($autores as $autor){
        $strAutores.=criaAutor($autor);
    }
    return $strAutores;
}

function criaAutor($autor){
    $id = $autor->getId();
    return '
    <div class="blank bkBlue"></div>
    <div class="flex h150 center bkWhite">
        <div class="perfil pd70">
        <iconify-icon class="flex center bkBlue icon" icon="solar:user-broken"></iconify-icon>
        <p>'.$autor->getUserName().'</p>
        </div>
        <p class="flex center bkWhite buttonInit pd70"><a href="perfil.php?id='.$id.'" class="limpar">Acessar</a></p>
    </div>
    ';
}
function criaDescricao($id){
    $tipo = checaPerfil($id);

    if($tipo == "pess"){
        return criaDescricaoPessoal($id);
    }
    if($tipo == "prof"){
        return criaDescricaoProfissional($id);
    }
}


function criaDescricaoPessoal($id){
    $autor = retornaObjPerfil($id);
    return '
    <div class="blank bkBlue"></div>
    <div class="flex h150 center bkWhite">
        <div class="perfil pd70">
        <iconify-icon class="flex center bkBlue icon" icon="solar:user-broken"></iconify-icon>
        <p>@'.$autor->getUserName().'</p>
        </div>
        <div>
        <p>Nome: '.$autor->getNome().'</p>
        <p>Aniversário: '.$autor->getAniversario().'</p>
        <p>Descrição: '.$autor->getDescricao().'</p>
        </div>
    </div>
    ';
}

function criaDescricaoProfissional($id){
    $autor = retornaObjPerfil($id);
    return '
    <div class="blank bkBlue"></div>
    <div class="flex h150 center bkWhite">
        <div class="perfil pd70">
        <iconify-icon class="flex center bkBlue icon" icon="solar:user-broken"></iconify-icon>
        <p>@'.$autor->getUserName().'</p>
        </div>
        <div>
        <p>Nome Fantasia: '.$autor->getNomeFantasia().'</p>
        <p>Data de Criação: '.$autor->getDataCriacao().'</p>
        <p>Contato: '.$autor->getContato().'</p>
        </div>
    </div>
    ';
}

function criaHead($titulo,$styleArea){
    return '<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>'.$titulo.'</title>
        '.$styleArea.'
    </head>
    <body class="bkBlue">';
}

function criaHeaderPrincipal($valor,$usuario = "",$id = ""){

    if($valor==1){
        return '<header class="bkBlue flex h150">
        <div class="cabecalho">
            <a href="selfPerfil.php" class="limpar">
            <div class="perfil">
            <iconify-icon class="flex center bkWhite icon" icon="solar:user-broken"></iconify-icon>
            </div>
            </a>
            <p class="flex center bkWhite buttonInit"><a href="actionsUsuario/logar/site.login.php" class="limpar">Entrar</a></p>
        </div>
    </header>
    <main>
    <div class="bkWhite"><p class="txtBlk pdTB15">Novas postagens</p></div>';
    }else if($valor==2){
        return '<header class="bkBlue flex h150">
        <div class="cabecalho">
            <a href="selfPerfil.php" class="limpar">
            <div class="perfil">
            <iconify-icon class="flex center bkWhite icon" icon="solar:user-broken"></iconify-icon>'.$usuario.'
            </div>
            </a>
            <p class="flex center bkWhite buttonInitMaior txtC"><a href="actionsPost/criarPost/criarPost.php" class="limpar">Criar Postagem <iconify-icon icon="basil:add-outline"></iconify-icon></a></p>
        </div>
    </header>
    <main>
    <div class="bkWhite"><p class="txtBlk pdTB15">Acessar Perfis</p></div>
    <div class="blank bkBlue"></div>';
    }else if($valor==3){
        return '<header class="bkBlue flex h250">
        <div class="cabecalho">
            <a href="selfPerfil.php" class="limpar">
            <div class="perfil">
            <iconify-icon class="flex center bkWhite icon" icon="solar:user-broken"></iconify-icon>'.$usuario.'
            </div>
            </a>
            <div class="inline">
            <p class="flex center bkWhite buttonInitMaior txtC"><a href="homelogged.php" class="limpar">Home</a></p>
            <p class="flex center bkWhite buttonInitMaior txtC"><a href="descricao.php?id='.$id.'" class="">Descrição</a></p>
            <p class="flex center bkWhite buttonInitMaior txtC"><a href="actionsUsuario/editPerfil/editPerfil.php" class="limpar">Editar Perfil</a></p>
            <p class="flex center bkWhite buttonInitMaior txtC"><a href="actionsUsuario/sair.php" class="limpar">LogOff</a></p>
            </div>
        </div>
    </header>
    <main>
    <div class="bkWhite"><p class="txtBlk pdTB15">Minhas postagens</p></div>';
    }else if($valor==4){
        return '<header class="bkBlue flex h150">
        <div class="cabecalho">
            <div class="perfil">
            <iconify-icon class="flex center bkWhite icon" icon="solar:user-broken"></iconify-icon>'.$usuario.'
            </div>
            <div class="inline">
            <p class="flex center bkWhite buttonInitMaior txtC"><a href="homelogged.php" class="limpar">Home</a></p>
            <p class="flex center bkWhite buttonInitMaior txtC"><a href="descricao.php?id='.$id.'" class="limpar">Descrição</a></p>
            </div>
        </div>
    </header>
    <main>
    <div class="bkWhite"><p class="txtBlk pdTB15">Postagens do Usuario</p></div>
    <div class="blank bkBlue"></div>';
    }else if($valor==5){
        return '<header class="bkBlue flex h150">
        <div class="cabecalho">
            <a href="selfPerfil.php" class="limpar">
            <div class="perfil">
            <iconify-icon class="flex center bkWhite icon" icon="solar:user-broken"></iconify-icon>'.$usuario.'
            </div>
            </a>
            <div class="inline">
            <p class="flex center bkWhite buttonInitMaior txtC"><a href="actionsPost/criarPost/criarPost.php" class="limpar">Criar Postagem <iconify-icon icon="basil:add-outline"></iconify-icon></a></p>
            <p class="flex center bkWhite buttonInitMaior txtC"><a href="homelogged.php" class="limpar">Home</a></p>
            </div>
        </div>
    </header>
    <main>
    <div class="bkWhite"><p class="txtBlk pdTB15">Acessar Perfis</p></div>
    <div class="blank bkBlue"></div>';
    }
}

function criaFooter($scriptArea = ""){
    return '</main>
            <footer class="flex center bkBlue h150">
                <p class="fim">Não há mais nada por aqui (;</p>
            </footer>'
            .$scriptArea.
            '</body>
            </html>';
}

function criaPostagemEstendida($postagem,$tipo=1){
    $idPost = $postagem->getId();
    $autor = buscaAutorPostagem($idPost);
    $usuario = $autor->getUserName();
    if($tipo != 1){
        $menuComp = '<p class="flex center bkWhite buttonInitMaior txtC"><a href="actionsPost/editPost/editPost.php?id='.$postagem->getId().'" class="limpar">Editar</a></p>
        <p class="flex center bkWhite buttonInitMaior txtC"><a href="actionsPost/excPost/excPost.php?id='.$postagem->getId().'" class="limpar">Excluir</a></p>';
    }else{
        $menuComp = '';
    }
  $strgPosts = '
  <div class="flex center h90 bkBlue">
  <p class="flex center bkWhite buttonInitMaior txtC"><a href="homelogged.php" class="limpar">Home</a></p>
  '.$menuComp.'
  </div>
  <div class="bkWte"></div>
  <div class="line"></div>';
  
  if($tipo != 1){
    $strgPosts .= '<div class="flex container w60p">
    <div class="flex conteudo">
        <div class="flex">
            <p>'.$postagem->getConteudo().'</p>
        </div>
        <div class="flex h50">
             <ul class="flex">
                <li class="flex center">
                    <iconify-icon class="black" icon="solar:heart-broken"></iconify-icon>
                '.$postagem->getCurtidas().'
                </li>
                <li class="flex center">
                    <iconify-icon class="black" icon="mingcute:thought-line"></iconify-icon>
                '.$postagem->numComentarios().'
                </li>
            </ul>
        </div>
    </div>
    <div class="autor">
        <p>@'.$usuario.'</p>
    </div>
    </div>
    <div class="line"></div>
    <div class="bkWte"></div>
    <div class="blank bkBlue"></div>
    <div class="bkWte"></div>
    <div class="line"></div>';
}else{
    $strgPosts .= '<div class="flex container w60p">
        <div class="flex conteudo">
            <div class="flex">
                <p>'.$postagem->getConteudo().'</p>
            </div>
            <div class="flex h50">
                 <ul class="flex">
                 <li class="flex center">
                 <a href="actionsPost/curtida.php?id='.$postagem->getId().'">
                     <iconify-icon class="black" icon="solar:heart-broken"></iconify-icon>
                 </a>'.$postagem->getCurtidas().'
             </li>
             <li class="flex center">
                 <a href="actionsPost/addComent/comentario.php?id='.$postagem->getId().'">
                     <iconify-icon class="black" icon="mingcute:thought-line"></iconify-icon>
                 </a>'.$postagem->numComentarios().'
             </li>   
                </ul>
            </div>
        </div>
        <div class="autor">
            <p>@'.$usuario.'</p>
        </div>
    </div>

    <div class="line"></div>
    <div class="bkWte"></div>
    <div class="blank bkBlue"></div>
    <div class="bkWte"></div>
    <div class="line"></div>';
}
  

    if($tipo == 1){
        $comentarios = $postagem->getComentarios();
        $comentLength = count($comentarios);
        if($comentLength > 0){
        foreach($comentarios as $comentario){
            $strgPosts .= '
            <div class="flex container w60p pdTB15">
                  <div class="flex conteudo">
                      <div class="flex">
                          <p>@'.$comentario.'</p>
                      </div>
                  </div>
                  </div>
                  <div class="line"></div>';
        }
        }else{
            $strgPosts .= '
            <div class="flex container w60p pdTB15">
                  <div class="flex conteudo">
                      <div class="flex">
                          <p>Não há comentários</p>
                      </div>
                  </div>
                  </div>
                  <div class="line"></div>';
        }

        $strgPosts .= '
        <div class="bkWte"></div>';
    }else{
        $comentarios = $postagem->getComentarios();
        $comentLength = count($comentarios);
        if($comentLength > 0){
        foreach($comentarios as $comentario){
            $strgPosts .= '
            <div class="flex container w60p pdTB15">
                  <div class="flex conteudo">
                      <div class="flex">
                          <p>@'.$comentario.'</p>
                      </div>
                  </div>
                  <p class="flex center bkWhite buttonInitMaior txtC"><a href="actionsPost/excComentario/excComentario.php?id='.$postagem->getId().'&texto='.$comentario.'" class="limpar">Deletar</a></p>
                  </div>
                  <div class="line"></div>';
        }
        }else{
            $strgPosts .= '
            <div class="flex container w60p pdTB15">
                  <div class="flex conteudo">
                      <div class="flex">
                          <p>Não há comentários</p>
                      </div>
                  </div>
                  </div>
                  <div class="line"></div>';
        }

        $strgPosts .= '
        <div class="bkWte"></div>';
    }
        return $strgPosts;
}

function criaCampoPesquisa(){
    return '<div class = "flex center h90 bkWhite">
    <form action="pesquisar.php" method="post">
      <label for="user" class="form-label">Insira o usuario que deseja pesquisar:</label>
      <input type="text" class="form-control" required id="desc" name="user" placeholder="Insira o usuario">
    <button type="submit" class="btn btn-primary">Buscar</button>
  </form>
  </div>';
}

function criaPesquisaPost(){
    return '<div class = "flex center h90 bkWhite">
    <form action="pesquisarPost.php" method="post">
      <label for="post" class="form-label">Insira a postagem que deseja pesquisar:</label>
      <input type="text" class="form-control" required id="desc" name="post" placeholder="Insira o texto da postagem">
    <button type="submit" class="btn btn-primary">Buscar</button>
  </form>
  </div>';
}
?>