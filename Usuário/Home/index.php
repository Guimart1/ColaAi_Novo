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
                <li><a href="">Parques</a></li>
                <li><a href="">Museus</a></li>
                <li><a href="">Centros Culturais</a></li>
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
        <div class="glide mb-5 carrossel" data-glide='{
        "loop": true,
        "perView": 4,
        "perMove": 4,
        "perSwipe": 4,
        "perTouch": 4,
        "gap":20,
        "type": "carousel"
        }'>
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
        <div class="glide mb-5 carrossel" data-glide='{
                "loop": true,
                "perView": 4,
                "perMove": 4,
                "perSwipe": 4,
                "perTouch": 4,
                "gap":20,
                "type": "carousel"
            }'>
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
                                    <div class="imageBox position-relative" style="width: 280px; height: 200px;"> <!-- Defina a largura e altura desejadas -->
                                        <img src="../../img/Organizacao/<?= $evento['imagemEvento']; ?>" alt="Imagem do evento" style="width: 100%; height: 100%;"> <!-- Defina a largura e altura desejadas -->
                                        <div class="descMini p-2 ps-4"> <!-- Defina a largura igual à da imagem -->
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

        <h2 class="fs-3">Parques</h2>
        <div class="glide mb-5 carrossel" data-glide='{
        "loop": true,
        "perView": 4,
        "perMove": 4,
        "perSwipe": 4,
        "perTouch": 4,
        "gap":20,
        "type": "carousel"
        }'>
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
                                    <div class="imageBox position-relative" style="width: 280px; height: 200px;"> <!-- Defina a largura e altura desejadas -->
                                        <img src="../../img/Organizacao/<?= $evento['imagemEvento']; ?>" alt="Imagem do evento" style="width: 100%; height: 100%;"> <!-- Defina a largura e altura desejadas -->
                                        <div class="descMini p-2 ps-4"> <!-- Defina a largura igual à da imagem -->
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
        <h2 class="fs-3">Museus</h2>
        <div class="glide mb-5 carrossel" data-glide='{
        "loop": true,
        "perView": 4,
        "perMove": 4,
        "perSwipe": 4,
        "perTouch": 4,
        "gap":20,
        "type": "carousel"
        }'>
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
                                    <div class="imageBox position-relative" style="width: 280px; height: 200px;"> <!-- Defina a largura e altura desejadas -->
                                        <img src="../../img/Organizacao/<?= $evento['imagemEvento']; ?>" alt="Imagem do evento" style="width: 100%; height: 100%;"> <!-- Defina a largura e altura desejadas -->
                                        <div class="descMini p-2 ps-4"> <!-- Defina a largura igual à da imagem -->
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

        <h2 class="fs-3">Centro Culturais</h2>
        <div class="glide mb-5 carrossel" data-glide='{
        "loop": true,
        "perView": 4,
        "perMove": 4,
        "perSwipe": 4,
        "perTouch": 4,
        "gap":20,
        "type": "carousel"
        }'>
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
                                    <div class="imageBox position-relative" style="width: 280px; height: 200px;"> <!-- Defina a largura e altura desejadas -->
                                        <img src="../../img/Organizacao/<?= $evento['imagemEvento']; ?>" alt="Imagem do evento" style="width: 100%; height: 100%;"> <!-- Defina a largura e altura desejadas -->
                                        <div class="descMini p-2 ps-4"> <!-- Defina a largura igual à da imagem -->
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
                <ul class="m-0 p-0" style="list-style: none; font-weight: bold; cursor:pointer">
                    <li><a class="dropdown-item fw-bold" onclick="modalSobre(0,0)">Sobre</a></li>
                    <li><a class="dropdown-item fw-bold" onclick="modalFeedback(0,0)">Feedback</a></li>
                    <li><a class="dropdown-item fw-bold" onclick="modalContato(0,0)">Contato</a></li>
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
    <div class="modal fade" id="modalSobre" role="dialog">
            <div class=" modal-dialog modal-dialog-centered">
                <div class="modal-content rounded rounded-5 pb-4" style="background-color: #FFFBE7;">
                    <div class="modal-header border-0 pt-4">
                        <h1 class="modal-title fs-4 ps-5" id="exampleModalLabel">Sobre</h1>
                        <button type="button" class="btn-close me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div> 
                    <div class="modal-body d-flex justify-content-center flex-column align-items-center p-0" style="color: #a6a6a6; text-align:justify">
                        <img src="../../img/Login/Cola AI logo.png" alt="" style="width: 40%; transform:translateY(-20px)">
                        <p class="fw-bold " style="text-align: justify; width:70%">A premissa do site foi iniciada após a união de um grupo para desenvolver um projeto de conclusão de curso. <br><br>
                            O projeto Cola aí foi fundado pela empresa Magma, sendo todos parceiros e alunos do curso de Desenvolvimento
                            de Sistemas da ETEC de Guaianazes.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalFeedback" role="dialog">
            <div class=" modal-dialog modal-dialog-centered">
                <div class="modal-content rounded rounded-5 pb-4" style="background-color: #FFFBE7;">
                    <div class="modal-header border-0 pt-4 m-0 p-0 pb-2">
                        <h1 class="modal-title fs-4 ps-5" id="exampleModalLabel">Feedback</h1>
                        <button type="button" class="btn-close me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div> 
                    <div class="modal-body p-5 pt-0 pb-1" style="color: #a6a6a6; text-align:justify">
                        <p>Nos ajude a melhorar a sua experiência como usuário, nos envie sugestões 
                            e nos conte das suas melhores vivencias com o Cola Aí.</p>
                        <h2 class="fs-5 mt-3">Título</h2>
                        <div class="inputContato">
                            <input type="text" class="input-group mt-1" name="titulo" id="" placeholder="Título do feedback">
                        </div>
                        <h2 class="fs-5 mt-3">Comentário</h2>
                        <div class="inputContato">
                            <textarea class="form-control rounded rounded-4" name="" id="" cols="30" rows="10" style="max-height: 300px;" placeholder="Escreva sua experiência  com o site, podendo ser sugestões, criticas e melhorias"></textarea>
                        </div>
                        <div class="btnModal w-100 mt-4 d-flex">
                            <button class="border border-0 ms-auto rounded rounded-5">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalContato" role="dialog">
            <div class=" modal-dialog modal-dialog-centered">
                <div class="modal-content rounded rounded-5 pb-4" style="background-color: #FFFBE7;">
                    <div class="modal-header border-0 pt-4 m-0 p-0 pb-2">
                        <h1 class="modal-title fs-4 ps-5" id="exampleModalLabel">Contato</h1>
                        <button type="button" class="btn-close me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div> 
                    <div class="modal-body p-5 pt-0 pb-1" style="color: #a6a6a6; text-align:justify">
                        <p>Entre em contato com a nossa equipe de colaboradores e seja atendido por profissionais 
                        capacitados e interessados para oferecer a melhor vivencia no Cola Aí.</p>
                        <h2 class="fs-5 mt-3">Título</h2>
                        <div class="inputContato">
                            <input type="text" class="input-group mt-1" name="titulo" id="" placeholder="Título do contato">
                        </div>
                        <h2 class="fs-5 mt-3">Comentário</h2>
                        <select class="selectModal rounded rounded-4" name="" value="" aria-label="Default select example">
                            <option value="1">Suporte Técnico</option>
                            <option value="2">Denúncia</option>
                            <option value="3">Outros</option>
                        </select>
                        <h2 class="fs-5 mt-3">Categoria da denúncia</h2>
                        <select class="selectModal rounded rounded-4" name="" value="" aria-label="Default select example">
                            <option value="1">Organização</option>
                            <option value="2">Publicação</option>
                            <option value="3">Eventos</option>
                            <option value="4">Outros</option>
                        </select>
                        <h2 class="fs-5 mt-3">Descrição</h2>
                        <div class="inputContato" >
                            <textarea class="form-control rounded rounded-4" name="" id="" cols="30" rows="10" style="max-height: 300px;" placeholder="Descreva o motivo do seu contato."></textarea>
                        </div>
                        <h2 class="fs-5 mt-3">Inserir imagem</h2>
                        <div class="position-relative">
                            <img src="../../img/Usuario/add-image.png" alt="" style="width: 25px; position:absolute; left: 90%; top:23%">
                            <label for="file-upload" class="fileInput rounded rounded-4">
                                Carregar imagem
                            </label>
                            <input id="file-upload" type="file" />
                        </div>
                        <p style="color: #6D9EAF; font-size:0.9em" class="mt-3">As imagens serão reservadas e sem fins lucrativas, serão apenas para auxilio na resolução dos problemas</p>
                        <div class="btnModal w-100 mt-4 d-flex">
                            <button class="border border-0 ms-auto rounded rounded-5">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script type="text/javascript" src="../../js/personalizar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
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
function modalSobre(){
    const myModal = new bootstrap.Modal('#modalSobre');
    myModal.show();
    //window.location.href = "./registro.php";
}
function modalFeedback($id, $elemento){
    const myModal = new bootstrap.Modal('#modalFeedback');
    myModal.show();
    document.getElementById($elemento).value = $id;
    //window.location.href = "./registro.php";
}
function modalContato($id, $elemento){
    const myModal = new bootstrap.Modal('#modalContato');
    myModal.show();
    document.getElementById($elemento).value = $id;
    //window.location.href = "./registro.php";
}
</script>
</body>

</html>