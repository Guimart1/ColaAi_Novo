<?php
session_start();
require_once (__DIR__ . '/../dao/UserDao.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["email"])){ // Verifica se o login foi feito por email
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $user = UserDao::checkCredentials($email, $senha);
        
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
    } elseif(isset($_POST["telefone"])){ // Verifica se o login foi feito por telefone
        $tel = $_POST["telefone"];
        $senha = $_POST["senha"];
        $user = UserDao::checkCredentialsTel($tel, $senha);
        
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
    }
} else {
    // Redirecionar se alguém tentar acessar diretamente este arquivo
    header('Location:../Usuário/Login/index.php?login=erro2');
    exit();
}
?>