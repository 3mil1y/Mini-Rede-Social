<?php
include '../../funcoes/site.funcoes.php';

checalogin();

$id = @$_GET["id"];
$usuario = $_SESSION["username"];

echo criaHead('Adicionar Comentario','<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">');
echo '<form action="comentario.acao.php?idP='.$id.'" method="post">
      <input type="text" hidden value = '.$usuario.' name="username">
    <div class="mb-3">
      <label for="texto" class="form-label">Insira o Comentário:</label>
      <input type="text" class="form-control" required id="desc" name="texto" placeholder="Insira o texto">
    </div>
    <button type="submit" class="btn btn-primary">Adicionar</button>
  </form>';
?>