<?php 
  require_once '../../dao/EventoDao.php';

?>
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

    // Verifique se o parâmetro id está definido na URL
    if (isset($_GET['id'])) {
        // Obtém o id do evento da URL
        $idEvento = $_GET['id'];

        // Busca os detalhes do evento com base no id do evento
        $evento = EventoDao::selectById($idEvento);
        $organizacao = EventoDao::selecionarEventoComOrganizacaoPorId($idEvento);

        // Verifica se o evento foi encontrado
        if ($evento && $organizacao) {

    
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
                <div class="buttonProcurar col-2 d-flex justify-content-center mt-auto mb-1">
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
                            <img src="../../img/Organizacao/<?= $organizacao['imagemOrganizacaoEvento']; ?>" alt="foto perfil" style="width: 40px">
                            <p class="ms-2 mt-auto mb-auto" style="color: #6D9EAF;"><?= $organizacao['nomeOrganizacaoEvento']; ?></p>
                        </div>
                        <div class="imagemEvento">
                            <input type="hidden" name="idEvento" value="<?= $idEvento ?>">
                            <img src="../../img/Organizacao/<?= $evento['imagemEvento']; ?>" alt="<?= $evento['nomeEvento']; ?>" style="width: 100%; height: 100%;" class="mt-2 img-fluid">
                        </div>
                        <div class="eventTag w-100 row mt-2 g-4">
                            <div class="col-md-7 d-flex centerInfo">
                                <div class="livreBox d-flex justify-content-center align-items-center fw-bold">
                                    L
                                </div>
                                <span class="fw-bold ms-3" style="font-size: 1.2em;">Faixa etária:</span>
                                <spa class="ms-2" style="font-size: 1.2em;">
                                    <?php
                                    // array associativo para mapear os valores numéricos para os valores correspondentes
                                    $faixa_etaria = array(
                                        '1' => '0-12 meses',
                                        '2' => '1-3 anos',
                                        '3' => '3-5 anos',
                                        '4' => '5-12 anos',
                                        '5' => 'Livre para todos os públicos'
                                    );

                                    // Verifique se o valor da faixa etária está definido e não é vazio
                                    if (isset($evento['faixaEtariaEvento']) && !empty($evento['faixaEtariaEvento'])) {
                                        // Use o valor da faixa etária para acessar o array e exibir o valor correspondente
                                        echo $faixa_etaria[$evento['faixaEtariaEvento']];
                                    } else {
                                        // Se o valor não estiver definido ou for vazio, exiba uma mensagem de erro ou padrão
                                        echo "Faixa etária não especificada";
                                    }
                                    ?>
                                </spa>
                            </div>
                            <div class="col-md-5 d-flex centerInfo">
                                <img src="../../img/Usuario/icon-valor.png" alt="" style="width: 35px">
                                <span class="fw-bold ms-2" style="font-size: 1.2em;">Valor:</span>
                                <span class="ms-1" style="font-size: 1.2em;">
                                    <?php
                                    // array associativo para mapear os valores numéricos para os valores correspondentes
                                    $valores = array(
                                        '1' => 'Grátis',
                                        '2' => 'Pago',
                                        '3' => 'Outros'
                                    );

                                    // Verifique se o valor do evento está definido e não é vazio
                                    if (isset($evento['valorEvento']) && !empty($evento['valorEvento'])) {
                                        // Use o valor do evento para acessar o array e exibir o valor correspondente
                                        echo $valores[$evento['valorEvento']];
                                    } else {
                                        // Se o valor não estiver definido ou for vazio, exiba uma mensagem de erro ou padrão
                                        echo "Valor não especificado";
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="col-md-12 d-flex centerInfo">
                                <img src="../../img/Usuario/icon-local.png " alt="" style="width: 30px; height:35px">
                                <span class="fw-bold ms-2" style="font-size: 1.2em;">Local:</span>
                                <span class="ms-1" style="font-size: 1.2em;"><?= $evento['enderecoEvento']; ?>, <?= $evento['numeroEvento']; ?>, <?= $evento['complementoEvento']; ?> <?= $evento['bairroEvento']; ?> <?= $evento['cepEvento']; ?> <?= $evento['cidadeEvento']; ?> <?= $evento['ufEvento']; ?></span>
                            </div>
                            <div class="col-md-6 d-flex mb-5 centerInfo">
                                <img src="../../img/Usuario/icon-horario.png" alt="" style="width: 30px">
                                <span class="fw-bold ms-2" style="font-size: 1.2em;">Turno:</span>
                                <span class="ms-1" style="font-size: 1.2em;">
                                    <?php
                                    // array associativo para mapear os valores numéricos para os valores correspondentes
                                    $turnos = array(
                                        '1' => 'Manhã',
                                        '2' => 'Tarde',
                                        '3' => 'Noite'
                                    );

                                    // Verifique se o turno do evento está definido e não é vazio
                                    if (isset($evento['periodoEvento']) && !empty($evento['periodoEvento'])) {
                                        // Use o turno do evento para acessar o array e exibir o valor correspondente
                                        echo $turnos[$evento['periodoEvento']];
                                    } else {
                                        // Se o turno não estiver definido ou for vazio, exiba uma mensagem de erro ou padrão
                                        echo "Turno não especificado";
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="eventDesc col-md-4 d-flex align-items-center justify-content-center flex-column">
                        <h1 class="fw-bold fs-2 mb-5">
                            <?php
                            $nomeEvento = $evento['nomeEvento'];
                            $cores = ['#FFD417', '#6D9EAF', '#E6AEB2']; // Cores correspondentes a cada parte do nome do evento
                            $comprimento = mb_strlen($nomeEvento, 'UTF-8');

                            for ($i = 0; $i < $comprimento; $i++) {
                                $letra = mb_substr($nomeEvento, $i, 1, 'UTF-8');
                                echo "<span style='color: " . $cores[$i % count($cores)] . "'>" . $letra . "</span>";
                            }
                            ?>
                        </h1>
                        <p><?= $evento['descEvento']; ?></p>
                        <div class="button">
                            <button type="submit" class="border-0 rounded-5 mt-5" style="width: 15vw; height: 50px;min-width:200px">Registre interesse</button>
                        </div>
                        <a href="" style="color: #6D9EAF;" class="mt-2 mb-5">Clique para obter Informações detalhadas</a>
                    </div>
                </div>
                <footer class="w-100 h-auto d-flex align-items-center flex-column">
                    <div class="d-flex justify-content-center">
                        <div class="row d-flex align-items-start justify-content-evenly pt-4 g-4 text-start pt-5 row-footer" style="width: 90%;">
                            <div class="col-md-3">
                                <img src="../../img/Login/Cola AI logo.png" alt="" style="width: 60%; transform:translateY(-30px)" class="mb-2 me-auto">
                                <p style="font-size:1.3em; font-weight:bold; text-align:justify;transform:translateY(-30px); width:80%" class="m-0 p-0">Seja bem-vindo(a)! nós da Cola ai, pretendemos lhe ajudar a
                                    encontrar as melhores experiências para suas crianças.</p>
                            </div>
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-2">
                                <h4 style="color: #6D9EAF;" class="mb-4 fw-bold fs-3">Desenvolvedor</h4>
                                <p style="font-size:1em; font-weight:bold; text-align:justify; font-size: 1.2em">
                                    A Magma é uma empresa voltada ao setor de tecnologia da informação. <a href="" style="color: #6D9EAF">Saiba mais></a>
                                </p>
                            </div>
                            <div class="col-md-1 infoCol">
                                <h4 style="color: #6D9EAF;" class="mb-4 fw-bold fs-3">Info</h4>
                                <ul class="m-0 p-0" style="list-style: none; font-weight: bold; cursor:pointer">
                                    <li><a class="dropdown-item fw-bold fs-5" onclick="modalSobre(0,0)">Sobre</a></li>
                                    <li><a class="dropdown-item fw-bold fs-5" onclick="modalFeedback(0,0)">Feedback</a></li>
                                    <li><a class="dropdown-item fw-bold fs-5" onclick="modalContato(0,0)">Contato</a></li>
                                </ul>
                            </div>
                            <div class="col-md-2 pb-5">
                                <h4 style="color: #6D9EAF;" class="text-center fw-bold fs-3">Siga-nos</h4>
                                <div class="d-flex justify-content-center">
                                    <div class="social-container d-flex mt-4">
                                        <div class="social"><ion-icon name="logo-facebook"></ion-icon> </div>
                                        <div class="social"><ion-icon name="logo-instagram"></ion-icon></div>
                                        <div class="social"><ion-icon name="logo-twitter"></ion-icon></div>
                                    </div>
                                </div>
                            </div>
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