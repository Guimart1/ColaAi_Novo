<?php
//echo "Teste"; die;
session_start();
require_once (__DIR__ . '../../dao/UserDao.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $emailOuTelefone = $_POST["emailOuTelefone"];
    $senha = $_POST["senha"];

    $user = UserDao::checkCredentials($emailOuTelefone, $senha);

    if ($user) {
        // Login bem-sucedido
        $_SESSION['AutenticaoUser'] = "SIM";
        $_SESSION['user'] = $user; // armazenar informações do usuário na sessão se desejar
        header('Location:../Usuário/Home/index.php'); 
        exit();
    } else {
        // Login falhou
        $_SESSION['AutenticaoUser'] = "NÃO";
        header('Location:../Usuário/Login/index.php?login=erro');
        exit();
    }
} else {
    // Redirecionar se alguém tentar acessar diretamente este arquivo
    header('Location:../Usuário/Login/index.php?login=erro2');
    exit();
}
?>