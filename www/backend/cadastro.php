<?php

if (
    !isset($_POST['username'])
    && !isset($_POST['password'])
) {
    echo "Dados incompletos para cadastro";
    exit;
}

include("conexao.php");
include("hash.php");

$username = $_POST['username'];
$password = $_POST['password'];

//var_export($_POST);
$hash = generateUniqueHash();
$hashedPassword = generatePassword($password, $hash);

$query = "INSERT INTO users (username, password, hash) VALUES ('$username', '$hashedPassword', '$hash')";
mysqli_query($conexao, $query) or die(mysqli_error($conexao));

header("Location: ../login.php");
