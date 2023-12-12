<?php
include __DIR__ . '../../classes/Database.class.php';
include __DIR__ . '../../controlClasses/PostagemControl.class.php';
include __DIR__ . '../../controlClasses/PerfilPessoalControl.class.php';
include __DIR__ . '../../controlClasses/PerfilProfissionalControl.class.php';
include __DIR__ . '../../controlClasses/PerfilApoio.class.php';
include __DIR__ . './checarlogin.php';

$db = new Database("localhost", "root", "", "trab_inter");
$postControl = new PostControl($db);
$perfPessControl = new PerfPessControl($db);
$perfProfControl = new perfProfControl($db);
$perfApoio = new PerfApoio($db);

function recuperaObjPostagem(){
    global $postControl;
    $array = $postControl->listar();
    return $array;
}

function recuperaObjPessoal(){
    global $perfPessControl;
    $array = $perfPessControl->listar();

    foreach($array as $usuario){
        $id = $usuario->getId();
        $postagens = buscaPostagens($id);
        if($postagens != null){
            foreach($postagens as $postagem){
                $usuario->addPostagem($postagem);
            }
        }
    }
    return $array;
}

function recuperaObjProfissional(){
    global $perfProfControl;
    $array = $perfProfControl->listar();

    foreach($array as $usuario){
        $id = $usuario->getId();
        $postagens = buscaPostagens($id);

        if($postagens != null){
            foreach($postagens as $postagem){
                $usuario->addPostagem($postagem);
            }
        }
    }
    return $array;
}

function buscaPostagens($idUser){
    global $postControl;
    $array = $postControl->listarPorUsuario($idUser);
    return $array;
}

function cadastraPessoa($obj, $tipo){
    global $perfPessControl;
    global $perfProfControl;

    if($tipo === "pessoal"){
        $perfPessControl->cadastrar($obj);
        return $obj;
    }
    if($tipo === "profissional"){
        $perfProfControl->cadastrar($obj);
        return $obj;
    }

    return null;
}

function atualizaPessoa($obj, $tipo){
    global $perfPessControl;
    global $perfProfControl;

    if($tipo === "pessoal"){
        $perfPessControl->atualizar($obj);
        return $obj;
    }
    if($tipo === "profissional"){
        $perfProfControl->atualizar($obj);
        return $obj;
    }

    return null;
}

function excluirPessoa($id, $tipo){
    global $perfPessControl;
    global $perfProfControl;
    global $postControl;

    $postControl->deletarPorUsuario($id);

    if($tipo == "pess"){
        $perfPessControl->deletar($id);
    }
    if($tipo == "prof"){
        $perfProfControl->deletar($id);
    }

    return null;
}

function checaPerfil($id){
    global $perfApoio;
    $tipo = $perfApoio->checarPerfil($id);
    return $tipo;
}

function retornaUsername($id){
    global $perfApoio;
    $userName = $perfApoio->retornaUsername($id);
    return $userName;
}

function editarPostagem($conteudo,$idPostagem){
    global $postControl;
    if($postControl->atualizar($conteudo,$idPostagem) == true){
        return true;
    }else{
        return false;
    }
}

function addCurtida($id){
    global $postControl;
    $postagem=$postControl->buscarPorId($id);
    $postagem->addCurtida();
    $postControl->atualizarCurtidas($postagem);
}

function addComentario($comentario,$id){
    global $postControl;   
    $coment[] = $comentario;
    $postControl->cadastrarComentarios($id,$coment);
}

function deletaPostagem($id){
    global $postControl;
    $postControl->deletar($id);
}

function deletaComentario($id,$txt){
    global $postControl;
    $postControl->delComentario($id,$txt);
}

function criaPost($objPostagem,$idAutor){
    global $postControl;
    $postControl->cadastrar($objPostagem,$idAutor);
}

function buscaPost($id){
    global $postControl;
    $postagem = $postControl->buscarPorId($id);
    return $postagem;
}

function retornaObjPerfil($id){
    global $perfPessControl;
    global $perfProfControl;

    $tipo = checaPerfil($id);

    if($tipo == "pess"){
        $perfil = $perfPessControl->buscarPorId($id);
        return $perfil;
    }
    if($tipo == "prof"){
        $perfil = $perfProfControl->buscarPorId($id);
        return $perfil;
    }
    return null;
}

function buscaAutorPostagem($idPostagem){
    global $perfApoio;
    $idAutor = $perfApoio->buscaAutorPostagem($idPostagem);
    if($idAutor != null){
        return retornaObjPerfil($idAutor);
    }
    return null;
}


?>