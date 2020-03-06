<?php
include 'db.php';

$login = $_POST['login'];
$senha = $_POST['senha'];

$login = $_POST['login'];
$senha  = $_POST['senha'];

$query = "select * from usuario where login = '$login' and  senha='$senha'";

$result = mysqli_query($con, $query);


if(mysqli_fetch_array($result)){
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    header('location:pagina.php');
}else{
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.php');
}
