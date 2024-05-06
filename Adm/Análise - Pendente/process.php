<?php
require_once (__DIR__.'../../../dao/OrganizacaoDao.php');
require_once (__DIR__.'../../../model/OrganizacaoEvento.php');
require_once (__DIR__.'../../../model/Mensagem.php');

$organizacao = new OrganizacaoEvento();
$msg = new Mensagem();

//var_dump($_POST);
switch ($_POST["acao"]) {
        case 'ACEITAR':
              $organizacao->setSituacao(2);
              try {
                $organizacaoDao = OrganizacaoDao::updateSituacao($_POST["id"], $organizacao);
                $msg->setMensagem("Usuário atualizado com sucesso.", "bg-success");
                header("Location: index.php");
              } catch (Exception $e) {
               echo 'Exceção capturada: ',  $e->getMessage(), "\n";
      
              } 
          break;
        case 'NEGAR':
              $organizacao->setSituacao(3);
              try {
                $organizacaoDao = OrganizacaoDao::updateSituacao($_POST["id"], $organizacao);
                $msg->setMensagem("Usuário atualizado com sucesso.", "bg-success");
                header("Location: index.php");
              } catch (Exception $e) {
               echo 'Exceção capturada: ',  $e->getMessage(), "\n";
      
              } 
          break;
      
        case 'SELECTID':
      
          try {
              $organizacaoDao = OrganizacaoDao::selectById($_POST['id']);
              // Configura as opções do contexto da solicitação
              include('register.php');
          } catch (Exception $e) {
              echo 'Exceção capturada: ',  $e->getMessage(), "\n";
          } 
      
        
          break;
        }
?>
