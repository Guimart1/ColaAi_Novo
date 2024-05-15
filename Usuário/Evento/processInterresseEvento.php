<?php
require_once '../../model/InteresseEvento.php';
require_once '../../dao/InteresseEventoDao.php';
require_once '../../model/Mensagem.php';

$interesse = new InteresseEvento();
$msg = new Mensagem();

//var_dump($_POST);
switch ($_POST["acao"]) {
  case 'DELETE':
    try {
      // Instancie a classe InteresseEventoDao
      $interesseDao = new InteresseEventoDao();
      
      // Chame o método deleteInterest passando o ID do evento e do usuário
      $resultado = $interesseDao->deleteInterest($_POST['idEvento'], $_POST['idUsuario']);
      
      // Verifique se a exclusão foi bem-sucedida
      if ($resultado) {
          // Se sim, redirecione para a página de eventos
          header("Location: evento.php?id=" . $_POST['idEvento']);
          exit();
      } else {
          // Se não, exiba uma mensagem de erro ou tome outra ação adequada
          echo "Erro ao excluir interesse do evento.";
      }
    } catch (Exception $e) {
      // Em caso de exceção, exiba a mensagem de erro
      echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
    break;
    case 'SALVAR':
      // Define o id do evento
      $idEvento = $_POST["idEvento"];
      
      // Verifica se já existe um registro com o mesmo ID de usuário e ID de evento
      $idUsuario = $_POST["idUsuario"];
      $jaRegistrado = InteresseEventoDao::selectByUsuarioEvento($idUsuario, $idEvento);
      
      // Se já estiver registrado, exibe uma mensagem ao usuário
      if ($jaRegistrado) {
          $msg->setMensagem("Você já registrou interesse neste evento.", "bg-warning");
          header("Location: evento.php?id=$idEvento");
          exit(); // Termina o script para evitar execução adicional
      }
      
      // Se não estiver registrado, procede com a inserção
      $interesse = new InteresseEvento();
      $msg = new Mensagem();
      $interesse->setIdUsuario($_POST["idUsuario"]);
      $interesse->setIdEvento($_POST["idEvento"]);
  
      try {
          // Insere o interesse do evento no banco de dados
          $resultado = InteresseEventoDao::insert($interesse);
  
          if ($resultado) {
              $msg->setMensagem("Registro salvo com sucesso no banco de dados.", "bg-success");
          } else {
              $msg->setMensagem("Erro ao inserir interesse do evento no banco de dados.", "bg-danger");
          }
  
          header("Location: evento.php?id=$idEvento");
          exit(); // Termina o script para evitar execução adicional
      } catch (Exception $e) {
          echo 'Exceção capturada: ',  $e->getMessage(), "\n";
      }
      break;
  case 'ATUALIZAR':
    //pode validar as informações
    $interesse->setIdUsuario($_POST["idUsuario"]);
    $interesse->setIdEvento($_POST["idEvento"]);
    try {
      $interesseDao = InteresseEventoDao::update($_POST["idInteresseEvento"], $interesse);
      $msg->setMensagem("Interesse Evento atualizado com sucesso.", "bg-success");
      header("Location: index.php");
    } catch (Exception $e) {
      echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
    break;

  case 'SELECTID':

    try {
      $interesseDao = InteresseEventoDao::selectById($_POST['id']);
      // Configura as opções do contexto da solicitação
      include('register.php');
    } catch (Exception $e) {
      echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }


    break;
}
