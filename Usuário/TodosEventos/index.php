<?php 
require_once '../../dao/EventoDao.php';

$eventos = EventoDao::selectAll();
$enderecosEventos = [];

// Populando $enderecosEventos
foreach ($eventos as $evento) {
    $enderecoEvento = $evento['enderecoEvento'] . "," . $evento['numeroEvento'] . "," .  $evento['complementoEvento']. "," .  $evento['bairroEvento'] . "," . $evento['cepEvento'] . "," . $evento['cidadeEvento']. "," .  $evento['ufEvento'];
    $enderecosEventos[] = $enderecoEvento;
}

// Transformando em JSON para usar no JavaScript
$enderecosEventosJSON = json_encode($enderecosEventos);

?>
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
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly"
      defer
    ></script>
    <!-- Fim da API do Google Maps -->
    <!-- Adicione a biblioteca ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- Adicione seu script personalizado -->
    <script type="text/javascript" src="../../js/personalizar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
    <script type="text/javascript" src="../../js/modal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>
        // Função para geocodificar endereço
        function geocodeAddress(address) {
            return new Promise((resolve, reject) => {
                const geocoder = new google.maps.Geocoder();
                geocoder.geocode({ address: address, region: 'BR' }, (results, status) => {
                    if (status === 'OK') {
                        const position = results[0].geometry.location;
                        resolve(position);
                    } else {
                        reject(status);
                    }
                });
            });
        }

        // Função para geocodificar todos os endereços e exibir no console
        async function geocodeAddresses(addresses) {
            for (const address of addresses) {
                try {
                    console.log(`Tentando geocodificar ${address}`);
                    const position = await geocodeAddress(address);
                    console.log(`Resultado do geocodificador para ${address}:`, position);
                    console.log(`Coordenadas de ${address}: ${position.lat()}, ${position.lng()}`);
                } catch (error) {
                    console.error(`Falha ao geocodificar ${address}: ${error}`);
                }
            }
        }

        // Chamada da função com os endereços
        const enderecosEventos = <?php echo $enderecosEventosJSON; ?>;
        geocodeAddresses(enderecosEventos);
    </script>

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
        <div class="col-md-2 filtroBox pt-3" id="filtro">
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
                    <div class="teste"></div><input type="range" name="" id=""><div class="teste"></div>
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
                <button class="btnFiltro rounded rounded-3" onclick="Fechar()">Aplicar filtros</button>
            </div>
        </div>

        <div class="listSearch pt-3 pb-3">
                <div class="searchBox d-flex justify-content-center">
                    <div class="searchInput position-relative">
                        <img src="../../img/Usuario/icon-search.png" alt="">
                        <input type="text" placeholder="Pesquise locais" class="rounded rounded-5 ps-5">
                    </div>
                </div>
                <div class="buttonProcurar d-flex justify-content-center mt-auto mb-1 me-auto">
                    <button type="submit" class="border-0 rounded-3">Buscar</button>
                </div>
                <div class="showFiltro mt-auto mb-1">
                    <div class="buttonFiltros d-flex justify-content-center ">
                        <button type="submit" class="border-0 rounded-3" onclick="Abrir()">Filtros</button>
                    </div>
                </div>
            </div>
        <div class="col-md-10 listEventos">

            <div id="map"></div>


            <!-- Card se não encontrar evento -->

            <!-- <div class="d-flex justify-content-center">
                <div class="boxVazio p-3 fw-bold rounded rounded-5">
                    <p>Infelizmente não encontramos eventos próximos a este endereço  cadastrados.</p>
                </div>
            </div>

            
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
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEx8FgHwmJjDQPZq_JQBPxi_1on_zcpQI&callback=initMap&v=weekly&solution_channel=GMP_CCS_geolocation_v1"
      defer
    ></script>
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script type="text/javascript" src="../../js/personalizar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
    <script type="text/javascript" src="../../js/modal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script>
        let filtro = document.getElementById("filtro")
        function Abrir() {
            filtro.classList.add("filtroBox-on");
            filtro.classList.remove("filtroBox-off");
        }
        function Fechar() {
            filtro.classList.add("filtroBox-off");
            filtro.classList.remove("filtroBox-on");
        }
    </script>

    <script>

        const getPosition = position => {
            const dados = {
                latitude: position.coords.latitude,
                longitude: position.coords.longitude

            }


        }

        const geoError = error => {
            console.log ("Erro: " + error.message)
        }
        navigator.geolocation.getCurrentPosition(getPosition, geoError)


        // Função para inicializar o mapa
        let map, infoWindow;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: -34.397, lng: 150.644 },
                zoom: 12,
            });
            infoWindow = new google.maps.InfoWindow();

            // Adicione um marcador para a sua localização atual
            const addMarker = (location) => {
                const marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    title: "Sua Localização",
                });
                map.setCenter(location);
            };

            // Função para obter a posição do usuário
            const getPosition = (position) => {
                const dados = {
                    latitude: position.coords.latitude,
                    longitude: position.coords.longitude,
                };
                const userLocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                };
                console.log(dados);
                addMarker(userLocation);
            };

            // Função de erro de geolocalização
            const geoError = (error) => {
                console.log("Erro: " + error.message);
            };

            // Solicita a localização do usuário
            navigator.geolocation.getCurrentPosition(getPosition, geoError);
        }

    </script>

    

    <!-- <script>
        // Adicione os eventos ao mapa usando JavaScript
        var map = L.map('map').setView([-22.9035, -43.2096], 13); // Configuração inicial do mapa

        // Adicione um tile layer (layer de azulejos) para exibir o mapa
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Adicione os eventos ao mapa
        var eventos = <?php echo json_encode($eventos_js); ?>;
        eventos.forEach(function(evento) {
            var marker = L.marker([evento.latitude, evento.longitude]).addTo(map);
            marker.bindPopup(evento.nome);
        });
    </script> -->

    

</body></html>