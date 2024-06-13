<?php
require_once '../../model/ContatoOrgEvento.php';
require_once '../../dao/ContatoOrgEventoDao.php';
require_once '../../model/Mensagem.php';


$msg = new Mensagem();

//var_dump($_POST);
switch ($_POST["acao"]) {
  case 'DELETE':
    try {
      $contatoDao = ContatoOrgEventoDao::delete($_POST['id']);
      header("Location: contatoOrg.php");
    } catch (Exception $e) {
      echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
    break;
}
