<?php
include '../../funcoes/site.funcoes.php';
$id = checaLogin();

echo criaHead('Editar','<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">');

echo '<form action="excluir.acao.php"method="post">
<p>Deseja Confirmar a exclusão?</p>
<button type="submit" class="btn btn-primary">Sim!</button>
<a href="../../selfPerfil.php" class="btn btn-link">Voltar</a>
</form>';
?>