<?php
require_once '../../dao/ContatoUsuarioDao.php';
$contatoUser = ContatoUsuarioDao::selectAllInner();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idContatoUsuario'])) {
    // O ID do evento enviado via AJAX está disponível em $_POST['idEvento']
    $idContato = $_POST['idContatoUsuario'];

    // Obtém os dados filtrados da organização com base no valor do filtro
    $contatoSolo = ContatoUsuarioDao::selectByIdInner($idContato);

    // Constrói o HTML apenas para o <tbody> da tabela com os resultados filtrados
    $html_info = '';
    $html_info = "<input type='hidden' class='form-control' id='idInfo' name='id' type='text'>";
    $html_info .= "<div class='d-flex m-0' style='height: 30px;'>";
    $html_info .= "<p class='m-0 fw-bold fs-5'>Nome do Usuário: </p> <p class='ms-2 fs-5' >" . $contatoSolo['nomeUsuario'] . "</p>";
    $html_info .= "</div>";
    $html_info .= "<div class='d-flex m-0' style='height: 30px;'>";
    $html_info .= "<p class='m-0 fw-bold fs-5'>E-mail: </p><p class='ms-2 fs-5'>" . $contatoSolo['emailUsuario'] . "</p>";
    $html_info .= "</div>";
    $html_info .= "<div class='d-flex m-0' style='height: 30px;'>";
    $html_info .= "<p class='m-0 fw-bold fs-5'>Título: </p><p class='ms-2 fs-5'>" . $contatoSolo['tituloContatoUsuario'] . "</p>";
    $html_info .= "</div>";
    $html_info .= "<div class='d-flex  m-0' style='height: 30px;'>";
    $html_info .= "<p class='m-0 fw-bold fs-5'>Motivo do Contato: </p><p class='ms-2 fs-5'>" . $contatoSolo['categoriaContatoUsuario'] . "</p>";
    $html_info .= "</div>";
    $html_info .= "<p class='m-0 fw-bold fs-5'>Descrição: </p>";
    $html_info .= "<div class='desc-box w-100 rounded rounded-3 mb-3 p-1'>";
    $html_info .= "<p>" . $contatoSolo['descContatoUsuario'] . "</p>";
    $html_info .= "</div>";
   

    echo $html_info;
    exit(); // Finaliza a execução do script após retornar o HTML do <tbody>
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato Organizações</title>
    <link rel="stylesheet" href="../../css/styleAdm.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"> <!-- CSS Projeto -->
</head>

