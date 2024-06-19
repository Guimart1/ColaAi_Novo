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
      $org->setId($_POST["idOrganizacaoEvento"]);
      $org->setImagem($org->salvarImagem($_FILES['foto']));
      try {
          OrganizacaoDao::updatePerfilImage($_POST["idOrganizacaoEvento"], $org);
          $msg->setMensagem("Foto atualizada com sucesso.", "bg-success");
          $_SESSION['userOrg']['imagemOrganizacaoEvento'] = $org->getImagem(); // Atualiza a sessão com a nova imagem
          header("Location: index.php");
      } catch (Exception $e) {
          $msg->setMensagem("Erro ao atualizar foto: " . $e->getMessage(), "bg-danger");
          header("Location: index.php");
      }
      break;
}
?>
