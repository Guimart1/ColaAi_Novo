
<nav>
    <div class="navigation">
        <div class="imgHeader">
            <img src="../../img/Login/Cola AI logo.png" alt="" class="img-fluid mb-2 logoHeader">
        </div>
        <a href="#carrossel-teatros">Teatros</a>
        <a href="#carrossel-parques">Parques</a>
        <a href="#carrossel-museus">Museus</a>
        <a href="#carrossel-centroCulturais">Centros Culturais</a>
        <div class="iconBox">
            <a href="../TodosEventos/index.php"><img src="../../img/Usuario/icon-mapa.png" alt="" style="width: 35px; height:35px;"></a>
            <img src="../../img/Usuario/icon-notificacao.png" alt="" onclick="toggleNotificacao()">
            <img src="../../img/Usuario/icon-perfil.png" alt="" onclick="ToggleSelect()">
        </div>
        <div class="hamburger burgerUsuario" onclick="toggleNav(), toggleHamburger()">
                <input class="checkbox" type="checkbox"/>
                <svg fill="none" viewBox="0 0 50 50" height="50" width="50">
                    <path class="lineTop line" stroke-linecap="round" stroke-width="4" stroke="black" d="M6 11L44 11"></path>
                    <path stroke-linecap="round" stroke-width="4" stroke="black" d="M6 24H43" class="lineMid line"></path>
                    <path stroke-linecap="round" stroke-width="4" stroke="black" d="M6 37H43" class="lineBottom line"></path>
                </svg>
            </div>
        </div>
</nav>
<div class="navbarActive" id="nav">
    <div class="linkActive p-3">
    <a href="#carrossel-teatros">Teatros</a>
        <a href="#carrossel-parques">Parques</a>
        <a href="#carrossel-museus">Museus</a>
        <a href="#carrossel-centroCulturais">Centros Culturais</a>
        <a href="#carrossel-centroCulturais">Seguindo</a>
        <a href="#carrossel-centroCulturais">Registro de interesse</a>
    </div>
    <div class="iconBoxActive">
        <a href="../TodosEventos/index.php"><img src="../../img/Usuario/icon-mapa.png" alt="" style="width: 40px; height:40px;"></a>
        <img src="../../img/Usuario/icon-notificacao.png" alt="">
        <a href="../Perfil/index.php"><img src="../../img/Usuario/icon-perfil.png" alt=""></a>
    </div>
</div>


<div class="position-relative">
    <div class="notificacaoBox rounded rounded-5 p-4 notb notiBox-off" id="NotificacaoBox">
            <h4 class="text-center fw-bold" style="font-family: IntroRust;"><span style="color: #E6AEB2;">NO</span><span style="color: #6D9EAF;">TI</span><span style="color: #CAEDFF;">FI</span><span style="color: #FFD417;">CA</span><span style="color: #E6AEB2">ÇÕES</span></h4>
            <h5 style="font-size: 1.2em;" class="fw-bold">Últimos 7 dias</h5>
            <div class="d-flex mb-4">
                <div class="col-md-3">
                    <img src="../../img/Usuario/org-magma.png" class="img-fluid" alt="Alterar imagem" style="border-radius: 90px; height: auto; width: 85px;">
                </div>
                <div class="col-md-8 d-flex align-items-center">
                    <p class="m-0 ms-2" style="text-align: justify; font-size:0.9em">A organização Magma publicou novos eventos</p>
                </div>
            </div>
            <div class="d-flex">
                <div class="col-md-3">
                    <img src="../../img/Usuario/org-ceu.png" class="img-fluid" alt="Alterar imagem" style="border-radius: 90px; height: auto; width: 85px;">
                </div>
                <div class="col-md-8 d-flex align-items-center">
                    <p class="m-0 ms-2" style="text-align: justify; font-size:0.9em">A organização fabrica de cultura publicou novos eventos</p>
                </div>
            </div>
            <h5 style="font-size: 1.2em;" class="mt-2 fw-bold">Últimos 30 dias</h5>
            <div class="d-flex">
                <div class="col-md-3">
                    <img src="../../img/Usuario/org-centro.png" class="img-fluid" alt="Alterar imagem" style="border-radius: 90px; height: auto; width: 85px;">
                </div>
                <div class="col-md-8 d-flex align-items-center">
                    <p class="m-0 ms-2" style="text-align: justify; font-size:0.9em">Uma nova organização se aliou a nós, à siga e veja seus futuros eventos</p>
                </div>
            </div>
        </div>
</div>

<div class="position-relative">
    <div class="selectPerfil rounded rounded-5 selectPerfil-off" id="select">
        <div class="d-flex p-2 ps-5 align-items-center optionPerfil">
            <img src="../../img/Usuario/icon-meuPerfil.png" alt="" style="width: 35px; height:35px" class="me-1">
            <a href="../Perfil/" class="fw-bold">Meu perfil</a>
        </div>
        <div class="d-flex p-2 ps-5 align-items-center optionPerfil">
            <img src="../../img/Usuario/icon-editar.png" alt=""  style="width: 32px; height:32px" class="me-1">
            <a class="fw-bold" >Editar Perfil</a> <!--Chamar o modal de editar dados do perfil-->
        </div>

        <div class="d-flex p-2 ps-5 align-items-center optionPerfil" style="border: none;">
            <img src="../../img/Usuario/icon-sair.png" alt=""  style="width: 32px; height:32px" class="me-1">
            <a class="fw-bold" href="../logoff.php">Sair</a>
        </div>
    </div>
</div>




<script>
        let nav = document.getElementById("nav")
        var navAtiva = 0

        function toggleNav() {
            if (navAtiva == 0) {
                nav.classList.add("navbarActive-on");
                nav.classList.remove("navbarActive-off");
                navAtiva = 1
            } else {
                nav.classList.add("navbarActive-off");
                nav.classList.remove("navbarActive-on");
                navAtiva = 0
            }
        }
</script>
<script>
    let select = document.getElementById("select")
    var selectAtivo = 0
    let notify = document.getElementById("NotificacaoBox")
    var notiAtivo = 0
    function ToggleSelect(){
        if (selectAtivo == 0) {
                select.classList.add("selectPerfil-on");
                select.classList.remove("selectPerfil-off");
                selectAtivo = 1
                notiAtivo = 0
                notify.classList.add("notiBox-off");
                notify.classList.remove("notiBox-on");
            } else {
                select.classList.add("selectPerfil-off");
                select.classList.remove("selectPerfil-on");
                selectAtivo = 0
            }
    }


        function toggleNotificacao(){
            if (notiAtivo == 0) {
                notify.classList.add("notiBox-on");
                notify.classList.remove("notiBox-off");
                notiAtivo = 1
                selectAtivo = 0
                select.classList.add("selectPerfil-off");
                select.classList.remove("selectPerfil-on");
            }else {
                notify.classList.add("notiBox-off");
                notify.classList.remove("notiBox-on");
                notiAtivo = 0
            }
        }
    </script>