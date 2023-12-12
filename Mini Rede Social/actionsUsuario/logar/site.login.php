<?php
include '../../funcoes/site.funcoes.php';

echo criaHead('Login','<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">');
$msg = @$_GET["msg"];

if($msg == 'unloged'){
  echo '<div class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
  Para acessar o seu perfil, realize o login;
</div>';
}
if($msg == 'sucesso'){
  echo '<div class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
  Usuario cadastrado com sucesso, realize o seu login;
</div>';
}
if($msg == 'Login ou senha incorretos'){
  echo '<div class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
  Login ou senha incorretos, tente novamente;
</div>';
}
?>

<form action='login.acao.php' method='post'>
  <div class="mb-3">
    <label for="username" class="form-label">Insira o seu Usuário:</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Insira o seu UserName">
  </div>
  <div class="mb-3">
    <label for="senha" class="form-label">Insira a sua Senha:</label>
    <input type="password" class="form-control" id="senha" name="senha" placeholder="Insira a sua senha">
  </div>
  <button type="submit" class="btn btn-primary">Entrar</button>
  <a href="../cadUser/cadastrar.php" class="btn btn-link">Cadastre-se</a>
</form>