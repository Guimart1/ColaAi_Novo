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
    $authUsuario = $_SESSION['user'];

    // Troca da imagem de perfil do usuário 
    // NÃO FUNCIONANDO
    if (!empty($_POST['idUsuario'])) {
        $id_Usuario = $_POST['idUsuario'];
        $user = UserDao::selectById($id_Usuario);
        $ImagemPerfil_Usuario = $user['imagemPerfilUsuario'];
    } else {
        $ImagemPerfil_Usuario = '';
        $id_Usuario = '';
    }
    ?>
    
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
                <a href="../TodosEventos/index.php"><img src="../../img/Usuario/icon-mapa.png" alt="" style="width: 40px; height:40px;"></a>
                <img src="../../img/Usuario/icon-notificacao.png" alt="">
                <img src="../../img/Usuario/icon-perfil.png" alt="">
            </div>

        </div>
    </nav>
        
    <!-- O banner está em background-image -->
    <!-- Os usuários deverão colocar um banner com proporções específicas -->
    <!-- Ao juntar com o banco, tornar background-position como center -->
    <div class="row d-flex align-items-end justify-content-center" style="height:400px; background-image: url('../../img/Usuario/banner-padrao.png'); background-position:bottom; background-size: cover; margin-bottom:25vh;">
        <div class="w-100 d-flex align-items-end justify-content-center" style="z-index: 1; margin-top: 300px;">
            <div class="w-100 d-flex align-items-center justify-content-start" style="height:auto;">
                <div class="d-flex align-items-end justify-content-start" style="width: 200px; height: 200px; margin-left: 5vw; position:relative;">
                    <div class="d-flex align-items-end justify-content-end">
                        <img src="../../img/Usuario/icon-user.png" class="img-fluid" alt="Alterar imagem" style="border-radius: 90px; height: auto; width: 200px;">
                        <div class="d-flex align-items-center justify-content-center" style="width: 30px; height: 30px; position:absolute;  margin-right: 20px; margin-bottom: 20px">
                            <ul class="m-0 p-0" onclick="modalFotoPerfil(0,0)" style="list-style: none; font-weight: bold; cursor:pointer;">
                                <li><img src="../../img/Usuario/icon-editar.png" class="img-fluid" alt="Alterar imagem" style="height: auto; width: auto;"></li>
                            </ul>
                        </div> 
                    </div>
                </div>
                <div class="d-flex align-items-start justify-content-center flex-column" style="width: 75%; height: 100px; position:relative; margin-top: 100px">
                    <ul class="m-0 p-0" onclick="modalDadosPessoais(0,0)" style="list-style: none; font-weight: bold; cursor:pointer;">
                        <li><h2 style="font-weight: bold; color: #FFD932">Usuário</h2></li>
                    </ul>
                    <ul class="m-0 p-0" onclick="modalSeguindo(0,0)" style="list-style: none; font-weight: bold; cursor:pointer;">
                        <li><h4 style="font-weight: bold; color: #A6A6A6">3 seguindo</h4></li>
                    </ul>
                    
                </div>
                <div class="d-flex align-items-center justify-content-center" style="height:auto; ">
                    <div style="width: 40px; height: 40px; margin-bottom: 100px; margin-right: 25px">
                        <ul class="m-0 p-0" onclick="modalBannerPerfil(0,0)" style="list-style: none; font-weight: bold; cursor:pointer;">
                            <li><img src="../../img/Usuario/icon-editar.png" class="img-fluid" alt="Alterar imagem"></li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>

    <div class="container mt-4" style="width: 80%;">
        <div class="glide mb-5" data-glide='{}'>

        <h2 class="fs-3">Eventos que foram registrado o interesse</h2>
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
                            <div class="d-flex align-items-start justify-content-start" style="width: 30px; height: 30px; position:absolute; margin:10px;">
                                <img src="../../img/Usuario/icon-coracao.png" class="img-fluid" style="height: auto; width: auto; border-radius: 0px">
                            </div> 
                            <img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;">
                            <div class="descMini p-2 ps-4 ">
                                <h3 class="fs-5">Nome do Evento</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>
                    </li>
                    <li class="glide__slide">
                        <div class="imageBox position-relative">
                            <div class="d-flex align-items-start justify-content-start" style="width: 30px; height: 30px; position:absolute; margin:10px;">
                                <img src="../../img/Usuario/icon-coracao.png" class="img-fluid" style="height: auto; width: auto; border-radius: 0px">
                            </div> 
                            <img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;">
                            <div class="descMini p-2 ps-4 ">
                                <h3 class="fs-5">Nome do Evento</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>
                    </li>
                    <li class="glide__slide">
                        <div class="imageBox position-relative">
                            <div class="d-flex align-items-start justify-content-start" style="width: 30px; height: 30px; position:absolute; margin:10px;">
                                <img src="../../img/Usuario/icon-coracao.png" class="img-fluid" style="height: auto; width: auto; border-radius: 0px">
                            </div> 
                            <img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;">
                            <div class="descMini p-2 ps-4 ">
                                <h3 class="fs-5">Nome do Evento</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>
                    </li>
                    <li class="glide__slide">
                        <div class="imageBox position-relative">
                            <div class="d-flex align-items-start justify-content-start" style="width: 30px; height: 30px; position:absolute; margin:10px;">
                                <img src="../../img/Usuario/icon-coracao.png" class="img-fluid" style="height: auto; width: auto; border-radius: 0px">
                            </div> 
                            <img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;">
                            <div class="descMini p-2 ps-4 ">
                                <h3 class="fs-5">Nome do Evento</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>
                    </li>
                    <li class="glide__slide">
                        <div class="imageBox position-relative">
                            <div class="d-flex align-items-start justify-content-start" style="width: 30px; height: 30px; position:absolute; margin:10px;">
                                <img src="../../img/Usuario/icon-coracao.png" class="img-fluid" style="height: auto; width: auto; border-radius: 0px">
                            </div> 
                            <img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;">
                            <div class="descMini p-2 ps-4 ">
                                <h3 class="fs-5">Nome do Evento</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>
                    </li>
                    <li class="glide__slide">
                        <div class="imageBox position-relative">
                            <div class="d-flex align-items-start justify-content-start" style="width: 30px; height: 30px; position:absolute; margin:10px;">
                                <img src="../../img/Usuario/icon-coracao.png" class="img-fluid" style="height: auto; width: auto; border-radius: 0px">
                            </div> 
                            <img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;">
                            <div class="descMini p-2 ps-4 ">
                                <h3 class="fs-5">Nome do Evento</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>
                    </li>
                    <li class="glide__slide">
                        <div class="imageBox position-relative">
                            <div class="d-flex align-items-start justify-content-start" style="width: 30px; height: 30px; position:absolute; margin:10px;">
                                <img src="../../img/Usuario/icon-coracao.png" class="img-fluid" style="height: auto; width: auto; border-radius: 0px">
                            </div> 
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
        </div>
        </div>
    </div>

