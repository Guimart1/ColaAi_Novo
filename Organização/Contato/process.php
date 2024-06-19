<?php
session_start();
require_once '../../model/ContatoOrgEvento.php';
require_once '../../dao/ContatoOrgEventoDao.php';
require_once '../../model/Mensagem.php';

$contato = new ContatoOrgEvento();

//var_dump($_POST);
switch ($_POST["acao"]) {
  case 'DELETE':
    try {
      $contatoDao = ContatoOrgEventoDao::delete($_POST['id']);
      header("Location: index.php");
    } catch (Exception $e) {
      echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
    break;
  case 'SALVAR':
    $contato->setTitulo($_POST["tituloContatoOrganizacaoEvento"]);
    $contato->setDesc($_POST["descContatoOrganizacaoEvento"]);
    $contato->setIdOrganizacaoEvento($_POST["idOrganizacaoEvento"]);
    $contato->setIdCategoriaContatoOrganizacaoEvento($_POST["idCategoriaContatoOrganizacaoEvento"]);

    try {
      $contatoDao = ContatoOrgEventoDao::insert($contato);
      $_SESSION['toastr'] = array(
        'type' => 'success',
        'message' => 'Mensagem enviada com sucesso',
        'title' => 'Ação concluida'
      );
      header("Location: index.php");
      exit();
    } catch (Exception $e) {
      // Se houver um erro na inserção, você pode lidar com isso aqui
      header("Location: index.php");
    }
    break;
  case 'ATUALIZAR':
    //pode validar as informações
    $contato->setTitulo($_POST["tituloContatoOrganizacaoEvento"]);
    $contato->setDesc($_POST["descContatoOrganizacaoEvento"]);
    $contato->setIdOrganizacaoEvento($_POST["idOrganizacaoEvento"]);
    $contato->setIdCategoriaContatoOrganizacaoEvento($_POST["idCategoriaContatoOrganizacaoEvento "]);
    try {
      $contatoDao = ContatoOrgEventoDao::update($_POST["idContatoOrganizacaoEvento "], $contato);
      header("Location: index.php");
    } catch (Exception $e) {
      echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
    break;
}
