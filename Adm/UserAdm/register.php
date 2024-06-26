<?php
require_once '../../Adm/Componentes/modal.php';
require_once  '../../dao/UserAdmDao.php';

if (!empty($_POST)) {
  $id_Admin = $userAdmDao['idAdmin'];
  $nome_Admin =  $userAdmDao['nomeAdmin'];
  $sobrenome_Admin =  $userAdmDao['sobrenomeAdmin'];
  $cpf_Admin = $userAdmDao['cpfAdmin'];
  $nasc_Admin = $userAdmDao['dataNascAdmin'];
  $email_Admin = $userAdmDao['emailAdmin'];
  $senha_Admin = $userAdmDao['senhaAdmin'];
  $imagem_Admin = $userAdmDao['fotoPerfilAdmin'];
} else {
  $nome_Admin = '';
  $sobrenome_Admin = '';
  $cpf_Admin = '';
  $nasc_Admin = '';
  $email_Admin = '';
  $senha_Admin = '';
  $imagem_Admin = '';
  $id_Admin = '';
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro Administradores</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- icon -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"> <!-- CSS Projeto -->
  <link rel="stylesheet" href="../../css/styleAdm.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>

<body style="justify-content: center; align-items: center; height: 100vh ">
  <?php
  // Verificar se o índice 'Autenticado' existe ou é igual a 'SIM'
  if (!isset($_SESSION['AutenticaoAdm']) || $_SESSION['AutenticaoAdm'] != 'SIM') {
      // Redirecionar para o login com um erro2 se não estiver autenticado
      header('Location: login.php?login=erro2');
      exit();
  }

  // Agora, o usuário está autenticado, então você pode acessar as informações do usuário na sessão
  $authUser = $_SESSION['userAdm'];
  ?>
  <?php
  include('../../Adm/Componentes/header.php');
  ?>
  <div class="container-fluid" style="height: 90vh">
    <div class="hamburger-wrapper">
              <div class="hamburger" onclick="toggleSidebar(), toggleHamburger()">
                  <input class="checkbox" type="checkbox" />
                  <svg fill="none" viewBox="0 0 50 50" height="50" width="50">
                      <path
                          class="lineTop line"
                          stroke-linecap="round"
                          stroke-width="4"
                          stroke="black"
                          d="M6 11L44 11"
                      ></path>
                      <path
                          stroke-linecap="round"
                          stroke-width="4"
                          stroke="black"
                          d="M6 24H43"
                          class="lineMid line"
                      ></path>
                      <path
                          stroke-linecap="round"
                          stroke-width="4"
                          stroke="black"
                          d="M6 37H43"
                          class="lineBottom line"
                      ></path>
                  </svg>
              </div>
          </div>
    <div class="row h-100">
      <?php
      include('../../Adm/Componentes/menu.php')
      ?>
      <div class="col-md-9 p-4 justify-content-center align-items-center d-flex flex-column" id="data-box">
        <div class="card w-75 mt-5" style="background-color: #FFFFFF;">
        <?php
        if ($id_Admin ==''){
        ?>
        <h1 class="text-center mt-2" style="color: #a6a6a6;">Cadastrar Administrador</h1>
        <?php
        }else{
        ?>
        <h1 class="text-center mt-2" style="color: #a6a6a6;">Editar Informações - ADM</h1>
        <?php
        }
        ?>
          <form method="post" action="process.php" enctype="multipart/form-data" class="needs-validation w-100 h-100" novalidate>
            <input type="hidden" name="idAdmin" id="idAdmin" placeholder="id" value="<?= $id_Admin ?>">
            <input type="hidden" name="fotoPerfilAdmin" id="fotoPerfilAdmin" placeholder="nome foto" value="<?= $imagem_Admin ?>">
            <input type="hidden" value="<?= $id_Admin? 'ATUALIZAR' : 'SALVAR' ?>" name="acao">
            <div class="w-100 h-100 row d-flex p-2">
              <div class="col-md-4 text-center justify-content-center align-self-start d-flex flex-column">
                <div class="row mt-4">
                  <div class="rounded">
                    <img id="preview" src="../../img/Admin/<?= $imagem_Admin!=""?$imagem_Admin:'userPadrao.png';?>" alt="imagem padrão" class="img-fluid rounded" style="width: 200px; height: 200px">
                  </div>
                </div>
                <div class="row inputFile">
                  <label for="foto" class="form-label">Carregar Imagem</label>
                  <input type="file" id="foto" name="foto" accept="image/*" class="form-control mt-1 mb-4">
                </div>
              </div>
              <div class="col-md-8">
                <div class="row">
                  <div class="col-md-6 mb-3 needs-validation">
                    <label for="nome" class="col-form-label">Nome:</label>
                    <input type="text" class="form-control inputAdm " placeholder="Digite o seu nome" name="nomeAdmin" maxlength="50" id="nomeAdmin" value="<?= $nome_Admin ?>" required>
                    <div class="invalid-feedback">
                      Preencha este campo
                    </div>
                  </div>
                  <div class="col-md-6 mb-3 needs-validation">
                    <label for="sobrenome" class="col-form-label">Sobrenome:</label>
                    <input type="text" class="form-control inputAdm" placeholder="Digite o seu sobrenome" name="sobrenomeAdmin" maxlength="50" id="sobrenomeAdmin" value="<?= $sobrenome_Admin ?>" required>
                    <div class="invalid-feedback">
                      Preencha este campo
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 needs-validation">
                    <label for="cpf" class="col-form-label">CPF:</label>
                    <input type="cpf" class="form-control inputAdm" placeholder="000.000.000-00" data-mask="000.000.000-00" name="cpfAdmin" maxlength="100" id="cpfAdmin" value="<?= $cpf_Admin ?>" required>
                  </div>
                  <div class="col-md-6 needs-validation">
                    <label for="nasc" class="col-form-label">Data de Nascimento:</label>
                    <input type="date" class="form-control inputAdm" name="dataNascAdmin" id="dataNascAdmin" value="<?= $nasc_Admin ?>" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 needs-validation">
                    <label for="email" class="col-form-label">Email:</label>
                    <input type="email" class="form-control inputAdm" placeholder="Seu@email.com" name="emailAdmin" maxlength="100" id="emailAdmin" value="<?= $email_Admin ?>" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 needs-validation">
                    <label for="senha" class="col-form-label">Senha:</label>
                    <input type="password" class="form-control inputAdm" placeholder="Digite uma senha" name="senhaAdmin" maxlength="10" id="senha" value="<?= $senha_Admin ?>" required>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="text-end p-3">
                    <a class="btn px-3" role="button" aria-disabled="true" href="index.php">Voltar</i></a>
                    <input type="submit" class="btn" value="<?= $id_Admin ? 'Editar' : 'Cadastrar' ?>">
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer>
  </script>
  <!-- Para usar Mascara  -->
  <script>
        function toggleSidebar() {
            var sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        }
    </script>
    <script>
        function toggleHamburger() {
                var hamburger = document.querySelector('.hamburger'); // Selecionando o ícone do hambúrguer corretamente
                hamburger.classList.toggle('showHamburger');
            }
    </script>
  <script type="text/javascript" src="../../js/jquery.mask.min.js"></script>
  <script type="text/javascript" src="../../js/personalizar.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <?php 
        if (isset($_SESSION['toastr'])) {
            $toastr = $_SESSION['toastr'];
            echo "<script>
                $(document).ready(function() {
                    toastr.{$toastr['type']}('{$toastr['message']}', '{$toastr['title']}');
                });
            </script>";
            unset($_SESSION['toastr']); // Limpa a mensagem da sessão
        }
    ?>
</body>

</html>