<?php
require_once '../../model/SeguirOrganizacao.php';
require_once '../../dao/SeguirOrganizacaoDao.php';
require_once '../../model/Mensagem.php';

$seguir = new SeguirOrganizacao();
$msg = new Mensagem();

//var_dump($_POST);
switch ($_POST["acao"]) {
  case 'DELETE':
    try {
      // Instancie a classe SeguirOrganizacaoDao
      $seguir = new SeguirOrganizacaoDao();
      
      // Chame o método deleteSeguir passando o ID do evento e do usuário
      $resultado = $seguir->deleteSeguir($_POST['idOrganizacaoEvento'], $_POST['idUsuario']);
      
      // Verifique se a exclusão foi bem-sucedida
      if ($resultado) {
          // Se sim, redirecione para a página de eventos
          header("Location: index.php?id=" . $_POST['idOrganizacaoEvento']);
          exit();
      } else {
          // Se não, exiba uma mensagem de erro ou tome outra ação adequada
          echo "Erro ao seguir organização.";
      }
    } catch (Exception $e) {
      // Em caso de exceção, exiba a mensagem de erro
      echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
    break;
    case 'SALVAR':
      // Define o id da organizacao
      $idOrganizacaoEvento = $_POST["idOrganizacaoEvento"];
      
      // Verifica se já existe um registro com o mesmo ID de usuário e ID de evento
      $idUsuario = $_POST["idUsuario"];
      $jaSeguindo = SeguirOrganizacaoDao::selectByUsuarioOrganizacao($idUsuario, $idOrganizacaoEvento);
      
      // Se já estiver registrado, exibe uma mensagem ao usuário
      if ($jaSeguindo) {
          $msg->setMensagem("Você já segue esta organização.", "bg-warning");
          header("Location: index.php?id=$idOrganizacaoEvento");
          exit(); // Termina o script para evitar execução adicional
      }
      
      // Se não estiver registrado, procede com a inserção
      $seguir = new SeguirOrganizacao();
      $msg = new Mensagem();
      $seguir->setIdUsuario($_POST["idUsuario"]);
      $seguir->setIdOrgEvento($_POST["idOrganizacaoEvento"]);
  
      try {
          // Insere o interesse do evento no banco de dados
          $resultado = SeguirOrganizacaoDao::insert($seguir);
  
          if ($resultado) {
              $msg->setMensagem("Seguindo salvo com sucesso no banco de dados.", "bg-success");
          } else {
              $msg->setMensagem("Erro ao inserir seguir no banco de dados.", "bg-danger");
          }
  
          header("Location: index.php?id=$idOrganizacaoEvento");
          exit(); // Termina o script para evitar execução adicional
      } catch (Exception $e) {
          echo 'Exceção capturada: ',  $e->getMessage(), "\n";
      }
      break;
  case 'ATUALIZAR':
    //pode validar as informações
    $seguir->setIdUsuario($_POST["idUsuario"]);
    $seguir->setIdOrgEvento($_POST["idOrganizacaoEvento"]);
    try {
      $seguirDao = SeguirOrganizacaoDao::update($_POST["idSeguindo"], $seguir);
      $msg->setMensagem("Seguir organizacao atualizado com sucesso.", "bg-success");
      header("Location: index.php");
    } catch (Exception $e) {
      echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
    break;

  case 'SELECTID':

    try {
      $seguirDao = SeguirOrganizacaoDao::selectById($_POST['id']);
      // Configura as opções do contexto da solicitação
      include('register.php');
    } catch (Exception $e) {
      echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }


    break;
}
