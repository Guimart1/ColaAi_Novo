<html lang="pt-br" class="hydrated"><head>
    <meta charset="UTF-8"><style data-styles="">ion-icon{visibility:hidden}.hydrated{visibility:inherit}</style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Cola Aí</title>
    <link rel="stylesheet" href="../../css/styleAdm.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../css/styleUsuario.css">
    <link rel="stylesheet" href="node_modules/@glidejs/glide/dist/css/glide.core.min.css">
    <link rel="stylesheet" href="../../css/glide.core.min.css">
    <link rel="stylesheet" href="../../css/glide.theme.css">
</head>

<body class="fundo-bolinha">

<nav>
    <div class="navigation">
        <div class="imgHeader">
            <img src="../../img/Login/Cola AI logo.png" alt="" class="img-fluid mb-2">
        </div>
        <a href="../Home/index.php">Página Inicial</a>
        <a href="#carrossel-teatros">Teatros</a>
        <a href="#carrossel-parques">Parques</a>
        <a href="#carrossel-museus">Museus</a>
        <a href="#carrossel-centroCulturais">Centros Culturais</a>
        <div class="iconBox">
            <img src="../../img/Usuario/icon-mapa.png" alt="" style="width: 40px; height:40px;">
            <img src="../../img/Usuario/icon-notificacao.png" alt="">
            <a href="../Perfil/index.php"><img src="../../img/Usuario/icon-perfil.png" alt=""></a>
        </div>
    </div>
</nav>
<div class="container-fluid">
<div class="row">
        <div class="col-2 filtroBox pt-3 ps-4">
            <div class="filtroEtaria mb-2">
                <label for="" class="fs-5">Faixa Etária</label>
                <div class="mt-1 mb-1">
                    <input type="number" class="faixaEtariaInput me-2" min="1" max="15"><span style="color: #6D9EAF;">min</span>
                </div>
                <div class="mt-1 mb-1">
                    <input type="number" class="faixaEtariaInput me-2" min="1" max="15"><span style="color: #E6AEB2">max</span>
                </div>
            </div>
            <div class="distanciaBox">
                <label for="" class="mb-1 fs-5 mb-4">Distância</label>
                <div class="d-flex align-items-center">
                    <div class="teste"></div><input type="range" name="" id=""><div class="teste">
                </div>
            </div>
            <span class="ms-auto">km</span>
            <div class="turnoBox mt-2">
                <label for="" class="fs-5">Turno</label>
                <div class="inputFiltros">
                    <input type="checkbox" name="" id=""><span class="ms-2">Todos</span>
                </div>
                <div class="inputFiltros">
                    <input type="checkbox" name="" id=""><span class="ms-2">Vespertino</span>
                </div>
                <div class="inputFiltros">
                    <input type="checkbox" name="" id=""><span class="ms-2">Matutino</span>
                </div>
                <div class="inputFiltros">
                    <input type="checkbox" name="" id=""><span class="ms-2">Noturno</span>
                </div>
            </div>

            <div class="turnoBox mt-1">
                <label for="" class="fs-5 ">Valor</label>
                <div class="inputFiltros">
                    <input type="checkbox" name="" id=""><span class="ms-2">Gratuito</span>
                </div>
                <div class="inputFiltros">
                    <input type="checkbox" name="" data-bs-toggle="collapse" href="#collapsePreco" role="button" aria-expanded="false" aria-controls="collapseExample"><span class="ms-2">Pago</span>
                </div>
                <div class="collapse" id="collapsePreco">
                    <li class=" w-100" style="list-style: none;">
                    <div class="d-flex flex-column">
                        <label for="" class="mb-1 fs-5">Preço</label>
                        <div class="d-flex">
                            <span style="color: #6D9EAF;">min</span><input type="number" class="faixaEtariaInput ms-2" min="1" max="15">
                            <span class="ms-2" style="color:#E6AEB2">max</span><input type="number" class="faixaEtariaInput ms-2" min="1" max="15">
                        </div>
                    </div>
                    </li> 
                </div>
            </div>
            <div class="w-100 d-flex justify-content-center mt-3">
                <button class="btnFiltro rounded rounded-3">Aplicar filtros</button>
            </div>

        </div>
        </div>
        <div class="col-10 listEventos">
            <div class="p-5 pb-3 pt-3 d-flex justify-content-between listSearch position-fixed">
                <div class="searchBox col-md-8 col-sm-5 col-5 d-flex justify-content-center ms-4">
                    <div class="searchInput w-100 position-relative">
                        <img src="../../img/Usuario/icon-search.png" alt="">
                        <input type="text" placeholder="Pesquise locais" class="rounded rounded-5 ps-5">
                    </div>
                </div>
                <div class="buttonProcurar col-2 d-flex justify-content-center mt-auto mb-1">
                    <button type="submit" class="border-0 rounded-3">Buscar</button>
                </div>
            </div>
            <div class="" style="height: 70px;"></div>
    	    <div class="w-100 d-flex justify-content-center mb-4">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.6584015061503!2d-46.392098635479655!3d-23.580709061748028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce6f888cba55e7%3A0xe7a2b982ac60485a!2sCentro%20de%20Forma%C3%A7%C3%A3o%20Cultural%20Cidade%20Tiradentes!5e0!3m2!1spt-BR!2sbr!4v1715321667853!5m2!1spt-BR!2sbr" width="800" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>


            <!-- Card se não encontrar evento -->

            <!-- <div class="d-flex justify-content-center">
                <div class="boxVazio p-3 fw-bold rounded rounded-5">
                    <p>Infelizmente não encontramos eventos próximos a este endereço  cadastrados.</p>
                </div>
            </div> -->

            
            <!-- Pode copiar essa div e só mudar o titulo pras outras funções de pesquisa -->
            <div class="p-4">
                
                <h2 class="mb-3">Todos os Eventos (10)</h2>
                <!-- <h2 class="mb-3">Mais Eventos</h2> -->
                <!-- <h2 class="mb-3">Todos os Eventos Próximos</h2> -->
                <div class="row g-3">
                    <!--Card de evento-->
                    <div class="col-sm-6 col-lg-3">
                        <a href="../Evento/"> <!-- Adicione o link aqui -->
                            <div class="imageBox position-relative" style="width: 100%; height: 200px;"> <!-- Defina a largura e altura desejadas -->
                                <img src="../../img/Usuario/carrossel-padrao.png" alt="Imagem do evento" style="width: 100%; height: 100%;"> <!-- Defina a largura e altura desejadas -->
                                <div class="descMini p-2 ps-4"> <!-- Defina a largura igual à da imagem -->
                                    <h3 class="fs-4 tituloEvento">Nome Evento</h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script type="text/javascript" src="../../js/personalizar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
    <script type="text/javascript" src="../../js/modal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>


</body></html>