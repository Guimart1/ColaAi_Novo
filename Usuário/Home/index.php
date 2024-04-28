<?php
require_once '../../dao/EventoDao.php';
$eventos = EventoDao::selectAll();
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
    <link rel="stylesheet" href="node_modules/@glidejs/glide/dist/css/glide.core.min.css">
    <link rel="stylesheet" href="../../css/glide.core.min.css">
    <link rel="stylesheet" href="../../css/glide.theme.css">
</head>

<body>
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
    ?>
    <div class="container mt-2 ms-2 d-flex align-items-end mb-4" style="height: 8vh;">
        <img src="../../img/Login/Cola AI logo.png" alt="" style="height: 8vh;">
        <div class="searchBox col-6 d-flex justify-content-center ms-4">
            <div class="searchInput w-100 position-relative">
                <img src="../../img/Usuario/icon-search.png" alt="">
                <input type="text" placeholder="Pesquise locais" class="rounded rounded-5 ps-5">
            </div>
        </div>
        <div class="selectValor col-1 ms-4 me-5">
            <div class="selectIn position-relative">
                <img src="../../img/Usuario/icon-valor.png" alt="">
                <select class="rounded rounded-5 d-flex align-items-center w-100 ps-5" aria-label="Default select example" style="width: 15%;">
                    <option selected>Valor</option>
                    <option value="1">Grátis</option>
                    <option value="2">Pago</option>
                </select>
                <img src="../../img/Usuario/icon-select.png" alt="" id="arrow" class="ms-2" style="cursor: pointer;">
            </div>
        </div>
        <div class="buttonSearch col-2 d-flex justify-content-center mt-auto mb-1">
            <button type="submit" class="border-0 rounded-3" style="width: 5vw;">Buscar</button>
        </div>
        <img src="../../img/Usuario/icon-notificacao.png" alt="" style="width: 30px;">
    </div>
    <div class="navigation">
        <nav>
            <ul>
                <li><a href="">Página Inicial</a></li>
                <li><a href="#carrossel-teatros">Teatros</a></li>
                <li><a href="#carrossel-parques">Parques</a></li>
                <li><a href="#carrossel-museus">Museus</a></li>
                <li><a href="#carrossel-centroCulturais">Centros Culturais</a></li>
                <li><a href="">CEU</a></li>
                <li><a href="">Perfil</a></li>
            </ul>
        </nav>
    </div>
    <div class="container mt-4" style="width: 80%;">
        <div class="glide mb-5" data-glide='{
            }'>
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <li class="glide__slide">
                        <div class="imageBox position-relative">
                            <img src="../../img/Usuario/slider-padrao.png" alt="" style="width: 100%;">
                            <div class="descCard p-2 ps-4">
                                <h3 class="fs-4">Nome do Evento</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy textLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply </p>
                            </div>
                        </div>
                    </li>
                    <li class="glide__slide">
                        <div class="imageBox position-relative">
                            <img src="../../img/Usuario/slider-padrao.png" alt="" style="width: 100%;">
                            <div class="descCard p-2 ps-4">
                                <h3 class="fs-4">Nome do Evento</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy textLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply </p>
                            </div>
                        </div>
                    </li>
                    <li class="glide__slide">
                        <div class="imageBox position-relative">
                            <img src="../../img/Usuario/slider-padrao.png" alt="" style="width: 100%;">
                            <div class="descCard p-2 ps-4">
                                <h3 class="fs-4">Nome do Evento</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy textLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply </p>
                            </div>
                        </div>
                    </li>
                    <li class="glide__slide">
                        <div class="imageBox position-relative">
                            <img src="../../img/Usuario/slider-padrao.png" alt="" style="width: 100%;">
                            <div class="descCard p-2 ps-4">
                                <h3 class="fs-4">Nome do Evento</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy textLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply </p>
                            </div>
                        </div>
                    </li>
                    <li class="glide__slide">
                        <div class="imageBox position-relative">
                            <img src="../../img/Usuario/slider-padrao.png" alt="" style="width: 100%;">
                            <div class="descCard p-2 ps-4">
                                <h3 class="fs-4">Nome do Evento</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy textLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><img src="../../img/Usuario/arrow-previus.png" alt="" style="width: 40px;"></button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><img src="../../img/Usuario/arrow-next.png" alt="" style="width: 40px;"></button>
            </div>

            <div class="glide__bullets" data-glide-el="controls[nav]">
                <button class="glide__bullet" data-glide-dir="=0"></button>
                <button class="glide__bullet" data-glide-dir="=1"></button>
                <button class="glide__bullet" data-glide-dir="=2"></button>
                <button class="glide__bullet" data-glide-dir="=3"></button>
                <button class="glide__bullet" data-glide-dir="=4"></button>
            </div>
        </div>

        <h2 class="fs-3">Próximos de você</h2>
        <div class="glide mb-5" data-glide='{
        "loop": true,
        "perView": 4,
        "perMove": 4,
        "perSwipe": 4,
        "perTouch": 4,
        "gap":20,
        "type": "carousel"
        }' id="carrossel">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <li class="glide__slide">
                        <div class="imageBox position-relative">
                            <img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;">
                            <div class="descMini p-2 ps-4 ">
                                <h3 class="fs-5">Nome do Evento</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>
                    </li>
                    <li class="glide__slide">
                        <div class="imageBox position-relative">
                            <img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;">
                            <div class="descMini p-2 ps-4 ">
                                <h3 class="fs-5">Nome do Evento</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>
                    </li>
                    <li class="glide__slide">
                        <div class="imageBox position-relative">
                            <img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;">
                            <div class="descMini p-2 ps-4 ">
                                <h3 class="fs-5">Nome do Evento</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>
                    </li>
                    <li class="glide__slide">
                        <div class="imageBox position-relative">
                            <img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;">
                            <div class="descMini p-2 ps-4 ">
                                <h3 class="fs-5">Nome do Evento</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>
                    </li>
                    <li class="glide__slide">
                        <div class="imageBox position-relative">
                            <img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;">
                            <div class="descMini p-2 ps-4 ">
                                <h3 class="fs-5">Nome do Evento</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>
                    </li>
                    <li class="glide__slide">
                        <div class="imageBox position-relative">
                            <img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;">
                            <div class="descMini p-2 ps-4 ">
                                <h3 class="fs-5">Nome do Evento</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>
                    </li>
                    <li class="glide__slide">
                        <div class="imageBox position-relative">
                            <img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;">
                            <div class="descMini p-2 ps-4 ">
                                <h3 class="fs-5">Nome do Evento</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="=0"><img src="../../img/Usuario/arrow-previus.png" alt="" style="width: 40px;"></button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir="=4"><img src="../../img/Usuario/arrow-next.png" alt="" style="width: 40px;"></button>
            </div>

            <div class="glide__bullets" data-glide-el="controls[nav]">
                <button class="glide__bullet" data-glide-dir="=0"></button>
                <button class="glide__bullet" data-glide-dir="=1" style="display: none;"></button>
                <button class="glide__bullet" data-glide-dir="=2" style="display: none;"></button>
                <button class="glide__bullet" data-glide-dir="=3" style="display: none;"></button>
                <button class="glide__bullet" data-glide-dir="=4"></button>
            </div>
        </div>
        <h2 id="carrossel-teatros" class="fs-3">Teatros</h2>
        <div class="glide mb-5" data-glide='{
                "loop": true,
                "perView": 4,
                "perMove": 4,
                "perSwipe": 4,
                "perTouch": 4,
                "gap":20,
                "type": "carousel"
            }' id="carrossel">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <?php
                    // Array para armazenar os IDs dos eventos já adicionados
                    $eventos_adicionados = [];

                    foreach ($eventos as $evento) :
                        if ($evento['espacoEvento'] === '3') :
                            // Verifica se o ID do evento já foi adicionado ao carrossel
                            if (!in_array($evento['idEvento'], $eventos_adicionados)) :
                    ?>
                                <li class="glide__slide">
                                    <div class="imageBox position-relative" style="width: 255px; height: 200px;"> <!-- Defina a largura e altura desejadas -->
                                        <img src="../../img/Organizacao/<?= $evento['imagemEvento']; ?>" alt="Imagem do evento" style="width: 100%; height: 100%;"> <!-- Defina a largura e altura desejadas -->
                                        <div class="descCard p-2 ps-4" style="width: 255px;"> <!-- Defina a largura igual à da imagem -->
                                            <h3 class="fs-4"><?= $evento['nomeEvento']; ?></h3>
                                            <p><?= $evento['descEvento']; ?></p>
                                        </div>
                                    </div>
                                </li>
                    <?php
                                // Adiciona o ID do evento ao array de eventos adicionados
                                $eventos_adicionados[] = $evento['idEvento'];
                            endif;
                        endif;
                    endforeach;
                    ?>

                </ul>
            </div>
            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="&lt;"><img src="../../img/Usuario/arrow-previus.png" alt="" style="width: 40px;"></button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir="&gt;"><img src="../../img/Usuario/arrow-next.png" alt="" style="width: 40px;"></button>
            </div>


            <div class="glide__bullets" data-glide-el="controls[nav]">
                <button class="glide__bullet" data-glide-dir="=0"></button>
                <button class="glide__bullet" data-glide-dir="=1" style="display: none;"></button>
                <button class="glide__bullet" data-glide-dir="=2" style="display: none;"></button>
                <button class="glide__bullet" data-glide-dir="=3" style="display: none;"></button>
                <button class="glide__bullet" data-glide-dir="=4"></button>
            </div>
        </div>

        <h2 id="carrossel-parques" class="fs-3">Parques</h2>
        <div class="glide mb-5" data-glide='{
        "loop": true,
        "perView": 4,
        "perMove": 4,
        "perSwipe": 4,
        "perTouch": 4,
        "gap":20,
        "type": "carousel"
        }' id="carrossel">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                <?php
                    // Array para armazenar os IDs dos eventos já adicionados
                    $eventos_adicionados = [];

                    foreach ($eventos as $evento) :
                        if ($evento['espacoEvento'] === '1') :
                            // Verifica se o ID do evento já foi adicionado ao carrossel
                            if (!in_array($evento['idEvento'], $eventos_adicionados)) :
                    ?>
                                <li class="glide__slide">
                                    <div class="imageBox position-relative" style="width: 255px; height: 200px;"> <!-- Defina a largura e altura desejadas -->
                                        <img src="../../img/Organizacao/<?= $evento['imagemEvento']; ?>" alt="Imagem do evento" style="width: 100%; height: 100%;"> <!-- Defina a largura e altura desejadas -->
                                        <div class="descCard p-2 ps-4" style="width: 255px;"> <!-- Defina a largura igual à da imagem -->
                                            <h3 class="fs-4"><?= $evento['nomeEvento']; ?></h3>
                                            <p><?= $evento['descEvento']; ?></p>
                                        </div>
                                    </div>
                                </li>
                    <?php
                                // Adiciona o ID do evento ao array de eventos adicionados
                                $eventos_adicionados[] = $evento['idEvento'];
                            endif;
                        endif;
                    endforeach;
                    ?>
                </ul>
            </div>
            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="=0"><img src="../../img/Usuario/arrow-previus.png" alt="" style="width: 40px;"></button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir="=4"><img src="../../img/Usuario/arrow-next.png" alt="" style="width: 40px;"></button>
            </div>

            <div class="glide__bullets" data-glide-el="controls[nav]">
                <button class="glide__bullet" data-glide-dir="=0"></button>
                <button class="glide__bullet" data-glide-dir="=1" style="display: none;"></button>
                <button class="glide__bullet" data-glide-dir="=2" style="display: none;"></button>
                <button class="glide__bullet" data-glide-dir="=3" style="display: none;"></button>
                <button class="glide__bullet" data-glide-dir="=4"></button>
            </div>
        </div>
        <h2 id="carrossel-museus" class="fs-3">Museus</h2>
        <div class="glide mb-5" data-glide='{
        "loop": true,
        "perView": 4,
        "perMove": 4,
        "perSwipe": 4,
        "perTouch": 4,
        "gap":20,
        "type": "carousel"
        }' id="carrossel">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                <?php
                    // Array para armazenar os IDs dos eventos já adicionados
                    $eventos_adicionados = [];

                    foreach ($eventos as $evento) :
                        if ($evento['espacoEvento'] === '2') :
                            // Verifica se o ID do evento já foi adicionado ao carrossel
                            if (!in_array($evento['idEvento'], $eventos_adicionados)) :
                    ?>
                                <li class="glide__slide">
                                    <div class="imageBox position-relative" style="width: 255px; height: 200px;"> <!-- Defina a largura e altura desejadas -->
                                        <img src="../../img/Organizacao/<?= $evento['imagemEvento']; ?>" alt="Imagem do evento" style="width: 100%; height: 100%;"> <!-- Defina a largura e altura desejadas -->
                                        <div class="descCard p-2 ps-4" style="width: 255px;"> <!-- Defina a largura igual à da imagem -->
                                            <h3 class="fs-4"><?= $evento['nomeEvento']; ?></h3>
                                            <p><?= $evento['descEvento']; ?></p>
                                        </div>
                                    </div>
                                </li>
                    <?php
                                // Adiciona o ID do evento ao array de eventos adicionados
                                $eventos_adicionados[] = $evento['idEvento'];
                            endif;
                        endif;
                    endforeach;
                    ?>
                </ul>
            </div>
            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="=0"><img src="../../img/Usuario/arrow-previus.png" alt="" style="width: 40px;"></button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir="=4"><img src="../../img/Usuario/arrow-next.png" alt="" style="width: 40px;"></button>
            </div>

            <div class="glide__bullets" data-glide-el="controls[nav]">
                <button class="glide__bullet" data-glide-dir="=0"></button>
                <button class="glide__bullet" data-glide-dir="=1" style="display: none;"></button>
                <button class="glide__bullet" data-glide-dir="=2" style="display: none;"></button>
                <button class="glide__bullet" data-glide-dir="=3" style="display: none;"></button>
                <button class="glide__bullet" data-glide-dir="=4"></button>
            </div>
        </div>

        <h2 id="carrossel-centroCulturais" class="fs-3">Centro Culturais</h2>
        <div class="glide mb-5" data-glide='{
        "loop": true,
        "perView": 4,
        "perMove": 4,
        "perSwipe": 4,
        "perTouch": 4,
        "gap":20,
        "type": "carousel"
        }' id="carrossel">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                <?php
                    // Array para armazenar os IDs dos eventos já adicionados
                    $eventos_adicionados = [];

                    foreach ($eventos as $evento) :
                        if ($evento['espacoEvento'] === '4') :
                            // Verifica se o ID do evento já foi adicionado ao carrossel
                            if (!in_array($evento['idEvento'], $eventos_adicionados)) :
                    ?>
                                <li class="glide__slide">
                                    <div class="imageBox position-relative" style="width: 255px; height: 200px;"> <!-- Defina a largura e altura desejadas -->
                                        <img src="../../img/Organizacao/<?= $evento['imagemEvento']; ?>" alt="Imagem do evento" style="width: 100%; height: 100%;"> <!-- Defina a largura e altura desejadas -->
                                        <div class="descCard p-2 ps-4" style="width: 255px;"> <!-- Defina a largura igual à da imagem -->
                                            <h3 class="fs-4"><?= $evento['nomeEvento']; ?></h3>
                                            <p><?= $evento['descEvento']; ?></p>
                                        </div>
                                    </div>
                                </li>
                    <?php
                                // Adiciona o ID do evento ao array de eventos adicionados
                                $eventos_adicionados[] = $evento['idEvento'];
                            endif;
                        endif;
                    endforeach;
                    ?>
                </ul>
            </div>
            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="=0"><img src="../../img/Usuario/arrow-previus.png" alt="" style="width: 40px;"></button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir="=4"><img src="../../img/Usuario/arrow-next.png" alt="" style="width: 40px;"></button>
            </div>

            <div class="glide__bullets" data-glide-el="controls[nav]">
                <button class="glide__bullet" data-glide-dir="=0"></button>
                <button class="glide__bullet" data-glide-dir="=1" style="display: none;"></button>
                <button class="glide__bullet" data-glide-dir="=2" style="display: none;"></button>
                <button class="glide__bullet" data-glide-dir="=3" style="display: none;"></button>
                <button class="glide__bullet" data-glide-dir="=4"></button>
            </div>
        </div>
    </div>

    <footer class="w-100 h-auto d-flex justify-content-center">
        <div class="row d-flex align-items-start pt-4 g-4 text-start" style="width: 80%;">
            <div class="col-md-4">
                <img src="../../img/Login/Cola AI logo.png" alt="" style="width: 40%;" class="mb-2">
                <p style="font-size:1em; font-weight:bold">Seja bem-vindo(a) a Cola ai, nós pretendemos lhe ajudar a encontrar as
                    melhores experiências para suas crianças.</p>
            </div>
            <div class="col-md-2">
                <h4 style="color: #6D9EAF;">Infos</h4>
                <ul class="m-0 p-0" style="list-style: none; font-weight: bold">
                    <li>Sobre</li>
                    <li>Feedback</li>
                    <li>Contato</li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4 style="color: #6D9EAF;">Desenvolvedora</h4>
                <img src="../../img/Usuario/magma-logo.png" alt="" style="width: 70%;">
            </div>
            <div class="col-md-3">
                <h4 style="color: #6D9EAF;">Acesso rápido</h4>
                <ul class="m-0 p-0" style="list-style: none; font-weight: bold">
                    <li>Início</li>
                    <li>Teatros</li>
                    <li>Parques</li>
                    <li>Museus</li>
                    <li>Centro Culturais</li>
                    <li>CEU</li>
                </ul>
            </div>
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
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
</body>

</html>