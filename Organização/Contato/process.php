<?php
require_once '../../model/ContatoOrgEvento.php';
require_once '../../dao/ContatoOrgEventoDao.php';
require_once '../../model/Mensagem.php';

$contato = new ContatoOrgEvento();
$msg = new Mensagem();

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

      // Adiciona uma mensagem para debug
      $msg->setMensagem("Usuário inserido com sucesso no banco de dados.", "bg-success");

      header("Location: index.php");
    } catch (Exception $e) {
      // Se houver um erro na inserção, você pode lidar com isso aqui

      // Adiciona uma mensagem para debug
      $msg->setMensagem("Erro ao inserir usuário no banco de dados: " . $e->getMessage(), "bg-danger");

      // header("Location: index.php");
      echo "falhou";
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
      $msg->setMensagem("Usuário atualizado com sucesso.", "bg-success");
      header("Location: index.php");
    } catch (Exception $e) {
      echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
    break;
}