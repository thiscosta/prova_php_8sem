<?php
session_start();
if (!$_SESSION['usuario'] && !$_SESSION['autorizacao']) {
    header("Location: ../login.php");
    exit();
}

include("conexao.php");
include("hash.php");

$user = $_SESSION['usuario'];
$motherName = hash('md5', 'lourdesferreiradossantoscosta');
$message = "Pagina inicial carregada com sucesso com o usuário $user - $motherName";

$query = "INSERT INTO control (message) VALUES ('$message')";
mysqli_query($conexao, $query) or die(mysqli_error($conexao));
