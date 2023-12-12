<?php
include '../../funcoes/site.funcoes.php';

echo criaHead('Cadastrar','<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">');

$msg = @$_GET["msg"];

if($msg == 'userName existente'){
  echo '<div class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
  O nome de usuário já existe, por favor crie outro e tente novamente!
</div>';
}
?>



<form action='cadastrar.php' method='post'>
<div class="form-floating ">
  <select name="tipo" class="form-select" id="floatingSelect" aria-label="Floating label select example">
    <option selected value="0">Selecione o tipo de Perfil</option>
    <option value="1">Profissional</option>
    <option value="2">Pessoal</option>
  </select>
</div>
  <button type="submit" class="btn btn-primary">Selecionar</button>
</form>

<?php

$tipo = @$_POST["tipo"];
if($tipo == 0){
  echo '<div class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
  Escolha um tipo de Perfil!
</div>';
}
if($tipo == 1){
    echo '<form action="cadastrar.acao.php"method="post">
    <input type="text" hidden name="tipo" value="profissional">
    <div class="mb-3">
      <label for="username" class="form-label">Crie um userName:</label>
      <input type="text" class="form-control" required id="username" name="username" placeholder="Crie o seu Username (Aviso: Ele não pode ser modificado!)">
    </div>
    <div class="mb-3">
      <label for="senha" class="form-label">Crie uma Senha:</label>
      <input type="password" class="form-control" required id="senha" name="senha" placeholder="Insira a sua senha">
    </div>
    <div class="mb-3">
      <label for="nome" class="form-label">Insira o Nome Fantasia de sua Empresa:</label>
      <input type="text" class="form-control" required id="nome" name="nome" placeholder="Insira o nome fantasia">
    </div>
    <div class="mb-3">
      <label for="data" class="form-label">Insira a Data de Criação de sua Empresa:</label>
      <input type="text" class="form-control" required id="data" name="data" placeholder="Insira a data de criação">
    </div>
    <div class="mb-3">
      <label for="desc" class="form-label">Insira seu email/telefone de contato:</label>
      <input type="text" class="form-control" required id="desc" name="desc" placeholder="Insira o seu e-mail ou telefone">
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
    <a href="../logar/site.login.php" class="btn btn-link">Logar</a>
  </form>
  ';
}else if($tipo == 2){
    echo '<form action="cadastrar.acao.php"method="post">
    <input type="text" hidden name="tipo" value="pessoal">
    <div class="mb-3">
      <label for="username" class="form-label">Crie um userName:</label>
      <input type="text" class="form-control" required id="username" name="username" placeholder="Crie o seu Username (Aviso: Ele não pode ser modificado!)">
    </div>
    <div class="mb-3">
      <label for="senha" class="form-label">Crie uma Senha:</label>
      <input type="password" class="form-control" required id="senha" name="senha" placeholder="Insira a sua senha">
    </div>
    <div class="mb-3">
      <label for="nome" class="form-label">Insira o seu Nome:</label>
      <input type="text" class="form-control" required id="nome" name="nome" placeholder="Insira o nome">
    </div>
    <div class="mb-3">
      <label for="data" class="form-label">Insira o seu Aniversário:</label>
      <input type="text" class="form-control" required id="data" name="data" placeholder="Insira a data">
    </div>
    <div class="mb-3">
      <label for="desc" class="form-label">Crie uma descrição:</label>
      <input type="text" class="form-control" required id="desc" name="desc" placeholder="Insira a sua descrição">
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
    <a href="../logar/site.login.php" class="btn btn-link">Logar</a>
  </form>
  ';
}

?>