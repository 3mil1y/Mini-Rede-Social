<?php
session_start();
function checaLogin($msg="unloged"){
if($_SESSION["logado"] == 0){
    header('location: actionsusuario/logar/site.login.php?msg='.$msg.'');
} else {
    return $_SESSION["idPerf"];
}
}
?>