<?php
include '../../funcoes/site.funcoes.php';

$usuario = @$_POST["username"];
$senha = md5(@$_POST["senha"]);

$sql = "SELECT * FROM perfil WHERE userName = '".$usuario."' AND senha = '".$senha."'";
$result = $db->query($sql);

$user;

if ($result->num_rows != false && $result->num_rows > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    $user = null;
}

if($user != null){
    $_SESSION["logado"] = 1;
    $_SESSION["idPerf"] = $user["idPerf"];
    $_SESSION["username"] = $user["userName"];
    header('location: ../../homelogged.php');
} else {
    $_SESSION["logado"] = 0;
    header('location: site.login.php?msg=Login ou senha incorretos');
}
?>