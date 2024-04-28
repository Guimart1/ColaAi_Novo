<?php 
//Inicar a sessão
session_start();
//Verificar se o indice autenticado existe ou é igual a NÂO
if(!isset($_SESSION['AutenticaoUser']) || $_SESSION['AutenticaoUser']!='SIM'){
  //mandar para o index com um erro2
  header('Location:../Usuário/Login/index.php?login=erro2');
}
?>