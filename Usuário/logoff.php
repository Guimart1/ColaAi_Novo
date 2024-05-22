<?php
session_start();

// Destruir a sessão
unset($_SESSION['AutenticaoUser']);
unset($_SESSION['user']);
session_destroy();

// Redirecionar para a página de login
header('Location: ../index.php');
exit();
?>
