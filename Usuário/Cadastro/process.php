<?php
require_once '../../model/User.php';
require_once '../../dao/UserDao.php';
require_once '../../model/Mensagem.php';

$user = new User();
$msg = new Mensagem();
$conexao = new mysqli("localhost", "root", "", "bdcolaai");

//var_dump($_POST);
switch ($_POST["acao"]) {
  case 'DELETE':
    try {
      $userDao = UserDao::delete($_POST['id']);
      header("Location: index.php");
    } catch (Exception $e) {
      echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
    break;
  case 'SALVAR':
    $user->setNome($_POST['nomeUsuario']);
    $user->setSobrenome($_POST['sobrenomeUsuario']);
    $user->setEmail($_POST['emailUsuario']);
    $user->setSenha($_POST['senhaUsuario']);
    $user->setTel($_POST['telUsuario']);

    try {
      $userDao = UserDao::insert($user);
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtém o e-mail enviado pelo formulário
        $email = $_POST['emailUsuario'];
    
        // Consulta SQL para verificar se o e-mail já existe no banco de dados
        $sql = "SELECT * FROM tbusuario WHERE emailUsuario = '$email'";
        $resultado = $conexao->query($sql);
            // Verifica se houve algum erro na execução da consulta
    if ($resultado === false) {
      echo "Erro ao executar a consulta: ";
      
     } else {
        // Verifica se houve algum resultado retornado pela consulta
        if ($resultado->num_rows > 0) {
            // E-mail já existe no banco de dados, exibe mensagem de erro
            echo "Erro: Este e-mail já está cadastrado.";
        } else {
            // E-mail não existe no banco de dados, pode prosseguir com o cadastro
            $msg->setMensagem("Usuário inserido com sucesso no banco de dados.", "bg-success");
            header("Location: personalizar.php");
        }
    } 
    
    } 
    } catch (Exception $e) {
      // Se houver um erro na inserção, você pode lidar com isso aqui

      // Adiciona uma mensagem para debug
      $msg->setMensagem("Erro ao inserir usuário no banco de dados: " . $e->getMessage(), "bg-danger");

      header("Location: index.php");
    }
    break;

  case 'ATUALIZAR':
    //pode validar as informações
    $user->setNome($_POST['nomeUsuario']);
    $user->setSobrenome($_POST['sobrenomeUsuario']);
    $user->setEmail($_POST['emailUsuario']);
    $user->setSenha($_POST['senhaUsuario']);
    $user->setTel($_POST['telUsuario']);
    $user->setImagemPerfil($user->salvarImagem(($_POST['imagemPerfilUsuario'])));
    $user->setImagemBanner($user->salvarImagem(($_POST['imagemBannerUsuario'])));
    try {
      $userDao = UserDao::update($_POST["idUsuario"], $user);
      $msg->setMensagem("Usuário atualizado com sucesso.", "bg-success");
      header("Location: index.php");
    } catch (Exception $e) {
      echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
    break;

    case 'ATUALIZAR_IMAGEM_PERFIL':
      // Lógica para atualizar a imagem de perfil do usuário
      $userId = $_SESSION['idUsuario'];
      $imagePath = $_FILES['imagemPerfilUsuario']['tmp_name'];

      // Faça o upload da imagem e atualize o perfil do usuário com o caminho da imagem
      // Exemplo de lógica de upload de imagem:
      $uploadDir = '../../uploads/perfil/';
      $imageName = basename($_FILES['imagemPerfilUsuario']['name']);
      $uploadPath = $uploadDir . $imageName;
      move_uploaded_file($imagePath, $uploadPath);

      // Atualize o perfil do usuário com o caminho da imagem
      $user->setId($userId);
      $user->setImagemPerfil($uploadPath);
      UserDao::updatePerfilImage($user);

      // Redirecione o usuário para a página de perfil
      header("Location: perfil.php");
      exit();
      break;

  case 'SELECTID':

    try {
      $userDao = UserDao::selectById($_POST['id']);
      // Configura as opções do contexto da solicitação
      include('register.php');
    } catch (Exception $e) {
      echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }


    break;
}