<body style="justify-content: center; align-items: center; height: 100vh ">
    <?php
    // Iniciar a sessão
    session_start();

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
    include('../Componentes/header.php');
    ?>
    <div class="container-fluid">
        <div class="hamburger-wrapper">
            <div class="hamburger" onclick="toggleSidebar() , toggleHamburger()">
                <input class="checkbox" type="checkbox" />
                <svg fill="none" viewBox="0 0 50 50" height="50" width="50">
                    <path class="lineTop line" stroke-linecap="round" stroke-width="4" stroke="black" d="M6 11L44 11"></path>
                    <path stroke-linecap="round" stroke-width="4" stroke="black" d="M6 24H43" class="lineMid line"></path>
                    <path stroke-linecap="round" stroke-width="4" stroke="black" d="M6 37H43" class="lineBottom line"></path>
                </svg>
            </div>
        </div>
        <div class="row vw-100 h-auto">
            <?php
            include('../Componentes/menu.php')
            ?>
            <div class="info-box col-md-9 " style="color: #a6a6a6;" id="data-box">
                <h1 class="text-center mt-4">Contato - Usuários</h1>
                <div class="container d-flex w-100 pe-5 mt-5" style="height: 50px">
                </div>
                <div class="row ms-4 me-5 mt-4">
                    <table class="">
                        <thead>
                            <tr id="data-table">
                                <th class="col-md-1 fs-4">ID</th>
                                <th class="col-md-2 fs-4">Nome</th>
                                <th class="col-md-3 fs-4">E-mail</th>
                                <th class="col-md-3 fs-4 text-center">Informações</th>
                                <th class="col-md-2 fs-4 text-center">Finalizar Contato</th>
                            </tr>
                            <?php foreach ($contatoUser as $contatoUser) : ?>
                                <tr class="mt-1">
                                    <td class="fs-5 pt-3"><?= $contatoUser['idContatoUsuario']; ?></td>
                                    <td class="fs-5 pt-3"><?= $contatoUser['nomeUsuario']; ?></td>
                                    <td class="fs-5 pt-3"><?= $contatoUser['emailUsuario']; ?></td>
                                    <td class="text-center">
                                        <a class="dropdown-item" onclick="mostrarInfo(<?= $contatoUser['idContatoUsuario'] ?>)">
                                            <img src="../../img/Admin/info-icon.png" alt="" style="width: 40px;">
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a class="dropdown-item" onclick="modalRemover(<?= $contatoUser['idContatoUsuario'] ?>,'idDeletar')">
                                            <img src="../../img/Admin/contato-icon.png" alt="" style="width: 40px;">
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </thead>
                    </table>
                </div>
                <div class="modal fade" id="modalInfo" role="dialog" data-bs-backdrop="false">
                    <div class=" modal-dialog modal-dialog-centered">
                        <div class="modal-content ">
                            <div class="modal-header infoModalHeader">
                                <h1 class="modal-title fs-3" id="exampleModalLabel">Informações de Contato</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="color: #a6a6a6;">
                                <form action="process.php" method="post" id="informacoes">
                                    <input type="hidden" class="form-control" id="idInfo" name="id" type="text">
                                    <div class="d-flex m-0" style="height: 30px;">
                                        <p class="m-0 fw-bold fs-5">Nome do Usuário: </p>
                                        <p class="ms-2 fs-5">aa</p>
                                    </div>
                                    <div class="d-flex m-0" style="height: 30px;">
                                        <p class="m-0 fw-bold fs-5">E-mail: </p>
                                        <p class="ms-2 fs-5">aaa</p>
                                    </div>
                                    <div class="d-flex m-0" style="height: 30px;">
                                        <p class="m-0 fw-bold fs-5">Título: </p>
                                        <p class="ms-2 fs-5">aaa</p>
                                    </div>
                                    <div class="d-flex  m-0" style="height: 30px;">
                                        <p class="m-0 fw-bold fs-5">Motivo do Contato: </p>
                                        <p class="ms-2 fs-5">aaa</p>
                                    </div>
                                    <p class="m-0 fw-bold fs-5">Descrição: </p>
                                    <div class="desc-box w-100 rounded rounded-3 mb-3 p-1">
                                        <p>aaa</p>
                                    </div>
                                
                                </form>
                            </div>
                        </div>
                    </div>
                    <?= require '../../Adm/Componentes/modal.php' ?>
                </div>
                <div class="modal fade" id="modalExcluir" role="dialog" data-bs-backdrop="false">
                    <div class=" modal-dialog modal-dialog-centered">
                        <div class="modal-content ">
                            <div class="modal-body" style="color: #a6a6a6;">
                                <form action="processUser.php" method="post">
                                    <input type="hidden" class="form-control" id="idDeletar" name="id" type="text">
                                    <h1 class="text-center fs-2 fw-bold">Finalizar Contato?</h1>
                                    <p class="fs-5 m-0">Quando clicar em <span style="text-decoration: underline; color:#FF3131">Concluir</span> a
                                        ação não poderá ser desfeita.</p>
                                    <div class="d-flex justify-content-between mt-5">
                                        <a href="" class="fs-4 mt-auto mb-2" style="color: #6D9EAF">Cancelar</a>
                                        <button type="submit" class="btn-adm rounded rounded-3 border-0 fs-4 col-3" value="DELETE" name="acao">Concluir</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?= require '../../Adm/Componentes/modal.php' ?>
                </div>
            </div>
        </div>
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
        <!-- Para usar Mascara  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="../../js/jquery.mask.min.js"></script>
        <script type="text/javascript" src="../../js/personalizar.js"></script>
        <script type="text/javascript" src="../../js/modal.js"></script>
        <script type="text/javascript" src="../../js/ajax.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>
        <script>
            function mostrarInfo(idContatoUsuario) {
                enviarIdContatoUser(idContatoUsuario);
                modalInfo(idContatoUsuario, 'idInfo');
            }
        </script>
</body>

</html>