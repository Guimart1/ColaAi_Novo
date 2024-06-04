<?php
require_once '../../dao/EventoDao.php';
require_once '../../dao/InteresseEventoDao.php';
$eventos = EventoDao::selectAllActive();
$eventosMaisInteresse = InteresseEventoDao::selectTopEventosMaisInteresse();
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
    $authUser = $_SESSION['user'];
    ?>
    <?php
    require_once('../Componentes/headerHome.php');
    require_once('../Componentes/modalEditarPerfil.php');
    ?>

    <div class="container mt-4" style="width: 80%;">
        <div class="glide mb-5" data-glide='{}'>
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <?php foreach ($eventosMaisInteresse as $evento) : ?>
                        <li class="glide__slide">
                            <a href="../Evento/evento.php?id=<?php echo $evento['idEvento']; ?>" style="text-decoration: none; color: inherit;">
                                <div class="imageBox position-relative" style="height: 300px;">
                                    <img src="../../img/Organizacao/<?= $evento['imagemEvento']; ?>" alt="imagem do evento" style="width: 100%; height: 100%; object-fit: cover;">
                                    <div class="descCard p-2 ps-4">
                                        <h3 class="fs-4"><?= $evento['nomeEvento']; ?></h3>
                                        <p><?= $evento['descEvento']; ?></p>
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
                <button class="glide__bullet" data-glide-dir="=3"></button>
                <button class="glide__bullet" data-glide-dir="=4"></button>
            </div>
        </div>


        <!-- <h2 class="fs-3">Próximos de você</h2>
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
                <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><img src="../../img/Usuario/arrow-previus.png" alt=""></button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><img src="../../img/Usuario/arrow-next.png" alt=""></button>
            </div>

            <div class="glide__bullets" data-glide-el="controls[nav]">
                <button class="glide__bullet" data-glide-dir="=0"></button>
                <button class="glide__bullet" data-glide-dir="=1"></button>
                <button class="glide__bullet" data-glide-dir="=2"></button>
            </div>
        </div> -->
        <div class="container">
            <?php
            $categorias = [
                'Teatros' => '3',
                'Parques' => '1',
                'Museus' => '2',
                'Centro Culturais' => '4',
                'Outros' => '5'
            ];

            foreach ($categorias as $nomeCategoria => $espacoEvento) :
                $eventos_filtrados = array_filter($eventos, function ($evento) use ($espacoEvento) {
                    return $evento['espacoEvento'] === $espacoEvento;
                });

                if (!empty($eventos_filtrados)) :
            ?>
                    <h2 id="carrossel-<?= strtolower(str_replace(' ', '', $nomeCategoria)); ?>" class="fs-3"><?= $nomeCategoria; ?></h2>
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
                                <?php foreach ($eventos_filtrados as $evento) : ?>
                                    <li class="glide__slide">
                                        <a href="../Evento/evento.php?id=<?= $evento['idEvento']; ?>">
                                            <div class="imageBox position-relative" style="width: 100%; height: 200px;">
                                                <img src="../../img/Organizacao/<?= $evento['imagemEvento']; ?>" alt="Imagem do evento" style="width: 100%; height: 100%; object-fit:cover;">
                                                <div class="descMini p-2 ps-4">
                                                    <h3 class="fs-4 tituloEvento"><?= $evento['nomeEvento']; ?></h3>
                                                    <p><?= $evento['descEvento']; ?></p>
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
            <?php
                endif;
            endforeach;
            ?>
        </div>

    </div>

    <!--inicio footer-->
    <?php
    require_once('../Componentes/footerLogado.php');
    require_once('../Componentes/modalFeedback.php');
    require_once('../Componentes/modalContato.php');
    require_once('../Componentes/modalSobre.php');
    ?>


    <script type="text/javascript" src="../../js/script.js"></script>
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