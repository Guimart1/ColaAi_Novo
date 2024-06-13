<?php
require_once '../../model/ContatoUsuario.php';
require_once '../../dao/ContatoUsuarioDao.php';
require_once '../../model/Mensagem.php';


$msg = new Mensagem();

//var_dump($_POST);
switch ($_POST["acao"]) {
  case 'DELETE':
    try {
      $contatoDao = ContatoUsuarioDao::delete($_POST['id']);
      header("Location: contatoUser.php");
    } catch (Exception $e) {
      echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
    break;
}
