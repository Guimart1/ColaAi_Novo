<?php
require_once '../../model/User.php';
require_once '../../dao/UserDao.php';
require_once '../../model/Mensagem.php';

$user = new User();
$msg = new Mensagem();

var_dump($_POST);
switch ($_POST["acao"]) {
  case 'SALVAR':
    $user->setImagemPerfil($user->salvarImagem(($_POST['imagemPerfilUsuario'])));
    try {
        $userDao = UserDao::insert($user);

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
    $user->setImagemPerfil($user->salvarImagem(($_POST['imagemPerfilUsuario'])));
    try {
      $userDao = UserDao::updatePerfilImage($_POST["idUsuario"], $user);
      $msg->setMensagem("Usuário atualizado com sucesso.", "bg-success");
      header("Location: banner.php");
    } catch (Exception $e) {
     echo 'Exceção capturada: ',  $e->getMessage(), "\n";

    } 
break;
case 'SELECTID':

    try {
      $userDao = UserDao::selectById($_GET['id']);
      // Configura as opções do contexto da solicitação
    } catch (Exception $e) {
      echo 'Exceção capturada: ',  $e->getMensagem(), "\n";
    }
    break;

        }
?>