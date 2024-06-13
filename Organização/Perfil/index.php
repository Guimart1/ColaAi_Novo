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

    $imagemPerfil = ''; // Defina a variável como vazia inicialmente
    $imagemBanner = ''; // Defina a variável como vazia inicialmente

    if ($organizacao && isset($organizacao['imagemOrganizacaoEvento'])) {
        // Se o usuário tiver uma imagem de perfil, atribua à variável $imagemPerfil
        $imagemPerfil = $organizacao['imagemOrganizacaoEvento'];
    }
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
                    <li><a class="dropdown-item" onclick="modalBannerPerfil(0,0)">Banner</a></li>
                    <hr class="dropdown-divider">
                    <li><a class="dropdown-item" onclick="modalFotoPerfil(0,0)">Foto do perfil</a></li>
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
                    <img src="../../img/Organizacao/<?= $organizacao['imagemOrganizacaoEvento'] ? $organizacao['imagemOrganizacaoEvento'] : 'userPadrao.png'; ?>"alt="" style="border-radius: 50%; height:80%; height:80%" class="mt-auto mb-auto" >
                    
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
    <div class="modal fade" id="modalFotoPerfil" role="dialog"><!--modal foto perfil-->
        <div class=" modal-dialog modal-dialog-centered">
            <div class="modal-content rounded rounded-5 pb-4" style="background-color: #FFFBE7;">
                <div class="modal-header border-0 pt-4 m-0 p-0 pb-2">
                    <h1 class="modal-title fs-4 ps-5" id="exampleModalLabel">Adicione uma foto ao perfil</h1>
                    <button type="button" class="btn-close me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5 pt-0 pb-1" style="color: #a6a6a6; text-align:justify">
                    <p>A sua foto de perfil ficará visível para os perfis deorganizações e administradores do Cola Aí.</p>
                    <form method="post" action="./processFotoPerfil.php" enctype="multipart/form-data">
                        <input type="hidden" name="imagemOrganizacaoEvento" id="imagemOrganizacaoEvento" placeholder="nome foto" value="<?= $imagemPerfil ?>">
                        <input type="hidden" name="idOrganizacaoEvento" id="idOrganizacaoEvento" placeholder="id do Organizacao Evento" value="<?= isset($authUserOrg['idOrganizacaoEvento']) ? $authUserOrg['idOrganizacaoEvento'] : '' ?>" readonly>
                        <label for="imagemOrganizacaoEvento" class="d-flex justify-content-center" style="cursor: pointer; color: #6D9EAF;">
                            <img id="preview" src="../../img/Organizacao/<?= $imagemPerfil != "" ? $imagemPerfil : 'add-foto.png'; ?>" id="imagemOrganizacaoEvento" name="imagemOrganizacaoEvento" alt="foto perfil" style="height: 250px; width: 250px;" class="mt-1">
                        </label>
                        <div class="row inputFile text-center">
                            <label for="foto" class="form-label mt-1">Carregar Imagem</label>
                            <input type="file" id="foto" name="foto" accept="image/*" class="form-control mt-1 mb-4">
                        </div>
                        <div class="btnModal w-100 mt-4 d-flex">
                            <button type="submit" class="border border-0 ms-auto rounded rounded-5" value="ATUALIZAR" name="acao">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalBannerPerfil" role="dialog"><!--modal foto BANNER-->
        <div class=" modal-dialog modal-dialog-centered">
            <div class="modal-content rounded rounded-5 pb-4 overflow-auto" style="background-color: #FFFBE7; height: 550px">
                <div class="modal-header border-0 pt-4 m-0 p-0 pb-2">
                    <h1 class="modal-title fs-4 ps-5" id="exampleModalLabel">Adicione um banner ao perfil</h1>
                    <button type="button" class="btn-close me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5 pt-0 pb-1" style="color: #a6a6a6; text-align:justify">
                    <p>O seu banner ficará visível para os perfis de organizações e administradores do Cola Aí.</p>
                    <form method="post" action="./processBannerPerfil.php" enctype="multipart/form-data">
                        <input type="hidden" name="imagemBannerUsuario" id="imagemBannerUsuario" placeholder="nome foto" value="<?= $imagemBanner ?>">
                        <input type="hidden" name="idUsuario" id="idUsuario" placeholder="id" value="<?= isset($authUser['idUsuario']) ? $authUser['idUsuario'] : '' ?>" readonly>
                        <label for="imagemBannerUsuario" class="d-flex justify-content-center" style="cursor: pointer; color: #6D9EAF;">
                            <img id="previewBanner" src="../../img/Usuario/<?= $imagemBanner != "" ? $imagemBanner : 'add-banner.png'; ?>" id="imagemBannerUsuario" name="imagemBannerUsuario" alt="foto de Capa" style="width: 80%; min-width:250px; height:200px;" class="mt-5">
                        </label>
                        <div class="row inputFile text-center">
                            <label for="banner" class="form-label m-1">Carregar Imagem</label>
                            <input type="file" id="banner" name="banner" accept="image/*" class="form-control mt-1 mb-4">
                        </div>
                        <div class="btnModal w-100 mt-4 d-flex">
                            <button type="submit" class="border border-0 ms-auto rounded rounded-5" value="ATUALIZAR" name="acao">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../../js/modal.js"></script>
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