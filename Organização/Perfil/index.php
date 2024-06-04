<?php
require_once '../../dao/OrganizacaoDao.php';
$organizacaoDao = new OrganizacaoDao();
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
    // Iniciar a sessão
    session_start();

    // Verificar se o índice 'Autenticado' existe ou é igual a 'SIM'
    if (!isset($_SESSION['AutenticaoOrg']) || $_SESSION['AutenticaoOrg'] != 'SIM') {
        // Redirecionar para o login com um erro2 se não estiver autenticado
        header('Location: loginEmail.php?login=erro2');
        exit();
    }

    //o usuário está autenticado
    $authUserOrg = $_SESSION['userOrg'];
    // Buscar dados da organização pelo ID (você precisa passar o ID da organização)
    $idOrganizacao = $_SESSION['userOrg']['idOrganizacaoEvento']; // Supondo que o ID da organização esteja na sessão
    $organizacao = $organizacaoDao->selectById($idOrganizacao);
    ?>

    <?php
    include('../Componentes/header.php');
    ?>
    <div class="container-fluid vw-100">

        <!-- Hamburger -->
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
        <?php
        include('../Componentes/menu.php')
        ?>
        <!-- Hamburger -->
    </div>
        <div class="container-fluid d-flex justify-content-start align-items-center flex-column" style="background-color: #E8E8E8; height:91vh; width:100vw"> 
            <div class="headerPerfil mt-4 rounded rounded-4" style="width: 90%; height:90px; background-color:#fff" >
                <div class="textBox h-100 d-flex align-items-center justify-content-evenly rounded rounded-4 " style="background-color: #FFF7D1; width:20%">
                    <img src="../../img/Admin/icon-usuario.png" alt="" style="height: 50px; width:50px; object-fit:cover">
                    <h2 class="fs-2 m-0" style="color: #a6a6a6">Meu Perfil</h2>
                </div>
            </div>
            <div class="mt-4 rounded rounded-4" style="width: 90%; height:72vh;  background-color:#fff">
                <div class="contentPerfil d-flex rounded rounded-4"  style="background-color: #FFF7D1; width:100%; height:350px">
                <div class="dropdown">
                    <a href="#" class="text-white d-block  text-decoration-none dropdown-toggle mt-4 ms-4" data-bs-toggle="dropdown" aria-expanded="false">
                        <button type="submit" class="dropdown-item"><img src="../../img/Admin/editar-icon.png" alt="" class="ms-auto me-2" style="width: 45px;"></button>
                    </a>
                    <ul class="dropdown-menu text-small">
                    <li><a class="dropdown-item" href="">Banner</a></li>
                    <hr class="dropdown-divider">
                    <li><a class="dropdown-item" href="">Foto do perfil</a></li>
                    </ul>
                </div>
                    <div class="dropdown">
                        <form action="process.php" method="POST" >
                            <div class="d-flex h-auto p-2 mb-3">
                                <input type="hidden" class="form-control" id="acao" name="acao" value="SELECTID">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?= $organizacao['idOrganizacaoEvento'] ?>">
                            </div>
                        </form>
                    </div>
                    <img src="../../img/Organizacao/<?= $authUserOrg['imagemOrganizacaoEvento'] ? $authUserOrg['imagemOrganizacaoEvento'] : 'userPadrao.png'; ?>"alt="" style="border-radius: 50%; height:80%; height:80%" class="mt-auto mb-auto" >
                    
                    <div class="infoOrg d-flex justify-content-center flex-column ms-4">
                        <?php if ($organizacao !== false) : ?>
                            <h2 style="color: #a6a6a6"><?php echo $organizacao['nomeOrganizacaoEvento']; ?></h2>
                            <p style="color: #a6a6a6; font-size:1.2em"><?php echo $organizacao['descOrganizacaoEvento']; ?></p>
                        <?php else : ?>
                            <p>Não foi possível carregar os dados da organização.</p>
                        <?php endif; ?>
                    </div>
                    <div  class="alterarDados ms-auto mt-auto mb-4 me-5">
                    <form action="process.php" method="POST" >
                            <div class="d-flex h-auto p-2 mb-3">
                                <input type="hidden" class="form-control" id="acao" name="acao" value="SELECTID">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?= $organizacao['idOrganizacaoEvento'] ?>">
                                <button style="
                                    border:none;
                                    background-color: #FABDC1; 
                                    width:100px;
                                    height: 50px;
                                    min-height: 50px;
                                    min-width: 160px;
                                    color: #6D9EAF;
                                    font-size: 14pt;" class="rounded rounded-2">Alterar dados
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
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