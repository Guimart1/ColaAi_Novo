<?php
    require_once('../../dao/OrganizacaoDao.php');
    require_once '../../model/Mensagem.php';
    $organizacao = OrganizacaoDao::selectAll(); 

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idOrganizacaoEvento'])) {
        // O ID do evento enviado via AJAX está disponível em $_POST['idEvento']
        $idOrganizacao = $_POST['idOrganizacaoEvento'];
    
        // Obtém os dados filtrados da organização com base no valor do filtro
        $organizacaoSolo = OrganizacaoDao::selectById($idOrganizacao);
    
        // Constrói o HTML apenas para o <tbody> da tabela com os resultados filtrados
        $html_info = '';
        $html_info = "<input type='hidden' class='form-control' id='idInfo' name='id' type='text'>";
        $html_info .= "<div class='d-flex m-0' style='height: 30px;'>";
        $html_info .= "<p class='m-0 fw-bold fs-5'>Nome da Organização: </p> <p class='ms-2 fs-5' >" . $organizacaoSolo['nomeOrganizacaoEvento'] . "</p>";
        $html_info .= "</div>";
        $html_info .= "<div class='d-flex m-0' style='height: 30px;'>";
        $html_info .= "<p class='m-0 fw-bold fs-5'>CNPJ: </p><p class='ms-2 fs-5'>" . $organizacaoSolo['cnpjOrganizacaoEvento'] . "</p>";
        $html_info .= "</div>";
        $html_info .= "<div class='d-flex m-0' style='height: 30px;'>";
        $html_info .= "<p class='m-0 fw-bold fs-5'>CEP: </p><p class='ms-2 fs-5'>" . $organizacaoSolo['cepOrganizacaoEvento'] . "</p>";
        $html_info .= "</div>";
        $html_info .= "<div class='d-flex m-0 justify-content-between' style='height: 30px;'>";
        $html_info .= "<div class='d-flex'>";
        $html_info .= "<p class='m-0 fw-bold fs-5'>Endereço: </p><p class='ms-2 fs-5'>" . $organizacaoSolo['enderecoOrganizacaoEvento'] . "</p>";
        $html_info .= "</div>";
        $html_info .= "<div class='me-auto ms-auto d-flex'>";
        $html_info .= "<p class='m-0 fw-bold fs-5'>Nº: </p><p class='ms-2 fs-5'>" . $organizacaoSolo['numeroOrganizacaoEvento'] . "</p>";
        $html_info .= "</div>";
        $html_info .= "</div>";
        $html_info .= "<div class='d-flex m-0' style='height: 30px;'>";
        $html_info .= "<p class='m-0 fw-bold fs-5'>Complemento: </p><p class='ms-2 fs-5'>" . $organizacaoSolo['complementoOrganizacaoEvento'] . "</p>";
        $html_info .= "</div>";
        $html_info .= "<div class='d-flex m-0' style='height: 30px;'>";
        $html_info .= "<p class='m-0 fw-bold fs-5'>Bairro: </p><p class='ms-2 fs-5'>" . $organizacaoSolo['bairroOrganizacaoEvento'] . "</p>";
        $html_info .= "</div>";
        $html_info .= "<div class='d-flex m-0 justify-content-between' style='height: 30px;'>";
        $html_info .= "<div class='d-flex'>";
        $html_info .= "<p class='m-0 fw-bold fs-5'>Cidade: </p><p class='ms-2 fs-5'>" . $organizacaoSolo['cidadeOrganizacaoEvento'] . "</p>";
        $html_info .= "</div>";
        $html_info .= "<div class='me-auto ms-auto d-flex'>";
        $html_info .= "<p class='m-0 fw-bold fs-5'>UF: </p><p class='ms-2 fs-5'>" . $organizacaoSolo['ufOrganizacaoEvento'] . "</p>";
        $html_info .= "</div>";
        $html_info .= "</div>";
        $html_info .= "<div class='d-flex m-0' style='height: 30px;'>";
        $html_info .= "<p class='m-0 fw-bold fs-5'>E-mail: </p><p class='ms-2 fs-5'>" . $organizacaoSolo['emailOrganizacaoEvento'] . "</p>";
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
    <title>Análise Pendente</title>
    <link rel="stylesheet" href="../../css/styleAdm.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"> <!-- CSS Projeto -->