<!--inicio footer-->
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
                    <h4 style="color: #6D9EAF;"  class="mb-4 fw-bold fs-3">Info</h4>
                    <ul class="m-0 p-0" style="list-style: none; font-weight: bold; cursor:pointer">
                        <li><a class="dropdown-item fw-bold fs-5" onclick="modalSobre(0,0)">Sobre</a></li>
                        <li><a class="dropdown-item fw-bold fs-5" onclick="modalFeedback(0,0)">Feedback</a></li>
                        <li><a class="dropdown-item fw-bold fs-5"onclick="modalContato(0,0)">Contato</a></li>
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
    <div class="modal fade" id="modalFeedback" role="dialog"><!--Modal de FeedBack-->
        <div class=" modal-dialog modal-dialog-centered">
            <div class="modal-content rounded rounded-5 pb-4" style="background-color: #FFFBE7;">
                <div class="modal-header border-0 pt-4 m-0 p-0 pb-2">
                    <h1 class="modal-title fs-4 ps-5" id="exampleModalLabel">Feedback</h1>
                    <button type="button" class="btn-close me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5 pt-0 pb-1" style="color: #a6a6a6; text-align:justify">
                    <p>Nos ajude a melhorar a sua experiência como usuário, nos envie sugestões
                        e nos conte das suas melhores vivencias com o Cola Aí.</p>
                    <form method="post" action="./processFeedBack.php">
                        <input type="hidden" name="idUsuario" id="idUsuario" placeholder="id da organização" value="<?= isset($authUser['idUsuario']) ? $authUser['idUsuario'] : '' ?>" readonly>
                        <h2 class="fs-5 mt-3">Título</h2>
                        <div class="inputContato">
                            <input type="text" class="input-group mt-1" name="tituloFeedBackApp" placeholder="Título do feedback">
                        </div>
                        <h2 class="fs-5 mt-3">Comentário</h2>
                        <div class="inputContato">
                            <textarea class="form-control rounded rounded-4" name="descFeedbackApp" cols="30" rows="10" style="max-height: 300px;" placeholder="Escreva sua experiência  com o site, podendo ser sugestões, criticas e melhorias"></textarea>
                        </div>
                        <div class="btnModal w-100 mt-4 d-flex">
                            <button type="submit" id="btnEnviarFeedback" class="border border-0 ms-auto rounded rounded-5" value="SALVAR" name="acao">Enviar</button>
                        </div>
                    </form>
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
                    <div class="inputContato">
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
    <div class="modal fade" id="modalFotoPerfil" role="dialog">
        <div class=" modal-dialog modal-dialog-centered">
            <div class="modal-content rounded rounded-5 pb-4" style="background-color: #FFFBE7;">
                <div class="modal-header border-0 pt-4 m-0 p-0 pb-2">
                    <h1 class="modal-title fs-4 ps-5" id="exampleModalLabel">Adicione uma foto ao perfil</h1>
                    <button type="button" class="btn-close me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5 pt-0 pb-1" style="color: #a6a6a6; text-align:justify">
                    <p>A sua foto de perfil ficará visível para os perfis deorganizações e administradores do Cola Aí.</p>
                    <form method="post" action="./processFeedBack.php">
                        <input type="hidden" name="idUsuario" id="idUsuario" placeholder="id da organização" value="<?= isset($authUser['idUsuario']) ? $authUser['idUsuario'] : '' ?>" readonly>
                        <input type="file" id="imagemPerfilUsuario" name="imagemPerfilUsuario" accept="image/*" style="display: none;">
                            <label for="imagemPerfilUsuario" class="d-flex justify-content-center" style="cursor: pointer; color: #6D9EAF;">
                                <img id="preview" src="../../img/Usuario/<?= $ImagemPerfil_Usuario!=""?$ImagemPerfil_Usuario:'add-foto.png';?>" alt="" style="width: 20%; min-width:250px" class="mt-5">
                            </label>
                        <div class="btnModal w-100 mt-4 d-flex">
                            <button type="submit" id="btnEnviarFeedback" class="border border-0 ms-auto rounded rounded-5" value="SALVAR" name="acao">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalBannerPerfil" role="dialog">
        <div class=" modal-dialog modal-dialog-centered">
            <div class="modal-content rounded rounded-5 pb-4" style="background-color: #FFFBE7;">
                <div class="modal-header border-0 pt-4 m-0 p-0 pb-2">
                    <h1 class="modal-title fs-4 ps-5" id="exampleModalLabel">Adicione um banner ao perfil</h1>
                    <button type="button" class="btn-close me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5 pt-0 pb-1" style="color: #a6a6a6; text-align:justify">
                    <p>O seu banner ficará visível para os perfis de organizações e administradores do Cola Aí.</p>
                    <form method="post" action="./processFeedBack.php">
                        <!--<input type="hidden" name="idUsuario" id="idUsuario" placeholder="id da organização" value="<?= isset($authUser['idUsuario']) ? $authUser['idUsuario'] : '' ?>" readonly>-->
                        <input type="file" id="imagemBannerUsuario" name="imagemBannerUsuario" accept="image/*" style="display: none;">
                            <label for="imagemBannerUsuario" class="d-flex justify-content-center" style="cursor: pointer; color: #6D9EAF;">
                                <img id="preview" src="../../img/Usuario/add-banner.png" alt="" style="width: 30%; min-width:250px" class="mt-5">
                            </label>
                        <div class="btnModal w-100 mt-4 d-flex">
                            <button type="submit" id="btnEnviarFeedback" class="border border-0 ms-auto rounded rounded-5" value="SALVAR" name="acao">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalDadosPessoais" role="dialog">
        <div class=" modal-dialog modal-dialog-centered">
            <div class="modal-content rounded rounded-5 pb-4" style="background-color: #FFFBE7;">
                <div class="modal-header border-0 pt-4 m-0 p-0 pb-2">
                    <h1 class="modal-title fs-4 ps-5" id="exampleModalLabel">Dados Pessoais</h1>
                    <button type="button" class="btn-close me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5 pt-0 pb-1" style="color: #a6a6a6; text-align:justify">
                    <p>O Cola Aí utiliza esses dados para manter sua segurança e elegibilidade de  perfil único.</p>
                    <form method="post" action="./processFeedBack.php">
                        <input type="hidden" name="idUsuario" id="idUsuario" placeholder="id da organização" value="<?= isset($authUser['idUsuario']) ? $authUser['idUsuario'] : '' ?>" readonly>
                        <h2 class="fs-5 mt-3">Nome</h2>
                        <div class="inputContato">
                            <input type="text" class="input-group mt-1" name="nomeUsuario" placeholder="Nome do usuário">
                        </div>
                        <h2 class="fs-5 mt-3">E-mail</h2>
                        <div class="inputContato">
                            <input type="text" class="input-group mt-1" name="emailUsuario" placeholder="E-mail do usuário">
                        </div>
                        <h2 class="fs-5 mt-3">Senha</h2>
                        <div class="inputContato d-flex">
                            <input required type="password" placeholder="Senha" name="senha" id="password" class="input-group mb-4" style="font-weight: 600; color: #a6a6a6">
                            <i class="bi bi-eye col1" id="btnSenha" onclick="MostrarSenha()"></i>
                        </div>
                        <div class="btnModal w-100 mt-4 d-flex">
                            <button type="submit" id="btnEnviarFeedback" class="border border-0 ms-auto rounded rounded-5" value="SALVAR" name="acao">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalSeguindo" role="dialog">
        <div class=" modal-dialog modal-dialog-centered">
            <div class="modal-content rounded rounded-5 pb-4" style="background-color: #F4FFEB;">
                <div class="modal-header border-0 pt-4 m-0 p-0 pb-2 d-flex align-items-center">
                    <h1 class="modal-title fs-3 ps-5" id="exampleModalLabel" style="color: #E6AEB2; font-weight: bold">SE</h1><h1 class="modal-title fs-3" id="exampleModalLabel" style="color: #6D9EAF; font-weight: bold">GUIN</h1><h1 class="modal-title fs-3" id="exampleModalLabel" style="color: #93CC4C; font-weight: bold">DO</h1>
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
    <script type="text/javascript" src="../../js/personalizar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
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
</body>

</html>