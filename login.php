<?php

include 'db.php';

$usuario = addslashes($_POST['usuario']);
$senha = md5($_POST['senha']);

$query = "SELECT * FROM usuarios
WHERE usuario = '$usuario'
AND senha = '$senha'";

$consulta = mysqli_query($conexao, $query);

if (mysqli_num_rows($consulta) === 1) {

    session_start();

    $_SESSION['login'] = true;
    $_SESSION['usuario'] = $usuario;
    header('location:index.php');
} else {
    echo 'Usuário e/ou senha inválido';
    header('location:index.php?erro=1');
}