</head>
<body>
    <?php
    session_start();

    // Verificar se o índice 'Autenticado' existe ou é igual a 'SIM'
    if (!isset($_SESSION['AutenticaoAdm']) || $_SESSION['AutenticaoAdm'] != 'SIM') {
      // Redirecionar para o login com um erro2 se não estiver autenticado
      header('Location: login.php?login=erro2');
      exit();
    }
  
    //o usuário está autenticado
    $authUser = $_SESSION['userAdm'];
  
    $nomeAdm = $authUser['nomeAdmin'];
    include('../Componentes/header.php');
    ?>
    <div class="container-fluid vw-100">
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
        <div class="row vw-100">
            <?php
                include('../Componentes/menu.php')
            ?>
            <div class="info-box col-md-9 pt-4" style="color: #a6a6a6;" id="data-box">
                <h1 class="text-center mt-4">Análise de registro - Pendente</h1>
                <div class="container mt-5" style="height: 40px;">
                    
                </div>
                
                <div class="row ms-4 me-5 mt-4">
                    <table class="">
                        <thead>
                        <tr id="data-table">
                            <th class="col-md-1 fs-4">ID</th>
                            <th class="col-md-3 fs-4">Nome</th>
                            <th class="col-md-3 fs-4">E-mail</th>
                            <th class="col-md-3 fs-4">CNPJ</th>
                            <th class="text-center col-md-1 fs-4">Informações</th>
                            <th class="col-md-2 fs-4 text-center">Aceitar</th>
                            <th class="text-center col-md-1 fs-4">Negar</th>

                        </tr>
                        <?php foreach ($organizacao as $organizacao) : 
                            if($organizacao['idSituacaoOrganizacaoEvento'] == 1){
                            ?>
                                <tr class="mt-1">
                                    <td class="fs-5 pt-3"><?= $organizacao['idOrganizacaoEvento']; ?></td>
                                    <td class="fs-5 pt-3"><?= $organizacao['nomeOrganizacaoEvento']; ?></td>
                                    <td class="fs-5 pt-3"><?= $organizacao['emailOrganizacaoEvento']; ?></td>
                                    <td class="fs-5 pt-3"><?= $organizacao['cnpjOrganizacaoEvento']; ?></td>
                                    <td class="text-center pt-3">
                                        <a class="dropdown-item" onclick="mostrarInfo(<?=$organizacao['idOrganizacaoEvento']?>)">
                                            <img src="../../img/Admin/info-icon.png" alt="" style="width: 40px;">
                                        </a>
                                    </td>
                                    <td class="text-center pt-3">
                                    <a class="dropdown-item" onclick="modalAceitar(<?=$organizacao['idOrganizacaoEvento']?>, 'idAceitar')">
                                        <img src="../../img/Admin/aceitar-icon.png" alt="" style="width: 30px;">
                                        </a>
                                    </td>
                                    <td class="text-center pt-3">
                                    <a class="dropdown-item" onclick="modalRemover(<?=$organizacao['idOrganizacaoEvento']?>,'idDeletar')">
                                        <img src="../../img/Admin/excluir-icon.png" alt="" style="width: 30px;">
                                        </a>
                                    </td>
                                </tr>
                            <?php 
                            }
                                endforeach; ?>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="modal fade" id="modalInfo" role="dialog"data-bs-backdrop="false"    >
                        <div class=" modal-dialog modal-dialog-centered">
                            <div class="modal-content ">
                                <div class="modal-header infoModalHeader">
                                    <h1 class="modal-title fs-3" id="exampleModalLabel">Informações da Organização</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="color: #a6a6a6;">
                                    <form id = "informacoes" method="post">
                                        <input type="hidden" class="form-control" id="idInfo" name="id" type="text">
                                        <div class="d-flex m-0" style="height: 30px;">
                                            <p class="m-0 fw-bold fs-5">Nome da Organização: </p> <p class="ms-2 fs-5" >aa</p>
                                        </div>
                                        <div class="d-flex m-0" style="height: 30px;">
                                            <p class="m-0 fw-bold fs-5">CNPJ: </p><p class="ms-2 fs-5">aaa</p>
                                        </div>
                                        <div class="d-flex m-0" style="height: 30px;">
                                            <p class="m-0 fw-bold fs-5">CEP: </p><p class="ms-2 fs-5">aaa</p>
                                        </div>
                                        <div class="d-flex m-0 justify-content-between" style="height: 30px;">
                                            <div class="d-flex">
                                                <p class="m-0 fw-bold fs-5">Endereço: </p><p class="ms-2 fs-5">aaa</p>
                                            </div>
                                            <div class="me-auto ms-auto d-flex">
                                                <p class="m-0 fw-bold fs-5">Nº: </p><p class="ms-2 fs-5">000</p>
                                            </div>
                                        </div>
                                        <div class="d-flex m-0" style="height: 30px;">
                                            <p class="m-0 fw-bold fs-5">Complemento: </p><p class="ms-2 fs-5">Rua dos coitados</p>
                                        </div>
                                        <div class="d-flex m-0" style="height: 30px;">
                                            <p class="m-0 fw-bold fs-5">Bairro: </p><p class="ms-2 fs-5">aaa</p>
                                        </div>
                                        <div class="d-flex m-0 justify-content-between" style="height: 30px;">
                                            <div class="d-flex">
                                                <p class="m-0 fw-bold fs-5">Cidade: </p><p class="ms-2 fs-5">aaa</p>
                                            </div>
                                            <div class="me-auto ms-auto d-flex">
                                                <p class="m-0 fw-bold fs-5">UF: </p><p class="ms-2 fs-5">000</p>
                                            </div>
                                        </div>
                                        <div class="d-flex m-0" style="height: 30px;">
                                            <p class="m-0 fw-bold fs-5">E-mail: </p><p class="ms-2 fs-5">aaa</p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
            </div>
            <div class="modal fade" id="modalAceitar" role="dialog"data-bs-backdrop="false"    >
                        <div class=" modal-dialog modal-dialog-centered">
                            <div class="modal-content ">
                                <div class="modal-body" style="color: #a6a6a6;">
                                    <form action="process.php" method="post">
                                        <input type="hidden" class="form-control" id="idAceitar" name="id" type="text">
                                        <h1 class="text-center fs-2 fw-bold">Aceitar o cadastro<br> da organização?</h1>
                                        <p class="fs-5 m-0">Quando clicar em <span style="text-decoration: underline; color:#93CC4C">aceitar</span> 
                                        a organização receberá um e-mail de acesso para concluír o seu cadastro.</p>
                                        <div class="d-flex justify-content-between mt-5"> 
                                            <a href="" class="fs-4 mt-auto mb-2" style="color: #6D9EAF">Cancelar</a>
                                            <button type="submit" class="btn-adm rounded rounded-3 border-0 fs-4 col-3" value="ACEITAR" name="acao">Aceitar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
            </div>
            <div class="modal fade" id="modalExcluir" role="dialog"data-bs-backdrop="false"    >
                        <div class=" modal-dialog modal-dialog-centered">
                            <div class="modal-content ">
                                <div class="modal-body" style="color: #a6a6a6;">
                                    <form action="process.php" method="post">
                                        <input type="text" class="form-control" id="idDeletar" name="id" type="text">
                                        <h1 class="text-center fs-2 fw-bold">Negar cadastro<br> da organização?</h1>
                                        <p class="fs-5 m-0">Quando clicar em <span style="text-decoration: underline; color:#FF3131">negar</span> a
                                         ação não poderá ser desfeita, deixando a organização impossibilitada de  se registrar no site.</p>
                                            <div class="d-flex justify-content-between mt-5"> 
                                            <a href="" class="fs-4 mt-auto mb-2" style="color: #6D9EAF">Cancelar</a>
                                            <button type="submit" class="btn-adm rounded rounded-3 border-0 fs-4 col-3" value="NEGAR" name="acao">Excluir</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
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
        function mostrarInfo(idOrganizacaoEvento){
            enviarIdOrganizacao(idOrganizacaoEvento);
            modalInfo(idOrganizacaoEvento, 'idInfo');
        }
    </script>
</body>
</html>