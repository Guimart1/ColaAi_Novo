<?php
require_once '../../dao/UserDao.php';
require_once '../../dao/InteresseEventoDao.php';
require_once '../../dao/SeguirOrganizacaoDao.php';

$user = new UserDao();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuário - Cola Aí</title>
    <link rel="stylesheet" href="../../css/styleAdm.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css'>
    <link rel="stylesheet" href="../../css/styleUsuario.css">
    <link rel="stylesheet" href="../../css/styleUsuarioCadastro.css">
    <!-- <link rel="stylesheet" href="node_modules/@glidejs/glide/dist/css/glide.core.min.css"> -->
    <link rel="stylesheet" href="../../css/glide.core.min.css">
    <link rel="stylesheet" href="../../css/glide.theme.css">
</head>

<body class="fundo-bolinha2">
    <?php
    // Iniciar a sessão
    session_start();

    // Verificar se o índice 'Autenticado' existe ou é igual a 'SIM'
    if (!isset($_SESSION['AutenticaoUser']) || $_SESSION['AutenticaoUser'] != 'SIM') {
        // Redirecionar para o login com um erro2 se não estiver autenticado
        header('Location: login.php?login=erro2');
        exit();
    }

    //o usuário está autenticado
    $authUser = $_SESSION['user'];

    $idUsuario = $authUser['idUsuario']; // Supondo que o ID do usuário está armazenado na sessão

    // Busque os eventos em que o usuário registrou interesse
    $eventosInteresse = InteresseEventoDao::selectByUsuario($idUsuario);
    $dadosUser = UserDao::selectById($idUsuario);

    //Para Ver quem o usuário está seguindo
    $seguindoOrganizacao = SeguirOrganizacaoDao::selectByUsuario(($idUsuario));
    //var_dump($seguindoOrganizacao);

    //var_dump($eventosInteresse);
    // Verifique se o usuário já tem uma foto de perfil
    $imagemPerfil = ''; // Defina a variável como vazia inicialmente
    $imagemBanner = ''; // Defina a variável como vazia inicialmente

    if ($dadosUser && isset($dadosUser['imagemPerfilUsuario'])) {
        // Se o usuário tiver uma imagem de perfil, atribua à variável $imagemPerfil
        $imagemPerfil = $dadosUser['imagemPerfilUsuario'];
    }
    if ($dadosUser && isset($dadosUser['imagemBannerUsuario'])) {
        // Se o usuário tiver uma imagem de banner, atribua à variável $imagemBanner
        $imagemBanner = $dadosUser['imagemBannerUsuario'];
    }
    ?>

    <?php
    require_once('../Componentes/headerLogado.php');
    require_once('../Componentes/modalEditarPerfil.php');
    ?>

    <!-- O banner está em background-image -->
    <!-- Os usuários deverão colocar um banner com proporções específicas -->
    <!-- Ao juntar com o banco, tornar background-position como center -->
    <div class="row d-flex align-items-center justify-content-center" style="height:44vh; margin-bottom:225px; position: relative;">
        <img src="../../img/Usuario/<?= $imagemBanner != "" ? $imagemBanner : 'banner-padrao.png'; ?>" class="img-fluid" alt="Alterar imagem" style="height: 100%; width: 100%; position: absolute; object-fit: cover;">
        <div class="w-100 d-flex align-items-center justify-content-end" style="z-index: 1; margin-top: 33vh;">
            <div class="w-100 d-flex align-items-center justify-content-start" style="height:auto;">
                <div class="d-flex align-items-end justify-content-start" style="width: 200px; height: 200px; margin-left: 5vw; position:relative;">
                    <div class="d-flex align-items-end justify-content-end">
                        <img src="../../img/Usuario/<?= $imagemPerfil != "" ? $imagemPerfil : 'icon-user.png'; ?>" alt="imagem Perfil" style="border-radius: 100%; height: 200px; width: 200px;">
                        <div class="d-flex align-items-center justify-content-center" style="width: 30px; height: 30px; position:absolute;  margin-right: 20px; margin-bottom: 20px">
                            <ul class="m-0 p-0" onclick="modalFotoPerfil(0,0)" style="list-style: none; font-weight: bold; cursor:pointer;">
                                <li><img src="../../img/Usuario/icon-editar.png" class="img-fluid" alt="Alterar imagem" style="height: auto; width: auto;"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-start justify-content-center flex-column" style="width: 75%; height: 100px; position:relative; margin-top: 100px">
                    <ul class="m-0 p-0" style="list-style: none; font-weight: bold;">
                        <li>
                            <h2 style="font-weight: bold; color: #FFD932">
                                <?php
                                // Exibir o nome do usuário se estiver autenticado
                                if (isset($authUser['nomeUsuario'])) {
                                    echo $authUser['nomeUsuario'];
                                } else {
                                    echo "Nome de Usuário";
                                }
                                ?>
                            </h2>
                        </li>
                    </ul>
                    <ul class="m-0 p-0" onclick="modalSeguindo(0,0)" style="list-style: none; font-weight: bold; cursor:pointer;">
                        <li>
                            <h4 style="font-weight: bold; color: #A6A6A6">Seguindo <?php echo count($seguindoOrganizacao); ?> </h4>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="d-flex align-items-center justify-content-center" style="width: 30px; height: 30px; position:absolute;  margin-right: 20px; margin-bottom: 100px;">
                <ul class="m-0 p-0" onclick="modalBannerPerfil(0,0)" style="list-style: none; font-weight: bold; cursor:pointer;">
                    <li><img src="../../img/Usuario/icon-editar.png" class="img-fluid" alt="Alterar imagem" style="height: auto; width: auto;"></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container mt-4" style="width: 80%;">
        <div class="glide mb-5" data-glide='{}'>
            <?php if (empty($eventosInteresse)) : ?>
                <div class="alert alert-warning" role="alert">
                    Parece que você ainda não registrou interesse em nenhum evento.
                </div>
            <?php else : ?>
                <h2 class="fs-3">Eventos que foram registrados interesse</h2>
                <div class="glide mb-5 carrossel" data-glide='{
            "loop": true,
            "perView": 4,
            "perMove": 4,
            "perSwipe": 4,
            "perTouch": 4,
            "gap":20,
            "type": "carousel",
            "breakpoints": {
                "600": {"perView": 1},
                "800": {"perView": 2},
                "1370": {"perView": 3}
            }
        }'>
                    <div class="glide__track" data-glide-el="track">
                        <ul class="glide__slides">
                            <?php foreach ($eventosInteresse as $interesse) : ?>
                                <li class="glide__slide">
                                    <a href="../Evento/evento.php?id=<?= $interesse['idEvento']; ?>">
                                    <div class="imageBox position-relative" style="width: 100%; height: 200px;">
                                        <div class="d-flex align-items-start justify-content-start" style="width: 30px; height: 30px; position:absolute; margin:10px;">
                                            <!--<img src="../../img/Usuario/icon-coracao.png" class="img-fluid" style="height: auto; width: auto; border-radius: 0px">-->
                                        </div>
                                        <!-- Aqui você pode exibir os detalhes do evento -->
                                        <img src="../../img/Organizacao/<?= $interesse['imagemEvento']; ?>" alt="Imagem do Evento" style="width: 100%; height:100%; object-fit:cover">
                                        <div class="descMini p-2 ps-4">
                                            <h3 class="fs-5 tituloEvento"><?= $interesse['nomeEvento']; ?></h3>
                                            <p><?= $interesse['descEvento']; ?></p>
                                        </div>
                                    </div>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="glide__arrows" data-glide-el="controls">
                        <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><img src="../../img/Usuario/arrow-previus.png" alt=""></button>
                        <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><img src="../../img/Usuario/arrow-next.png" alt=""></button>
                    </div>
                    <div class="glide__bullets" data-glide-el="controls[nav]">
                        <button class="glide__bullet" data-glide-dir="=0"></button>
                        <button class="glide__bullet" data-glide-dir="=1"></button>
                        <button class="glide__bullet" data-glide-dir="=2"></button>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php
    require_once('../Componentes/footerLogado.php');
    require_once('../Componentes/modalFeedback.php');
    require_once('../Componentes/modalContato.php');
    require_once('../Componentes/modalSobre.php');
    ?>
    
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
                        <input type="hidden" name="imagemPerfilUsuario" id="imagemPerfilUsuario" placeholder="nome foto" value="<?= $imagemPerfil ?>">
                        <input type="hidden" name="idUsuario" id="idUsuario" placeholder="id do usuario" value="<?= isset($authUser['idUsuario']) ? $authUser['idUsuario'] : '' ?>" readonly>
                        <label for="imagemPerfilUsuario" class="d-flex justify-content-center" style="cursor: pointer; color: #6D9EAF;">
                            <img id="preview" src="../../img/Usuario/<?= $imagemPerfil != "" ? $imagemPerfil : 'add-foto.png'; ?>" id="imagemPerfilUsuario" name="imagemPerfilUsuario" alt="foto perfil" style="height: 250px; width: 250px;" class="mt-1">
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
    </div>
    <!--<div class="modal fade" id="modalDadosPessoais" role="dialog">
        <div class=" modal-dialog modal-dialog-centered">
            <div class="modal-content rounded rounded-5 pb-4" style="background-color: #FFFBE7;">
                <div class="modal-header border-0 pt-4 m-0 p-0 pb-2">
                    <h1 class="modal-title fs-4 ps-5" id="exampleModalLabel">Dados Pessoais</h1>
                    <button type="button" class="btn-close me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5 pt-0 pb-1" style="color: #a6a6a6; text-align:justify">
                    <p>O Cola Aí utiliza esses dados para manter sua segurança e elegibilidade de perfil único.</p>
                    <form method="post" action="./processFeedBack.php">
                        <input type="hidden" name="idUsuario" id="idUsuario" placeholder="id da organização" value="<?= isset($authUser['idUsuario']) ? $authUser['idUsuario'] : '' ?>" readonly>
                        <h2 class="fs-5 mt-3">Nome</h2>
                        <div class="inputContato">
                            <input type="text" class="input-group mt-1" name="nomeUsuario" placeholder="Nome do usuário">
                        </div>
                        <h2 class="fs-5 mt-3">E-mail</h2>
                        <div class="inputContato">
                            <input type="text" class="input-group mt-1" name="emailUsuario" placeholder="E-mail do usuário">
                        </div>
                        <h2 class="fs-5 mt-3">Senha</h2>
                        <div class="inputContato d-flex">
                            <input required type="password" placeholder="Senha" name="senha" id="password" class="input-group mb-4" style="font-weight: 600; color: #a6a6a6">
                            <i class="bi bi-eye col1" id="btnSenha" onclick="MostrarSenha()"></i>
                        </div>
                        <div class="btnModal w-100 mt-4 d-flex">
                            <button type="submit" class="border border-0 ms-auto rounded rounded-5" value="SALVAR" name="acao">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>-->
    <div class="modal fade" id="modalSeguindo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class=" modal-dialog modal-dialog-centered">
            <div class="modal-content rounded rounded-5 pb-4 overflow-auto" style="background-color: #F4FFEB; height: 550px">
                <div class="modal-header border-0 pt-4 m-0 p-0 pb-2 d-flex align-items-center">
                    <h1 class="modal-title fs-2 ps-3" id="exampleModalLabel" style="color: #E6AEB2; font-weight: bold">SE</h1>
                    <h1 class="modal-title fs-2" id="exampleModalLabel" style="color: #6D9EAF; font-weight: bold">GUIN</h1>
                    <h1 class="modal-title fs-2" id="exampleModalLabel" style="color: #93CC4C; font-weight: bold">DO</h1>
                    <button type="button" class="btn-close me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-0 pb-1">
                    <?php foreach ($seguindoOrganizacao as $seguindo) : ?>
                        <div class="row d-flex mt-4 align-items-center">
                            <div class="col-md-4">
                                <img src="../../img/Organizacao/<?= $seguindo['imagemOrganizacaoEvento']; ?>" class="img-fluid" alt="Alterar imagem" style="border-radius: 90px; height: 125px; width: 125px;">
                            </div>
                            <div class="col-md-8">
                                <a href="../PerfilOrganização/index.php?id=<?= $seguindo['idOrganizacaoEvento']; ?>" style="color: #a6a6a6; text-decoration:none"><h2 class="fs-5 "><?= $seguindo['nomeOrganizacaoEvento']; ?></h2></a>
                                <p><?= $seguindo['descOrganizacaoEvento']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!--<div class="row d-flex mt-4 align-items-center">
                        <div class="col-md-4">
                            <img src="../../img/Usuario/org-magma.png" class="img-fluid" alt="Alterar imagem" style="border-radius: 90px; height: auto; width: 125px;">
                        </div>
                        <div class="col-md-8">
                            <h2 class="fs-5 ">Magma</h2>
                            <p>A Magma é uma empresa voltada a tecnologia.</p>
                        </div>
                    </div>
                    <div class="row d-flex mt-4 align-items-center">
                        <div class="col-md-4">
                            <img src="../../img/Usuario/org-ceu.png" class="img-fluid" alt="Alterar imagem" style="border-radius: 90px; height: auto; width: 125px;">
                        </div>
                        <div class="col-md-8">
                            <h2 class="fs-5">CEU Jambeiro</h2>
                            <p>O CEU Jambeiro é uma escola feita pela prefeitura de São Paulo onde se há diversos cursos e eventos para a família.</p>
                        </div>
                    </div>
                    <div class="row d-flex mt-4 align-items-center">
                        <div class="col-md-4">
                            <img src="../../img/Usuario/org-centro.png" class="img-fluid" alt="Alterar imagem" style="border-radius: 90px; height: auto; width: 125px;">
                        </div>
                        <div class="col-md-8">
                            <h2 class="fs-5 ">Centro Cultural Cidade Tiradentes</h2>
                            <p>O Centro de Formação Cultural Cidade Tiradentes é o maior equipamento cultural da Prefeitura de São Paulo na Zona Leste da cidade.</p>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
    <script type="text/javascript" src="../../js/personalizar.js"></script>
    <script type="text/javascript" src="../../js/modal.js"></script>
    <script type="text/javascript" src="../../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script>
        const COMPONENT_NAME = "data-glide";
        const COMPONENT_SELECTOR = `[${COMPONENT_NAME}]`;
        const components = document.querySelectorAll(COMPONENT_SELECTOR);
        for (let i = 0; i < components.length; i++) {
            const options = JSON.parse(
                components[i].getAttribute(COMPONENT_NAME) || "{}"
            );
            let glide = new Glide(
                components[i],
                options
            );
            console.log(glide)
            glide.mount();
        }
    </script>
    <script>  
        let nav = document.getElementById("nav")
        var i = 0

        function toggleNav() {
            if (i == 0) {
                nav.classList.add("navbarActive-on");
                nav.classList.remove("navbarActive-off");
                i = 1
            } else {
                nav.classList.add("navbarActive-off");
                nav.classList.remove("navbarActive-on");
                i = 0
            }
        }
    </script>
</body>

</html>