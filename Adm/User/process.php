<?php
session_start();
require_once '../../model/User.php';
require_once '../../dao/UserDao.php';
require_once '../../model/Mensagem.php';

$user = new User();

//var_dump($_POST);
switch ($_POST["acao"]) {
    case 'DELETE':
     try {
          $userDao = UserDao::delete($_POST['id']);
          $_SESSION['toastr'] = array(
            'type' => 'success',
            'message' => 'Usuário deletado com sucesso',
            'title' => 'Ação concluida'
        );
        header("Location: index.php");
        exit();
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
        // $user->setImagemPerfil($user->salvarImagem(($_POST['imagemPerfilUsuario'])));
        // $user->setImagemBanner($user->salvarImagem(($_POST['imagemBannerUsuario'])));
        
        try {
            $userDao = UserDao::insert($user);
            header("Location: index.php");
        } catch (Exception $e) {
            header("Location: register.php");
        } 
        break;
        case 'ATUALIZAR':
              //pode validar as informações
              $user->setNome($_POST['nomeUsuario']);
              $user->setSobrenome($_POST['sobrenomeUsuario']);  
              $user->setEmail($_POST['emailUsuario']);
              $user->setSenha($_POST['senhaUsuario']);
              $user->setTel($_POST['telUsuario']);
              // $user->setImagemPerfil($user->salvarImagem(($_POST['imagemPerfilUsuario'])));
              // $user->setImagemBanner($user->salvarImagem(($_POST['imagemBannerUsuario'])));
              try {
                $userDao = UserDao::update($_POST["idUsuario"], $user);
                $_SESSION['toastr'] = array(
                  'type' => 'success',
                  'message' => 'Usuário atualizado com sucesso',
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
              $userDao = UserDao::selectById($_POST['id']);
              // Configura as opções do contexto da solicitação
              include('register.php');
          } catch (Exception $e) {
              echo 'Exceção capturada: ',  $e->getMessage(), "\n";
          } 
      
        
          break;
        }
?>
