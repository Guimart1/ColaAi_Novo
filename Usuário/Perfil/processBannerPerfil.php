<?php
require_once '../../model/User.php';
require_once '../../dao/UserDao.php';
require_once '../../model/Mensagem.php';

$user = new User();
$msg = new Mensagem();

var_dump($_POST);
switch ($_POST["acao"]) {
  case 'SALVAR':
    $user->setImagemBanner($user->salvarBanner(($_POST['imagemBannerUsuario'])));
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
    $user->setImagemBanner($user->salvarBanner(($_POST['imagemBannerUsuario'])));
    try {
      $userDao = UserDao::updateBannerImage($_POST["idUsuario"], $user);
      $msg->setMensagem("Usuário atualizado com sucesso.", "bg-success");
      header("Location: index.php");
    } catch (Exception $e) {
     echo 'Exceção capturada: ',  $e->getMessage(), "\n";

    } 
break;

        }
?>
