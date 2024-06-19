<?php
session_start();
require_once '../../model/FeedbackApp.php';
require_once '../../dao/FeedBackAppDao.php';
require_once '../../model/Mensagem.php';

$feedback = new FeedbackApp();

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
      $_SESSION['toastr'] = array(
          'type' => 'success',
          'message' => 'Feedback enviado com sucesso',
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
    $feedback->setTitulo($_POST["tituloFeedBackApp"]);
    $feedback->setDescricao($_POST["descFeedbackApp"]);
    $feedback->setIdUsuario($_POST["idUsuario"]);
    try {
    $feedbackDao = FeedbackAppDao::update($_POST["idFeedBackApp"], $feedback);
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
