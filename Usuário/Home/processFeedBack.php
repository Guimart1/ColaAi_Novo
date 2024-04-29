<?php
require_once '../../model/FeedbackApp.php';
require_once '../../dao/FeedBackAppDao.php';
require_once '../../model/Mensagem.php';

$feedback = new FeedbackApp();
$msg = new Mensagem();

//var_dump($_POST);
switch ($_POST["acao"]) {
  case 'DELETE':
    try {
      $feedbackDao = FeedbackAppDao::delete($_POST['id']);
      header("Location: index.php");
    } catch (Exception $e) {
      echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
    break;
  case 'SALVAR':
    $feedback->setTitulo($_POST["tituloFeedBackApp"]);
    $feedback->setDescricao($_POST["descFeedbackApp"]);
    $feedback->setIdUsuario($_POST["idUsuario"]);

    try {
    $feedbackDao = FeedbackAppDao::insert($feedback);

      // Adiciona uma mensagem para debug
      $msg->setMensagem("Usuário inserido com sucesso no banco de dados.", "bg-success");

      header("Location: index.php");
    } catch (Exception $e) {
      // Se houver um erro na inserção, você pode lidar com isso aqui

      // Adiciona uma mensagem para debug
      $msg->setMensagem("Erro ao inserir usuário no banco de dados: " . $e->getMessage(), "bg-danger");

      header("Location: index.php");
    }
    break;
  case 'ATUALIZAR':
    //pode validar as informações
    $feedback->setTitulo($_POST["tituloFeedBackApp"]);
    $feedback->setDescricao($_POST["descFeedbackApp"]);
    $feedback->setIdUsuario($_POST["idUsuario"]);
    try {
    $feedbackDao = FeedbackAppDao::update($_POST["idFeedBackApp"], $feedback);
      $msg->setMensagem("Usuário atualizado com sucesso.", "bg-success");
      header("Location: index.php");
    } catch (Exception $e) {
      echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
    break;

  case 'SELECTID':

    try {
    $feedbackDao = FeedbackAppDao::selectById($_POST['id']);
      // Configura as opções do contexto da solicitação
      include('register.php');
    } catch (Exception $e) {
      echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }


    break;
}
