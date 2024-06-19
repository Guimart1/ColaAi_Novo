<?php
session_start();
require_once (__DIR__.'../../../model/Evento.php');
require_once (__DIR__.'../../../dao/EventoDao.php');
require_once (__DIR__.'../../../model/Mensagem.php');

$evento = new Evento();

//var_dump($_POST);
switch ($_POST["acao"]) {
    case 'DELETE':
     try {
          $eventoDao = EventoDao::delete($_POST['id']);
          header("Location: index.php");
      } catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
      }
      break;
      case 'SALVAR':
        $evento->setNome($_POST['nomeEvento']); 
        $evento->setCep($_POST['cepEvento']);
        $evento->setEndereco($_POST['enderecoEvento']);
        $evento->setNumero($_POST['numeroEvento']);
        $evento->setComplemento($_POST['complementoEvento']);
        $evento->setBairro($_POST['bairroEvento']);
        $evento->setCidade($_POST['cidadeEvento']);
        $evento->setUf($_POST['ufEvento']);
        $evento->setData($_POST['dataEvento']);
        $evento->setDataFim($_POST['dataFimEvento']);
        $evento->setFaixaEtaria($_POST['faixaEtariaEvento']);
        $evento->setPeriodoEvento($_POST['periodoEvento']);
        $evento->setValor($_POST['valorEvento']);
        $evento->setEspaco($_POST['espacoEvento']);
        $evento->setDesc($_POST['descEvento']);
        $evento->setIdOrganizacaoEvento($_POST['idOrganizacaoEvento']);
        $evento->setImagemEvento($evento->salvarImagem(($_POST['imagemEvento'])));  
        try {
            $eventoDao = EventoDao::insert($evento);
            header("Location: index.php");
        } catch (Exception $e) {

            header("Location: register.php");
        } 
        break;
        case 'ATUALIZAR':
          //pode validar as informações
          $evento->setNome($_POST['nomeEvento']); 
          $evento->setCep($_POST['cepEvento']);
          $evento->setEndereco($_POST['enderecoEvento']);
          $evento->setNumero($_POST['numeroEvento']);
          $evento->setComplemento($_POST['complementoEvento']);
          $evento->setBairro($_POST['bairroEvento']);
          $evento->setCidade($_POST['cidadeEvento']);
          $evento->setUf($_POST['ufEvento']);
          $evento->setData($_POST['dataEvento']);
          $evento->setDataFim($_POST['dataFimEvento']);
          $evento->setFaixaEtaria($_POST['faixaEtariaEvento']);
          $evento->setPeriodoEvento($_POST['periodoEvento']);
          $evento->setValor($_POST['valorEvento']);
          $evento->setEspaco($_POST['espacoEvento']);
          $evento->setDesc($_POST['descEvento']);
          $evento->setIdOrganizacaoEvento($_POST['idOrganizacaoEvento']);
          $evento->setImagemEvento($evento->salvarImagem(($_POST['imagemEvento'])));  
              try {
                $eventoDao = EventoDao::update($_POST["idEvento"], $evento);
                header("Location: index.php");
              } catch (Exception $e) {
               echo 'Exceção capturada: ',  $e->getMessage(), "\n";
      
              } 
          break;
      
        case 'SELECTID':
          try {
              $eventoDao = EventoDao::selectById($_POST['id']);
              // Configura as opções do contexto da solicitação
              include('register.php');
          } catch (Exception $e) {
              echo 'Exceção capturada: ',  $e->getMessage(), "\n";
          } 
        break;

        case 'ARQUIVAR':
          $evento->setSituacaoEvento(2);
          try {
            $eventoDao = eventoDao::updateSituacao($_POST["id"], $evento);
            header("Location: index.php");
          } catch (Exception $e) {
           echo 'Exceção capturada: ',  $e->getMessage(), "\n";
          } 
          break;

        case 'RESTAURAR':
          $evento->setSituacaoEvento(1);
          try {
            $eventoDao = eventoDao::updateSituacao($_POST["id"], $evento);
            $_SESSION['toastr'] = array(
              'type' => 'success',
              'message' => 'Evento restaurado com sucesso',
              'title' => 'Ação concluida'
            );
            header("Location: eventos.php");
            exit();
          } catch (Exception $e) {
           echo 'Exceção capturada: ',  $e->getMessage(), "\n";
          } 
          break;
        }
?>
