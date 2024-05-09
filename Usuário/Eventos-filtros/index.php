<?php
require_once '../../dao/EventoDao.php';
$eventos = EventoDao::selectAllActive();
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

<body class="fundo-bolinha">
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
    $authUsuario = $_SESSION['user'];
    ?>
            <div class="navigation">
                <nav>
                    <ul>
                        <li><a href="../Home/index.php">Página Inicial</a></li>
                        <li><a href="#carrossel-teatros">Teatros</a></li>
                        <li><a href="#carrossel-parques">Parques</a></li>
                        <li><a href="#carrossel-museus">Museus</a></li>
                        <li><a href="#carrossel-centroCulturais">Centros Culturais</a></li>
                        <li><a href="">CEU</a></li>
                        <li><a href="">Perfil</a></li>
                    </ul>
                </nav>
            </div>
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
                <div class="turnos">
                    <input type="checkbox" name="" id=""><span class="ms-2">Todos</span>
                </div>
                <div class="turnos">
                    <input type="checkbox" name="" id=""><span class="ms-2">Vespertino</span>
                </div>
                <div class="turnos">
                    <input type="checkbox" name="" id=""><span class="ms-2">Matutino</span>
                </div>
                <div class="turnos">
                    <input type="checkbox" name="" id=""><span class="ms-2">Noturno</span>
                </div>
            </div>

            <div class="turnoBox mt-1">
                <label for="" class="fs-5 ">Valor</label>
                <div class="turnos">
                    <input type="checkbox" name="" id=""><span class="ms-2">Gratuito</span>
                </div>
                <div class="turnos">
                    <input type="checkbox" name="" data-bs-toggle="collapse" href="#collapseAnalise" role="button" aria-expanded="false" aria-controls="collapseExample"><span class="ms-2">Pago</span>
                </div>
                <div class="collapse" id="collapseAnalise">
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
            <div class="w-100 d-flex justify-content-center mt-4">
                <button class="btnFiltro rounded rounded-3">Aplicar filtros</button>
            </div>

        </div>
        <div class="col-10">

        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script type="text/javascript" src="../../js/personalizar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
    <script type="text/javascript" src="../../js/modal.js"></script>
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
</body>

</html>