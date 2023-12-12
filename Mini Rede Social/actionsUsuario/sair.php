<?php
include '../site.funcoes.php';

session_start();
session_destroy();

$user = "";
header('Location: ../home.php');
?>