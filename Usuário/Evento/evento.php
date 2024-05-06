<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações Eventos</title>
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

    // Verifique se o parâmetro id está definido na URL
    if (isset($_GET['id'])) {
        // Inclua o arquivo de conexão com o banco de dados e o DAO do evento
        require_once '../../dao/EventoDao.php';

        // Obtém o id do evento da URL
        $idEvento = $_GET['id'];

        // Busca os detalhes do evento com base no id do evento
        $evento = EventoDao::selectById($idEvento);

        // Verifica se o evento foi encontrado
        if ($evento) {
            // Exibe os detalhes do evento
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
            <!--inicio do conteudo-->
            <div class="container-fluid eventoBox d-flex align-items-center flex-column p-0">
                <div class="row d-flex justify-content-evenly gap-4" style="width: 100%; min-height: 83vh">
                    <div class="eventImage col-md-4">
                        <h1 class="fw-bold fs-2 mt-4"><span style="color: #E6AEB2">E</span><span style="color: #6D9EAF">VEN</span><span style="color: #FFD417">TO</span></h1>
                        <div class="d-flex align-items-center">
                            <img src="../../img/Usuario/icon-org.png" alt="" style="width: 40px">
                            <p class="ms-2 mt-auto mb-auto" style="color: #6D9EAF;">Organização Eventos</p>
                        </div>
                        <div class="imagemEvento">
                            <input type="hidden" name="idEvento" value="<?= $idEvento ?>">
                            <img src="../../img/Organizacao/<?= $evento['imagemEvento']; ?>" alt="<?= $evento['nomeEvento']; ?>" style="width: 100%; height: 100%;" class="mt-2 img-fluid">
                        </div>
                        <div class="eventTag w-100 row mt-2 g-4">
                            <div class="col-md-6 d-flex centerInfo">
                                <div class="livreBox d-flex justify-content-center align-items-center fw-bold">
                                    L
                                </div>
                                <span class="fw-bold ms-3" style="font-size: 1.2em;">Faixa etária:</span>
                                <spa class="ms-2" style="font-size: 1.2em;"><?= $evento['faixaEtariaEvento']; ?></spa>
                            </div>
                            <div class="col-md-6 d-flex centerInfo">
                                <img src="../../img/Usuario/icon-valor.png" alt="" style="width: 30px">
                                <span class="fw-bold ms-2" style="font-size: 1.2em;">Valor:</span>
                                <spa class="ms-1" style="font-size: 1.2em;"><?= $evento['valorEvento']; ?></spa>
                            </div>
                            <div class="col-md-12 d-flex centerInfo">
                                <img src="../../img/Usuario/icon-local.png " alt="" style="width: 30px; height:35px">
                                <span class="fw-bold ms-2" style="font-size: 1.2em;">Local:</span>
                                <span class="ms-1" style="font-size: 1.2em;"><?= $evento['enderecoEvento'];?>, <?= $evento['numeroEvento'];?>, <?= $evento['complementoEvento'];?> <?= $evento['bairroEvento'];?> <?= $evento['cepEvento'];?> <?= $evento['cidadeEvento'];?> <?= $evento['ufEvento'];?></span>
                            </div>
                            <div class="col-md-6 d-flex mb-5 centerInfo">
                                <img src="../../img/Usuario/icon-horario.png" alt="" style="width: 30px">
                                <span class="fw-bold ms-2" style="font-size: 1.2em;">Turno:</span>
                                <span class="ms-1" style="font-size: 1.2em;"><?= $evento['periodoEvento'];?></span>
                            </div>
                        </div>
                    </div>
                    <div class="eventDesc col-md-4 d-flex align-items-center justify-content-center flex-column">
                        <h1 class="fw-bold fs-2 mb-5"><span style="color: #FFD417">SHOW</span><span style="color: #6D9EAF"> DE </span><span style="color:#E6AEB2">DESENHOS</span></h1>
                        <p>Sucesso em todo o Brasil, o fenômeno infantil para crianças apresenta, “SHOW DE DESENHOS”.
                            Com cerca de 01H30 duração, o espetáculo tem um repertório de histórias infantis, contemplando
                            a cultura brasileira em forma de da animação, com o objetivo de incentivar as crianças e suas
                            famílias a embarcarem em uma jornada lúdica repleta de músicas, desenhos e aprendizados.
                        </p>
                        <div class="button">
                            <button type="submit" class="border-0 rounded-5 mt-5" style="width: 15vw; height: 50px;min-width:200px">Registre interesse</button>
                        </div>
                        <a href="" style="color: #6D9EAF;" class="mt-2 mb-5">Clique para obter Informações detalhadas</a>
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
        <div class="d-flex justify-content-between mt-2" style="width: 90%;">
            <p style="color: #6D9EAF;">©2024 Todos os direitos reservados</p>
            <p style="color: #6D9EAF;">Política de Privacidade</p>
        </div>
    </footer>

</div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="../../js/modal.js"></script>
</body>

</html>
<?php
        } else {
            // Se o evento não foi encontrado, exibe uma mensagem de erro
            echo "<p>Evento não encontrado.</p>";
        }
    } else {
        // Se o parâmetro idEvento não estiver definido na URL, exibe uma mensagem de erro
        echo "<p>Parâmetro idEvento não especificado na URL.</p>";
    }
    ?>