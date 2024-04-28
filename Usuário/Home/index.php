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
                <li><a href="">Teatros</a></li>
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
        <h2 class="fs-3">Teatros</h2>
        <div class="glide mb-5" data-glide='{
        "loop": true,
        "perView": 4,
        "perMove": 4,
        "perSwipe": 4,
        "perTouch": 4,
        "gap":20,
        "type": "carousel"
        }' class="carrossel">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
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
        <div class="glide mb-5" data-glide='{
        "loop": true,
        "perView": 4,
        "perMove": 4,
        "perSwipe": 4,
        "perTouch": 4,
        "gap":20,
        "type": "carousel"
        }' class="carrossel">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
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
        <div class="glide mb-5" data-glide='{
        "loop": true,
        "perView": 4,
        "perMove": 4,
        "perSwipe": 4,
        "perTouch": 4,
        "gap":20,
        "type": "carousel"
        }' class="carrossel">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
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
        <div class="glide mb-5" data-glide='{
        "loop": true,
        "perView": 4,
        "perMove": 4,
        "perSwipe": 4,
        "perTouch": 4,
        "gap":20,
        "type": "carousel"
        }' class="carrossel">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
                    <li class="glide__slide"><img src="../../img/Usuario/carrossel-padrao.png" alt="" style="width: 100%;"></li>
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
                    <a class="dropdown-item fw-bold" onclick="modalSobre(0,0)"><li>Sobre</li></a>
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
    <div class="modal fade" id="modalSobre" role="dialog">
                        <div class=" modal-dialog modal-dialog-centered">
                            <div class="modal-content rounded rounded-5 pb-4" style="background-color: #FFFBE7;">
                                <div class="modal-header border-0 pt-4">
                                    <h1 class="modal-title fs-4 ps-5" id="exampleModalLabel">Sobre</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
</script>
</body>
</html>