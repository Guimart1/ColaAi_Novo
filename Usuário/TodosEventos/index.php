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
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZxEPesp8pDRjhFBsLKBA7EMkA6jdfWzI&callback=initMap&v=weekly" defer></script>
    <!-- Adicione a biblioteca ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- Adicione seu script personalizado -->
    <script type="text/javascript" src="../../js/personalizar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
    <script type="text/javascript" src="../../js/modal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <style>
        #map {
            width: 800px;
            height: 550px;
            border: 0;
            margin-top:20px;
        }

        #address-search {
        display: none;
    }
    </style>
    <script>
        let map, infoWindow, userMarker;
        const enderecosEventos = <?php echo $enderecosEventosJSON; ?>;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: -34.397, lng: 150.644 },
                zoom: 13.5,
            });
            infoWindow = new google.maps.InfoWindow();

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const userLocation = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };
                        map.setCenter(userLocation);    
                        userMarker = new google.maps.Marker({
                            position: userLocation,
                            map: map,
                            title: "Sua Localização",
                           
                        });
                        // Função para adicionar marcadores dos eventos
                        addEventMarkers();
                    },
                    () => {
                        handleLocationError(true, infoWindow, map.getCenter());
                    }
                );
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(
                browserHasGeolocation
                    ? "Erro: O serviço de geolocalização falhou."
                    : "Erro: Seu navegador não suporta geolocalização."
            );
            infoWindow.open(map);
        }

        function addEventMarkers() {
            const geocoder = new google.maps.Geocoder();
            const eventIcon = "http://maps.google.com/mapfiles/ms/icons/blue-dot.png";

            enderecosEventos.forEach((endereco) => {
                geocoder.geocode({ address: endereco }, (results, status) => {
                    if (status === 'OK') {
                        new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location,
                            title: endereco,
                            icon: eventIcon
                        });
                    } else {
                        console.error('Geocode falhou: ' + status);
                    }
                });
            });
        }

        function searchAddress() {
            const addressInput = document.getElementById('address-input').value;
            const geocoder = new google.maps.Geocoder();

            geocoder.geocode({ address: addressInput }, (results, status) => {
                if (status === 'OK') {
                    map.setCenter(results[0].geometry.location);
                    map.setZoom(17);
                    createMarker(results[0].geometry.location);
                } else {
                    alert('Geocode não foi bem sucedido pela seguinte razão: ' + status);
                }
            });
        }

        function createMarker(latlng) {
            if (userMarker) {
                userMarker.setMap(null);
            }
            userMarker = new google.maps.Marker({
                map: map,
                position: latlng,
            });
        }
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
                        <li class="w-100" style="list-style: none;">
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
            <div class="col-md-10 listEventos">
            <div id="address-search">
                <input type="text" id="address-input">
                <button onclick="searchAddress();">Pesquisar</button>
            </div>  
                <div class="w-100 d-flex justify-content-center mb-4">
                    <div id="map"></div>
                </div>
                <!-- Card se não encontrar evento -->
                <!-- <div class="d-flex justify-content-center">
                    <div class="boxVazio p-3 fw-bold rounded rounded-5">
                        <p>Infelizmente não encontramos eventos próximos a este endereço cadastrados.</p>
                    </div>
                </div> -->
                <div class="p-4">
                    <h2 class="mb-3">Todos os Eventos (10)</h2>
                    <div class="row g-3">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
