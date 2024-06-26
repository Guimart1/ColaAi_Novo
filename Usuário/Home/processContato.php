<?php
session_start();
require_once '../../model/ContatoUsuario.php';
require_once '../../dao/ContatoUsuarioDao.php';
require_once '../../model/Mensagem.php';

$contato = new ContatoUsuario();

var_dump($_POST);
switch ($_POST["acao"]) {
  case 'DELETE':
    try {
      $contatoDao = ContatoUsuarioDao::delete($_POST['id']);
      // header("Location: index.php");
    } catch (Exception $e) {
      echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
    break;
  case 'SALVAR':
    $contato->setTitulo($_POST["tituloContatoUsuario"]);
    $contato->setDesc($_POST["descContatoUsuario"]);
    $contato->setIdUsuario($_POST["idUsuario"]);
    $contato->setidCategoriaContatoUsuario($_POST["idCategoriaContatoUsuario"]);

    try {
      $contatoDao = ContatoUsuarioDao::insert($contato);
      $_SESSION['toastr'] = array(
        'type' => 'success',
        'message' => 'Mensagem enviada com sucesso',
        'title' => 'Ação concluida'
      );
      header("Location: index.php");
      exit();
    } catch (Exception $e) {


      // Adiciona uma mensagem para debug
      echo "Erro ao inserir contato no banco de dados: " . $e->getMessage();

      header("Location: processContato.php");
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
