<?php
session_start();

// Destruir a sessão
unset($_SESSION['AutenticaoOrg']);
unset($_SESSION['userOrg']);
session_destroy();

// Redirecionar para a página de login
header('Location: ../Organização/index.php');
exit();
?>
