<?php
require_once '../../model/OrganizacaoEvento.php';
require_once '../../dao/OrganizacaoDao.php';
require_once '../../model/Mensagem.php';

$org = new OrganizacaoEvento();
$msg = new Mensagem();

var_dump($_POST);
switch ($_POST["acao"]) {
  case 'SALVAR':
    $org->setImagem($org->salvarImagem(($_POST['imagemOrganizacaoEvento'])));
    try {
        $orgDao = OrganizacaoDao::insert($org);

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
    $org->setImagem($org->salvarImagem(($_POST['imagemOrganizacaoEvento'])));
    try {
      $orgDao = OrganizacaoDao::updatePerfilImage($_POST["idOrganizacaoEvento"], $org);
      $msg->setMensagem("Usuário atualizado com sucesso.", "bg-success");
      header("Location: index.php");
    } catch (Exception $e) {
     echo 'Exceção capturada: ',  $e->getMessage(), "\n";

    } 
break;

        }
?>
