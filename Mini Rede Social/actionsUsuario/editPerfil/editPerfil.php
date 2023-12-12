<?php
include '../../funcoes/site.funcoes.php';

$id = checaLogin();

echo criaHead('Editar','<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">');

$tipo = checaPerfil($id);
$userName = $_SESSION["username"];
$perfil = retornaObjPerfil($id);

if($tipo == "prof"){
    echo '<form action="editPerf.acao.php"method="post">
    <input type="text" hidden name="tipo" value="profissional">
    <div class="mb-3">
      <label for="username" class="form-label">Seu usuário:</label>
      <input type="text" class="form-control" required id="username" name="username" value="'.$userName.'" disabled>
    </div>
    <div class="mb-3">
      <label for="senha" class="form-label">Informe a nova Senha:</label>
      <input type="password" class="form-control" required id="senha" name="senha" value = "'.$perfil->getSenha().'" placeholder="Insira a sua senha">
    </div>
    <div class="mb-3">
      <label for="nome" class="form-label">Insira o novo Nome Fantasia de sua Empresa:</label>
      <input type="text" class="form-control" required id="nome" name="nome" value="'.$perfil->getNomeFantasia().'"placeholder="Insira o nome fantasia">
    </div>
    <div class="mb-3">
      <label for="data" class="form-label">Insira a Data de Criação Atualizada de sua Empresa:</label>
      <input type="text" class="form-control" required id="data" name="data" value="'.$perfil->getDataCriacao().'" placeholder="Insira a data de criação">
    </div>
    <div class="mb-3">
      <label for="desc" class="form-label">Insira seu novo email/telefone de contato:</label>
      <input type="text" class="form-control" required id="desc" name="desc" value="'.$perfil->getContato().'" placeholder="Insira o seu e-mail ou telefone">
    </div>
    <button type="submit" class="btn btn-primary">Editar</button>
    <a href="../excConta/excluir.php" class="btn btn-link">Excluir</a>
  </form>
  ';
}else if($tipo == "pess"){
    echo '<form action="editPerf.acao.php"method="post">
    <input type="text" hidden name="tipo" value="pessoal">
    <div class="mb-3">
      <label for="username" class="form-label">Seu usuário:</label>
      <input type="text" class="form-control" required id="username" name="username" value="'.$userName.'" disabled>
    </div>
    <div class="mb-3">
      <label for="senha" class="form-label">Informe a nova Senha:</label>
      <input type="password" class="form-control" required id="senha" name="senha" value="'.$perfil->getSenha().'" placeholder="Insira a sua senha">
    </div>
    <div class="mb-3">
      <label for="nome" class="form-label">Insira o seu novo Nome:</label>
      <input type="text" class="form-control" required id="nome" name="nome" value="'.$perfil->getNome().'" placeholder="Insira o nome">
    </div>
    <div class="mb-3">
      <label for="data" class="form-label">Insira o seu Aniversário Atualizado:</label>
      <input type="text" class="form-control" required id="data" name="data" value="'.$perfil->getAniversario().'" placeholder="Insira a data">
    </div>
    <div class="mb-3">
      <label for="desc" class="form-label">Insira sua nova descrição:</label>
      <input type="text" class="form-control" required id="desc" name="desc" value="'.$perfil->getDescricao().'" placeholder="Insira a sua descrição">
    </div>
    <button type="submit" class="btn btn-primary">Editar</button>
    <a href="../excConta/excluir.php" class="btn btn-link">Excluir</a>
  </form>
  ';
}

?>