<?php
require_once '../../dao/UserDao.php';
require_once '../../model/Mensagem.php';
$users = UserDao::selectAll();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="../../css/styleAdm.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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
        <div class="row vw-100 h-auto">
            <?php
            include('../Componentes/menu.php')
            ?>
            <div class="info-box col-md-9 " style="color: #a6a6a6;" id="data-box">
                <h1 class="text-center mt-4">Usuários</h1>
                <div class="container d-flex w-100 h-auto pe-5 mt-5">

                </div>
                <div class="row ms-4 me-5 mt-4">
                    <table class="">
                        <thead>
                            <tr id="data-table">
                                <th class="col-md-1 fs-4">ID</th>
                                <th class="col-md-2 fs-4">Nome</th>
                                <th class="col-md-3 fs-4">Sobrenome</th>
                                <th class="col-md-4 fs-4">E-mail</th>
                                <th class="text-center col-md-3 fs-4">Editar</th>
                                <th class="text-end col-md-2 fs-4">Excluir</th>
                            </tr>
                            <?php foreach ($users as $User) : ?>
                                <tr class="mt-1">
                                    <td class="fs-5 p-1 pt-3"><?= $User['idUsuario']; ?></td>
                                    <td class="fs-5 p-1 pt-3"><?= $User['nomeUsuario']; ?></td>
                                    <td class="fs-5 p-1 pt-3"><?= $User['sobrenomeUsuario']; ?></td>
                                    <td class="fs-5 p-1 pt-3"><?= $User['emailUsuario']; ?></td>
                                    <td class="text-center pt-3">
                                        <form action="process.php" method="POST">
                                            <input type="hidden" class="form-control" id="acao" name="acao" value="SELECTID">
                                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $User['idUsuario']?>">
                                            <button type="submit" class="dropdown-item"><img src="../../img/Admin/editar-icon.png" alt="" style="width: 25px;">
                                            </button>
                                        </form>
                                    </td>
                                    <td class="text-center pt-3">
                                        <a class="dropdown-item" onclick="modalRemover(<?= $User['idUsuario'] ?>,'idDeletar')">
                                        <img src="../../img/Admin/excluir-icon.png" alt="" style="width: 25px;">
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="modal fade" id="modalExcluir" role="dialog"data-bs-backdrop="false"    >
                        <div class=" modal-dialog modal-dialog-centered">
                            <div class="modal-content ">
                                <div class="modal-body" style="color: #a6a6a6;">
                                    <form action="process.php" method="post">
                                        <input type="hidden" class="form-control" id="idDeletar" name="id" type="text">
                                        <h1 class="text-center fs-2 fw-bold">Excluir Usuário?</h1>
                                        <p class="fs-5 m-0">Quando clicar em <span style="text-decoration: underline; color:#FF3131">excluir</span> a
                                         ação não poderá ser desfeita, deixando o usuário impossibilitado de se registrar no site.</p>
                                            <div class="d-flex justify-content-between mt-5"> 
                                            <a href="" class="fs-4 mt-auto mb-2" style="color: #6D9EAF">Cancelar</a>
                                            <button type="submit" class="btn-adm rounded rounded-3 border-0 fs-4 col-3" value="DELETE" name="acao">Excluir</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
    <script type="text/javascript" src="../../js/modal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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