<?php
session_start();
require_once '../../model/ContatoOrgEvento.php';
require_once '../../dao/ContatoOrgEventoDao.php';
require_once '../../model/Mensagem.php';


$msg = new Mensagem();

//var_dump($_POST);
switch ($_POST["acao"]) {
  case 'DELETE':
    try {
      $contatoDao = ContatoOrgEventoDao::delete($_POST['id']);
      $_SESSION['toastr'] = array(
        'type' => 'success',
        'message' => 'Contato finalizado com sucesso',
        'title' => 'Ação concluida'
    );
    header("Location: contatoOrg.php");
    exit();
    } catch (Exception $e) {
      echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
    break;
}
