<?php
include '../../funcoes/site.funcoes.php';
checaLogin();


echo criaHead('Login','<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">');

?>

<form action="criarPost.acao.php" method="post">
    <div class="mb-3">
      <label for="conteudo" class="form-label">Insira o conteudo de sua Postagem:</label>
      <input type="text" class="form-control" required id="desc" name="conteudo" placeholder="Insira o texto">
    </div>
    <button type="submit" class="btn btn-primary">Criar</button>
  </form>