<?php
require_once '../../dao/EventoDao.php';
$evento = EventoDao::selectAllActive();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idEvento'])) {
    $faixa_etaria = array(
        '1' => '0-12 meses',
        '2' => '1-3 anos',
        '3' => '3-5 anos',
        '4' => '5-12 anos',
        '5' => 'Livre para todos os públicos'
    );

    $turnos = array(
        '1' => 'Manhã',
        '2' => 'Tarde',
        '3' => 'Noite',
        '4' => 'Dia Todo'
    );

    // O ID do evento enviado via AJAX está disponível em $_POST['idEvento']
    $idEvento = $_POST['idEvento'];

    // Obtém os dados filtrados da organização com base no valor do filtro
    $eventoSolo = EventoDao::selectById($idEvento);

    // Constrói o HTML apenas para o <tbody> da tabela com os resultados filtrados
    $html_info = '';
    $html_info .= "<input type='hidden' class='form-control' id='idInfo' name='id' type='text'>";
    $html_info .= "<div class='d-flex m-0' style='height: 30px;'>";
    $html_info .= "<p class='m-0 fw-bold fs-5'>Nome do Evento: </p>";
    $html_info .= "<p class='ms-2 fs-5'>" . $eventoSolo['nomeEvento'] . "</p>";
    $html_info .= "</div>";
    $html_info .= "<div class='d-flex m-0' style='height: 30px;'>";
    $html_info .= "<p class='m-0 fw-bold fs-5'>CEP: </p>";
    $html_info .= "<p class='ms-2 fs-5'>" . $eventoSolo['cepEvento'] . "</p>";
    $html_info .= "</div>";
    $html_info .= "<div class='d-flex m-0 justify-content-between' style='height: 30px;'>";
    $html_info .= "<div class='d-flex'>";
    $html_info .= "<p class='m-0 fw-bold fs-5'>Endereço: </p>";
    $html_info .= "<p class='ms-2 fs-5'>" . $eventoSolo['enderecoEvento'] . "</p>";
    $html_info .= "</div>";
    $html_info .= "<div class='me-auto ms-auto d-flex'>";
    $html_info .= "<p class='m-0 fw-bold fs-5'>Nº: </p>";
    $html_info .= "<p class='ms-2 fs-5'>" . $eventoSolo['numeroEvento'] . "</p>";
    $html_info .= "</div>";
    $html_info .= "</div>";
    $html_info .= "<div class='d-flex m-0' style='height: 30px;'>";
    $html_info .= "<p class='m-0 fw-bold fs-5'>Complemento: </p>";
    $html_info .= "<p class='ms-2 fs-5'>" . $eventoSolo['complementoEvento'] . "</p>";
    $html_info .= "</div>";
    $html_info .= "<div class='d-flex m-0' style='height: 30px;'>";
    $html_info .= "<p class='m-0 fw-bold fs-5'>Bairro: </p>";
    $html_info .= "<p class='ms-2 fs-5'>" . $eventoSolo['bairroEvento'] . "</p>";
    $html_info .= "</div>";
    $html_info .= "<div class='d-flex m-0 justify-content-between' style='height: 30px;'>";
    $html_info .= "<div class='d-flex'>";
    $html_info .= "<p class='m-0 fw-bold fs-5'>Cidade: </p>";
    $html_info .= "<p class='ms-2 fs-5'>" . $eventoSolo['cidadeEvento'] . "</p>";
    $html_info .= "</div>";
    $html_info .= "<div class='me-auto ms-auto d-flex'>";
    $html_info .= "<p class='m-0 fw-bold fs-5'>UF: </p>";
    $html_info .= "<p class='ms-2 fs-5'>" . $eventoSolo['ufEvento'] . "</p>";
    $html_info .= "</div>";
    $html_info .= "</div>";
    $html_info .= "<div class='d-flex m-0' style='height: 30px;'>";
    $html_info .= "<p class='m-0 fw-bold fs-5'>Faixa etária: </p>";
    $html_info .= "<p class='ms-2 fs-5'>" . $faixa_etaria[$eventoSolo['faixaEtariaEvento']] . "</p>";
    $html_info .= "</div>";
    $html_info .= "<div class='d-flex m-0' style='height: 30px;'>";
    $html_info .= "<p class='m-0 fw-bold fs-5'>Turno: </p>";
    $html_info .= "<p class='ms-2 fs-5'>" . $turnos[$eventoSolo['periodoEvento']] . "</p>";
    $html_info .= "</div>";
    $html_info .= "<div class='d-flex m-0' style='height: 30px;'>";
    $html_info .= "<p class='m-0 fw-bold fs-5'>Bairro: </p>";
    $html_info .= "<p class='ms-2 fs-5'>" . $eventoSolo['bairroEvento'] . "</p>";
    $html_info .= "</div>";
    $html_info .= "<p class='m-0 fw-bold fs-5'>Descrição: </p>";
    $html_info .= "<div class='desc-box w-100 rounded rounded-3 mb-3 p-1'>";
    $html_info .= "<p>" . $eventoSolo['descEvento'] . "</p>";
    $html_info .= "</div>";

    // Retorna o HTML do <tbody> com os dados filtrados
    echo $html_info;
    exit(); // Finaliza a execução do script após retornar o HTML do <tbody>
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos - Organização</title>
    <link rel="stylesheet" href="../../css/styleAdm.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"> <!-- CSS Projeto -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>
    <?php
    require_once '../../dao/EventoDao.php';

    session_start();

    // Verificar se o índice 'Autenticado' existe ou é igual a 'SIM'
    if (!isset($_SESSION['AutenticaoOrg']) || $_SESSION['AutenticaoOrg'] != 'SIM') {
        // Redirecionar para o login com um erro2 se não estiver autenticado
        header('Location: index.php?login=erro2');
        exit();
    }

    // Obter o ID da organização logada
    $idOrganizacaoLogada = $_SESSION['userOrg']['idOrganizacaoEvento'];

    //o usuário está autenticado
    $authUserOrg = $_SESSION['userOrg'];

    // Buscar apenas os eventos associados a essa organização
    $evento = EventoDao::selectByOrganizacaoIdActive($idOrganizacaoLogada);

    include('../Componentes/header.php');
    ?>
    <div class="container-fluid vw-100 ">
        <div class="hamburger-wrapper">
            <div class="hamburger" onclick="toggleSidebar(), toggleHamburger()">
                <input class="checkbox" type="checkbox" />
                <svg fill="none" viewBox="0 0 50 50" height="50" width="50">
                    <path class="lineTop line" stroke-linecap="round" stroke-width="4" stroke="black" d="M6 11L44 11"></path>
                    <path stroke-linecap="round" stroke-width="4" stroke="black" d="M6 24H43" class="lineMid line"></path>
                    <path stroke-linecap="round" stroke-width="4" stroke="black" d="M6 37H43" class="lineBottom line"></path>
                </svg>
            </div>
        </div>
        <div class="row vw-100">
            <?php
            include('../Componentes/menu.php')
            ?>
            <div class="info-box col-md-9 pt-4" style="color: #a6a6a6;" id="data-box">
                <h1 class="text-center mt-4">Veja aqui todos os seus eventos!</h1>
                <div class="container d-flex w-100 h-auto mt-5 me-5">
                    <a href="register.php" class="ms-auto me-0" style="width: 45px;">
                        <img src="../../img/Admin/add-icon.png" alt="" class="ms-auto" style="width: 45px;">
                    </a>
                </div>
                <div class="row ms-4 me-5 mt-4">
                    <table class="">
                        <thead>
                            <tr id="data-table">
                                <th class="col-md-1 fs-4">ID</th>
                                <th class="col-md-3 fs-4">Nome do Evento</th>
                                <th class="text-center col-md-2 fs-4">Informações</th>
                                <th class="text-center col-md-1 fs-4">Arquivar</th>
                                <th class="text-center col-md-1 fs-4 text-center">Alterar</th>
                                <th class="text-center col-md-1 fs-4">Excluir</th>

                            </tr>
                            <?php foreach ($evento as $eventos) : ?>
                                <tr class="mt-1">
                                    <td class="fs-5 pt-3"><?= $eventos['idEvento']; ?></td>
                                    <td class="fs-5 pt-3"><?= $eventos['nomeEvento']; ?></td>
                                    <td class="text-center pt-3">
                                        <a class="dropdown-item" onclick="mostrarInfo(<?=$eventos['idEvento']?>)">
                                            <img src="../../img/Admin/info-icon.png" alt="" style="width: 40px;">
                                        </a>
                                    </td>
                                    <td class="text-center fs-5 pt-3">
                                        <a class="dropdown-item" onclick="modalArquivar(<?= $eventos['idEvento'] ?>,'idArquivar')">
                                            <img src="../../img/Organizacao/arquivar-icon.png" alt="" style="width: 40px;">
                                        </a>
                                    </td>
                                    <td class="text-center pt-3">
                                        <form action="process.php" method="POST">
                                            <input type="hidden" class="form-control" id="acao" name="acao" value="SELECTID">
                                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $eventos['idEvento'] ?>">
                                            <button type="submit" class="dropdown-item"><img src="../../img/Admin/editar-icon.png" alt="" style="width: 35px;">
                                            </button>
                                        </form>
                                    </td>
                                    <td class="text-center pt-3">
                                        <a class="dropdown-item" onclick="modalRemover(<?= $eventos['idEvento'] ?>,'idDeletar')">
                                            <img src="../../img/Admin/excluir-icon.png" alt="" style="width: 30px;">
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
                                <h1 class="modal-title fs-3" id="exampleModalLabel">Informações do Evento</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="color: #a6a6a6;">
                                <form action="process.php" method="post" id = "informacoes">
                                    <input type="text" class="form-control" id="idInfo" name="id" type="text">
                                    <div class="d-flex m-0" style="height: 30px;">
                                        <p class="m-0 fw-bold fs-5">Nome do Evento: </p>
                                        <p class="ms-2 fs-5">aa</p>
                                    </div>
                                    <div class="d-flex m-0" style="height: 30px;">
                                        <p class="m-0 fw-bold fs-5">CEP: </p>
                                        <p class="ms-2 fs-5">aaa</p>
                                    </div>
                                    <div class="d-flex m-0 justify-content-between" style="height: 30px;">
                                        <div class="d-flex">
                                            <p class="m-0 fw-bold fs-5">Endereço: </p>
                                            <p class="ms-2 fs-5">aaa</p>
                                        </div>
                                        <div class="me-auto ms-auto d-flex">
                                            <p class="m-0 fw-bold fs-5">Nº: </p>
                                            <p class="ms-2 fs-5">000</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-0" style="height: 30px;">
                                        <p class="m-0 fw-bold fs-5">Complemento: </p>
                                        <p class="ms-2 fs-5">Rua dos coitados</p>
                                    </div>
                                    <div class="d-flex m-0" style="height: 30px;">
                                        <p class="m-0 fw-bold fs-5">Bairro: </p>
                                        <p class="ms-2 fs-5">aaa</p>
                                    </div>

                                    <div class="d-flex m-0 justify-content-between" style="height: 30px;">
                                        <div class="d-flex">
                                            <p class="m-0 fw-bold fs-5">Cidade: </p>
                                            <p class="ms-2 fs-5">aaa</p>
                                        </div>
                                        <div class="me-auto ms-auto d-flex">
                                            <p class="m-0 fw-bold fs-5">UF: </p>
                                            <p class="ms-2 fs-5">000</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-0" style="height: 30px;">
                                        <p class="m-0 fw-bold fs-5">Faixa etária: </p>
                                        <p class="ms-2 fs-5">aaa</p>
                                    </div>
                                    <div class="d-flex m-0" style="height: 30px;">
                                        <p class="m-0 fw-bold fs-5">Turno: </p>
                                        <p class="ms-2 fs-5">aaa</p>
                                    </div>
                                    <div class="d-flex m-0" style="height: 30px;">
                                        <p class="m-0 fw-bold fs-5">Bairro: </p>
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
                </div>
                <div class="modal fade" id="modalExcluir" role="dialog" data-bs-backdrop="false">
                    <div class=" modal-dialog modal-dialog-centered">
                        <div class="modal-content ">
                            <div class="modal-body" style="color: #a6a6a6;">
                                <form action="process.php" method="post">
                                    <input type="hidden" class="form-control" id="idDeletar" name="id" type="text">
                                    <h1 class="text-center fs-2 fw-bold">Excluir evento<br> da organização?</h1>
                                    <p class="fs-5 m-0">Quando clicar em <span style="text-decoration: underline; color:#FF3131">excluir</span>
                                        a ação não poderá ser desfeita, na qual fará o evento deixar de existir.</p>
                                    <div class="d-flex justify-content-between mt-5">
                                        <a href="" class="fs-4 mt-auto mb-2" style="color: #6D9EAF">Cancelar</a>
                                        <button type="submit" class="btn-adm rounded rounded-3 border-0 fs-4 col-3" value="DELETE" name="acao">Excluir</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                  
                </div>
                <div class="modal fade" id="modalArquivar" role="dialog" data-bs-backdrop="false">
                    <div class=" modal-dialog modal-dialog-centered">
                        <div class="modal-content ">
                            <div class="modal-body" style="color: #a6a6a6;">
                                <form action="process.php" method="post">
                                    <input type="hidden" class="form-control" id="idArquivar" name="id" type="text">
                                    <h1 class="text-center fs-2 fw-bold">Arquivar evento<br> da organização?</h1>
                                    <p class="fs-5 m-0">Quando clicar em <span style="text-decoration: underline; color:#FF3131">arquivar</span>
                                        a ação não poderá ser desfeita, na qual fará o evento deixar de existir.</p>
                                    <div class="d-flex justify-content-between mt-5">
                                        <a href="" class="fs-4 mt-auto mb-2" style="color: #6D9EAF">Cancelar</a>
                                        <button type="submit" class="btn-adm rounded rounded-3 border-0 fs-4 col-3" value="ARQUIVAR" name="acao">Arquivar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
            </script>
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
            <script type="text/javascript" src="../../js/personalizar.js"></script>
            <script type="text/javascript" src="../../js/modal.js"></script>
            <script type="text/javascript" src="../../js/ajax.js"></script>
            <script>
                function mostrarInfo(idEvento){
                    enviarIdEvento(idEvento);
                    modalInfo(idEvento, 'idInfo');
                }
            </script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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