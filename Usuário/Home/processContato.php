<?php
require_once '../../model/ContatoUsuario.php';
require_once '../../dao/ContatoUsuarioDao.php';
require_once '../../model/Mensagem.php';

$contato = new ContatoUsuario();
$msg = new Mensagem();

//var_dump($_POST);
switch ($_POST["acao"]) {
  case 'DELETE':
    try {
      $contatoDao = ContatoUsuarioDao::delete($_POST['id']);
      header("Location: index.php");
    } catch (Exception $e) {
      echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
    break;
  case 'SALVAR':
    $contato->setTitulo($_POST["tituloContatoUsuario"]);
    $contato->setDesc($_POST["descContatoUsuario"]);
    $contato->setIdUsuario($_POST["idUsuario"]);
    $contato->setidCategoriaContatoUsuario($_POST["idCategoriaContatoUsuario "]);

    try {
    $contatoDao = ContatoUsuarioDao::insert($contato);

      // Adiciona uma mensagem para debug
      $msg->setMensagem("Usuário inserido com sucesso no banco de dados.", "bg-success");

      header("Location: index.php");
    } catch (Exception $e) {
      // Se houver um erro na inserção, você pode lidar com isso aqui

      // Adiciona uma mensagem para debug
      echo "Erro ao inserir contato no banco de dados: " . $e->getMessage();

      header("Location: index.php");
    }
    break;
  case 'ATUALIZAR':
    //pode validar as informações
    $contato->setTitulo($_POST["tituloContatoUsuario"]);
    $contato->setDesc($_POST["descContatoUsuario"]);
    $contato->setIdUsuario($_POST["idUsuario"]);
    $contato->setidCategoriaContatoUsuario($_POST["idCategoriaContatoUsuario "]);
    try {
    $contatoDao = ContatoUsuarioDao::update($_POST["idContatoUsuario "], $contato);
      $msg->setMensagem("Usuário atualizado com sucesso.", "bg-success");
      header("Location: index.php");
    } catch (Exception $e) {
      echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
    break;

  case 'SELECTID':

    try {
    $contatoDao = ContatoUsuarioDao::selectById($_POST['id']);
      // Configura as opções do contexto da solicitação
      include('register.php');
    } catch (Exception $e) {
      echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }


    break;
}
