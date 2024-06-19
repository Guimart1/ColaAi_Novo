<?php
session_start();
require_once '../../model/UserAdm.php';
require_once '../../dao/UserAdmDao.php';
require_once '../../model/Mensagem.php';

$user = new UserAdm();

//var_dump($_POST);
switch ($_POST["acao"]) {
  case 'DELETE':
    try {
      $userAdmDao = UserAdmDao::delete($_POST['id']);
      $_SESSION['toastr'] = array(
        'type' => 'success',
        'message' => 'Administrador deletado com sucesso',
        'title' => 'Ação concluida'
      );
      header("Location: index.php");
      exit();
    } catch (Exception $e) {
      echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
    break;
  case 'SALVAR':
    $user->setNome($_POST['nomeAdmin']);
    $user->setSobrenome($_POST['sobrenomeAdmin']);
    $user->setCpf($_POST['cpfAdmin']);
    $user->setNasc($_POST['dataNascAdmin']);
    $user->setEmail($_POST['emailAdmin']);
    $user->setSenha($_POST['senhaAdmin']);
    $user->setImagem($user->salvarImagem(($_POST['fotoPerfilAdmin'])));
    
    $email = userAdmDao::checkEmail($_POST['emailAdmin']);
    $cpf = userAdmDao::checkCpf($_POST['cpfAdmin']);
    if($email != null && count($email)>0){
      $_SESSION['toastr'] = array(
        'type' => 'error',
        'message' => 'Email já cadastrado',
        'title' => 'Falha ao cadastrar'
    );
    header("Location: register.php");
    exit();
    } else if($cpf != null && count($cpf)>0){
      $_SESSION['toastr'] = array(
        'type' => 'error',
        'message' => 'CPF já cadastrado',
        'title' => 'Falha ao cadastrar'
    );
    header("Location: register.php");
    exit();
    } else {
      try {
        $userAdmDao = UserAdmDao::insert($user);
        $_SESSION['toastr'] = array(
          'type' => 'success',
          'message' => 'Administrador criado com sucesso',
          'title' => 'Ação concluida'
      );
      header("Location: index.php");
      exit();
      } catch (Exception $e) {
        $_SESSION['toastr'] = array(
          'type' => 'error',
          'message' => 'erro com sucesso',
          'title' => 'Falha ao cadastrar'
      );
        header("Location: register.php");
      }
    }
    break;
  case 'ATUALIZAR':
    //pode validar as informações
    $user->setNome($_POST['nomeAdmin']);
    $user->setSobrenome($_POST['sobrenomeAdmin']);
    $user->setCpf($_POST['cpfAdmin']);
    $user->setNasc($_POST['dataNascAdmin']);
    $user->setEmail($_POST['emailAdmin']);
    $user->setSenha($_POST['senhaAdmin']);
    $user->setImagem($user->salvarImagem($_POST['fotoPerfilAdmin']));
    try {
      $userAdmDao = UserAdmDao::update($_POST["idAdmin"], $user);

      $_SESSION['toastr'] = array(
        'type' => 'success',
        'message' => 'Administrador atualizado com sucesso',
        'title' => 'Ação concluida'
      );
      header("Location: index.php");
      exit();
    } catch (Exception $e) {
      echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
    break;

  case 'SELECTID':

    try {
      $userAdmDao = UserAdmDao::selectById($_POST['id']);
      // Configura as opções do contexto da solicitação
      include('register.php');
    } catch (Exception $e) {
      echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }


    break;
}
