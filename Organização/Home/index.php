<?php
require_once '../../dao/InteresseEventoDao.php';
require_once '../../dao/EventoDao.php';

session_start();

// Verificar se o índice 'Autenticado' existe ou é igual a 'SIM'
if (!isset($_SESSION['AutenticaoOrg']) || $_SESSION['AutenticaoOrg'] != 'SIM') {
    // Redirecionar para o login com um erro2 se não estiver autenticado
    header('Location: index.php?login=erro2');
    exit();
}

// Obtendo o ID da organização logada
$idOrganizacao = $_SESSION['userOrg']['idOrganizacaoEvento'];

// Obter o total de registros de interesse em eventos da organização
$totalInteresses = InteresseEventoDao::countByOrganization($idOrganizacao);

// Obtendo o nome da organização
$authUserOrg = $_SESSION['userOrg'];
$nomeOrg = $authUserOrg['nomeOrganizacaoEvento'];

// Obter o total de eventos cadastrados pela organização
$totalEventos = EventoDao::countEventsByOrganizacaoId($idOrganizacao);

// Obter a quantidade de eventos arquivados
$totalEventosArquivados = EventoDao::countArchivedEvents();

// Saudação com base no horário do dia
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

// Obter os cinco eventos mais registrados de interesse pela organização
$ultimosEventos = EventoDao::getTopFiveEventsWithInterest($idOrganizacao);

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
    include('../Componentes/header.php');
    ?>
    <div class="container-fluid vw-100">
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
            <div class="container mt-4" id="data-box" style="color: #a6a6a6;">
                <h1 class="text-center mt-2 fs-3"><?php echo $saudacao . ', ' . $nomeOrg . '! Bem-vindo ao Dashboard'; ?></h1>
                <div class="row justify-content-center mt-4">
                    <div class="col-md-3 rounded-5 text-center p-3 m-2" id="info-box">
                        <h2 class="fs-5 pb-0">Quantidade de Eventos Cadastrados</h2>
                        <p class="fs-5">+ <?php echo $totalEventos; ?> eventos</p>
                    </div>
                    <div class="col-md-3 rounded-5 text-center p-3 m-2" id="info-box">
                        <h2 class="fs-5 pb-0">Quantidade de Seguidores</h2>
                        <p class="fs-5">+ <?php echo $totalInteresses; ?> seguidores</p>
                    </div>
                    <div class="col-md-3 rounded-5 text-center p-3 m-2" id="info-box">
                        <h2 class="fs-5 pb-0">Quantidade Eventos Arquivados</h2>
                        <p class="fs-5">+ <?php echo $totalEventosArquivados; ?> eventos arquivados</p>
                    </div>

                </div>
                <div class="row justify-content-center mt-4">
                    <div class="col-md-10 m-2">
                        <h2 class="fs-4 p-3 pb-0">Lista dos cinco eventos mais registrados de interesse</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nome do Evento</th>
                                    <th scope="col">Quantidade de Interesses Pelo Evento</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ultimosEventos as $evento) : ?>
                                    <tr>
                                        <td><?php echo $evento['nomeEvento']; ?></td>
                                        <td><?php echo $evento['total_interesses']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
</body>

</html>
