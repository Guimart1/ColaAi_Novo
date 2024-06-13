<?php
require_once '../../dao/EventoDao.php';
require_once '../../dao/OrganizacaoDao.php';
require_once '../../dao/UserDao.php';

$totalEventos = EventoDao::countTotalEvents();
$totalOrganizacoes = OrganizacaoDao::countAll();
$totalUsuarios = UserDao::getTotalUsuarios();
$totalOrganizacoesSituacao1 = OrganizacaoDao::countOrganizacoesComSituacao1();
$ultimosEventos = EventoDao::getLastFiveEvents();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../../css/styleAdm.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css'>
</head>
<body>
    <?php
    session_start();

    if (!isset($_SESSION['AutenticaoAdm']) || $_SESSION['AutenticaoAdm'] != 'SIM') {
        header('Location: login.php?login=erro2');
        exit();
    }

    $authUser = $_SESSION['userAdm'];
    $nomeAdm = $authUser['nomeAdmin'];

    date_default_timezone_set('America/Sao_Paulo');
    $horaAtual = date('H');
    $saudacao = '';
    if ($horaAtual < 12) {
        $saudacao = 'Bom dia';
    } elseif ($horaAtual < 18) {
        $saudacao = 'Boa tarde';
    } else {
        $saudacao = 'Boa noite';
    }
    ?>
    <?php include('../Componentes/header.php'); ?>
    <?php include('../Componentes/menu.php'); ?>
    <div class="container mt-4" id="data-box" style="color: #a6a6a6;">
        <div class="hamburger-wrapper text-center">
            <div class="hamburger" onclick="toggleSidebar(), toggleHamburger()">
                <input class="checkbox" type="checkbox" />
                <svg fill="none" viewBox="0 0 50 50" height="50" width="50">
                    <path class="lineTop line" stroke-linecap="round" stroke-width="4" stroke="black" d="M6 11L44 11"></path>
                    <path stroke-linecap="round" stroke-width="4" stroke="black" d="M6 24H43" class="lineMid line"></path>
                    <path stroke-linecap="round" stroke-width="4" stroke="black" d="M6 37H43" class="lineBottom line"></path>
                </svg>
            </div>
        </div>
        <h1 class="text-center mt-2 fs-3"><?php echo $saudacao . ', ' . $nomeAdm . '! Bem-vindo ao Dashboard'; ?></h1>
        <div class="row justify-content-center mt-4">
            <div class="col-md-3 rounded-5 text-center p-3 m-2" id="info-box">
                <h2 class="fs-5 pb-0">Quantidade de Eventos Cadastrados</h2>
                <p class="fs-5">+ <?php echo $totalEventos; ?> eventos</p>
            </div>
            <div class="col-md-3 rounded-5 text-center p-3 m-2" id="info-box">
                <h2 class="fs-5 pb-0">Quantidade de Organizações Cadastradas</h2>
                <p class="fs-5">+ <?php echo $totalOrganizacoes; ?> organizações</p>
            </div>
            <div class="col-md-3 rounded-5 text-center p-3 m-2" id="info-box">
                <h2 class="fs-5 pb-0">Quantidade de Usuários Cadastrados</h2>
                <p class="fs-5">+ <?php echo $totalUsuarios; ?> usuários</p>
            </div>
            <div class="col-md-3 rounded-5 text-center p-3 m-2" id="info-box">
                <h2 class="fs-5 pb-0">Quantidade de Organizações com Situação Pendente</h2>
                <p class="fs-5">+ <?php echo $totalOrganizacoesSituacao1; ?> organizações</p>
            </div>
           
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 m-2">
                <h2 class="fs-4 p-3 pb-0">Lista dos últimos cinco eventos cadastrados</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nome do Evento</th>
                            <th scope="col">Organização Responsável</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ultimosEventos as $evento) : ?>
                            <tr>
                                <td><?php echo $evento['nomeEvento']; ?></td>
                                <td><?php echo $evento['nomeOrganizacaoEvento']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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
            var hamburger = document.querySelector('.hamburger');
            hamburger.classList.toggle('showHamburger');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
