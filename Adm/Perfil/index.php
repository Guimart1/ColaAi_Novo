<?php
require_once '../../dao/UserAdmDao.php';
$userAdmDao = new UserAdmDao();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Adiministrador</title>
    <link rel="stylesheet" href="../../css/styleAdm.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css'>

</head>

<body>
    <?php
    // Iniciar a sessão
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

    // Buscar dados do usuário administrador pelo ID (você precisa passar o ID do usuário)
    $idUsuarioAdm = $_SESSION['userAdm']['idAdmin']; // Supondo que o ID do usuário esteja na sessão
    $userAdm = $userAdmDao->selectById($idUsuarioAdm);
    ?>

    <?php
    include('../Componentes/header.php');
    ?>
    <div class="container-fluid vw-100">

    <div class="hamburger-wrapper">
                    <div class="hamburger" onclick="toggleSidebar(),  toggleHamburger()">
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
        <?php
        include('../Componentes/menu.php')
        ?>
        <!-- Hamburger -->
    </div>
    <div class="first-div">
        <img src="../../img/Admin/<?= $authUser['fotoPerfilAdmin'] ? $authUser['fotoPerfilAdmin'] : 'userPadrao.png'; ?>" style="width:100% ;heigh:100%"> 
    </div>
    <div class="second-div">
        <div class="third-div">
        <img src="../../img/Admin/<?= $authUser['fotoPerfilAdmin'] ? $authUser['fotoPerfilAdmin'] : 'userPadrao.png'; ?>" style="width:100% ;heigh:100%"> 

        </div>
        <div class="four-div">
            <div class="five-div">
                <?php if ($userAdm !== false): ?>
                    <h4 class="organization-name"><?php echo $userAdm['nomeAdmin']; ?></h4>
                    <!-- <h2 class="organization-description"></h2> -->
                    <?php else: ?>
                        <p>Não foi possível carregar os dados do usuário administrador.</p>
                    <?php endif; ?>
            </div>
        </div>
        <div class="dropdown">
            <div class=" d-flex h-auto p-2 mb-3">
                <a href="" class="ms-auto me-0" style="width: 45px;" class="text-white d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../../img/Admin/editar-icon.png" alt="" class="ms-auto me-2" style="width: 45px;">
                </a>
                <ul class="dropdown-menu text-small">
                    <li>
                        <a class="dropdown-item" href="./register.php">Alterar Dados</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
