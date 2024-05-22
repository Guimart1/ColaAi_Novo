<?php
require_once '../../dao/OrganizacaoDao.php';
require_once '../../dao/EventoDao.php';

$organizacao = new OrganizacaoDao();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Cola Aí</title>
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

    // Verifique se o parâmetro id está definido na URL
    if (isset($_GET['id'])) {
        // Obtém o id do evento da URL
        $idOrganizacao = $_GET['id'];
        
        // Busca os detalhes do evento com base no id do evento
        $organizacao = OrganizacaoDao::selectById($idOrganizacao);
        $eventos = EventoDao::selectByOrganizacaoIdActive($idOrganizacao);

        // Verifique se o usuário já tem uma foto de perfil
        $imagemPerfil = ''; // Defina a variável como vazia inicialmente
        //$imagemBanner = ''; // Defina a variável como vazia inicialmente
        $nomeOrg = '';
        

        if ($organizacao && isset($organizacao['imagemOrganizacaoEvento'])) {
            // Se o usuário tiver uma imagem de perfil, atribua à variável $imagemPerfil
            $imagemPerfil = $organizacao['imagemOrganizacaoEvento'];
        }

        /*if ($dadosUser && isset($dadosUser['imagemBannerUsuario'])) {
            // Se o usuário tiver uma imagem de banner, atribua à variável $imagemBanner
            $imagemBanner = $dadosUser['imagemBannerUsuario'];
        }*/

        // Verifica se o evento foi encontrado
        if ($organizacao) {

            //var_dump($eventos)
    ?>
    <?php
        } else {
            // Se o evento não foi encontrado, exibe uma mensagem de erro
            echo "<p>Organização não encontradq.</p>";
        }
    } else {
        // Se o parâmetro idOrganizacaoEvento não estiver definido na URL, exibe uma mensagem de erro
        echo "<p>Parâmetro idOrganizacaoEvento não especificado na URL.</p>";
    }
    ?>

    <?php
    require_once('../Componentes/headerLogado.php')
    ?>

    <!-- O banner está em background-image -->
    <!-- Os usuários deverão colocar um banner com proporções específicas -->
    <!-- Ao juntar com o banco, tornar background-position como center -->
    <div class="row d-flex align-items-end justify-content-center" style="height:44vh; margin-bottom:225px; position: relative;">
        <img src="../../img/Usuario/banner-padrao.png" class="img-fluid" alt="Alterar imagem" style="height: 100%; width: 100%; position: absolute; object-fit: cover;">
        <div class="w-100 d-flex align-items-end justify-content-center" style="z-index: 1; margin-top: 33vh;">
            <div class="w-100 d-flex align-items-center justify-content-start" style="height:auto;">
                <div class="d-flex align-items-end justify-content-start" style="width: 200px; height: 200px; margin-left: 5vw; position:relative;">
                    <div class="d-flex align-items-end justify-content-end">
                        <img src="../../img/Organizacao/<?= $imagemPerfil != "" ? $imagemPerfil : 'icon-user.png'; ?>" alt="imagem Perfil" style="border-radius: 100%; height: 200px; width: 200px;">
                    </div>
                </div>
                <div class="d-flex align-items-start justify-content-center flex-column" style="width: 75%; height: 100px; position:relative; margin-top: 125px;">
                    <ul class="m-0 p-0" style="list-style: none; font-weight: bold; cursor:pointer;">
                        <li>
                            <div class="d-flex flex-table">
                                <h2 style="font-weight: bold; color: #FFD932">
                                <?php
                                    // Exibir o nome do usuário se estiver autenticado
                                    if (isset($organizacao['nomeOrganizacaoEvento'])) {
                                        echo $organizacao['nomeOrganizacaoEvento'];
                                    } else {
                                        echo "Organização Eventos";
                                    }
                                    ?>
                                </h2>
                                <div class="d-flex justify-content-center align-items-center" style="width: 150px; height: 40px; background-color:#E6AEB2; margin-left: 25px; border-radius: 25px;">
                                    <h4 class="text-center" style="font-weight:normal; color:#6D9EAF">
                                        Seguir
                                    </h4>
                                </div>
                                <!--<//?php if () : ?>
                                    <div class="d-flex justify-content-center align-items-center" style="width: 150px; height: 40px; background-color:#E6AEB2; margin-left: 25px; border-radius: 25px;">
                                        <h4 class="text-center" style="font-weight:normal; color:#6D9EAF">
                                            Seguir
                                        </h4>
                                    </div>
                                <//?php else : ?>
                                    <div class="d-flex justify-content-center align-items-center" style="width: 150px; height: 40px; background-color:#6D9EAF; margin-left: 25px; border-radius: 25px;">
                                        <h4 class="text-center" style="font-weight:normal; color:#FFD932">
                                            Seguindo
                                        </h4>
                                    </div>
                                <//?php endif; ?>-->
                            </div>
                            <a href="" style="font-weight: bold; color: #6F9BAB">Site organização</a>
                        </li>
                    <ul class="m-0 p-0" onclick="modalSeguindo(0,0)" style="list-style: none; font-weight: bold; cursor:pointer;">
                        <li>
                            <h4 style="font-weight: bold; color: #A6A6A6">3 seguidores</h4>
                        </li>
                    </ul>

                </div>
            </div>

        </div>

    </div>

    <div class="container mt-4" style="width: 80%;">
        <div class="glide mb-5" data-glide='{}'>
                <!-- <div class="alert alert-warning" role="alert">
                    Esta organização ainda não publicou nenhum evento.
                </div> -->
                <h2 class="fs-3">Eventos desta organização</h2>
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
                        <?php
                // Array para armazenar os IDs dos eventos já adicionados
                            $eventos_adicionados = [];
                            

                            foreach ($eventos as $evento) :
                                // Verifica se o ID do evento já foi adicionado ao carrossel
                                if (!in_array($evento['idEvento'], $eventos_adicionados)) :
                                        
                            ?>
                                <li class="glide__slide">
                                    <a href="../Evento/evento.php?id=<?= $evento['idEvento']; ?>"> <!-- Adicione o link aqui -->
                                        <div class="imageBox position-relative" style="width: 100%; height: 200px;"> <!-- Defina a largura e altura desejadas -->
                                            <img src="../../img/Organizacao/<?= $evento['imagemEvento']; ?>" alt="Imagem do evento" style="width: 100%; height: 100%;"> <!-- Defina a largura e altura desejadas -->
                                            <div class="descMini p-2 ps-4"> <!-- Defina a largura igual à da imagem -->
                                                <h3 class="fs-4 tituloEvento"><?= $evento['nomeEvento']; ?></h3>
                                                <p><?= $evento['descEvento']; ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php
                                    // Adiciona o ID do evento ao array de eventos adicionados
                                    $eventos_adicionados[] = $evento['idEvento'];
                                endif;
                            endforeach;
                            ?>
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
        </div>
    </div>

    <?php
    require_once('../Componentes/footerLogado.php');
    require_once('../Componentes/modalFeedback.php');
    require_once('../Componentes/modalContato.php');
    require_once('../Componentes/modalSobre.php');
    ?>

    <div class="modal fade" id="modalSeguindo" role="dialog">
        <div class=" modal-dialog modal-dialog-centered">
            <div class="modal-content rounded rounded-5 pb-4" style="background-color: #F4FFEB;">
                <div class="modal-header border-0 pt-4 m-0 p-0 pb-2 d-flex align-items-center">
                    <h1 class="modal-title fs-3 ps-5" id="exampleModalLabel" style="color: #E6AEB2; font-weight: bold">SE</h1>
                    <h1 class="modal-title fs-3" id="exampleModalLabel" style="color: #6D9EAF; font-weight: bold">GUIN</h1>
                    <h1 class="modal-title fs-3" id="exampleModalLabel" style="color: #93CC4C; font-weight: bold">DO</h1>
                    <button type="button" class="btn-close me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body  pt-0 pb-1">
                    <div class="row d-flex mt-4 align-items-center">
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
                    </div>
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