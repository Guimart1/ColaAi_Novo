
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
            <img src="../../img/Usuario/icon-notificacao.png" alt="">
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
<div class="selectPerfil rounded rounded-5 selectPerfil-off" id="select">
    <div class="d-flex p-2 ps-5 align-items-center optionPerfil">
        <img src="../../img/Usuario/icon-meuPerfil.png" alt="" style="width: 35px; height:35px" class="me-1">
        <a href="../Perfil/" class="fw-bold">Meu perfil</a>
    </div>
    <div class="d-flex p-2 ps-5 align-items-center optionPerfil">
        <img src="../../img/Usuario/icon-editar.png" alt=""  style="width: 32px; height:32px" class="me-1">
        <a class="fw-bold">Editar Perfil</a>
    </div>

    <div class="d-flex p-2 ps-5 align-items-center optionPerfil" style="border: none;">
        <img src="../../img/Usuario/icon-sair.png" alt=""  style="width: 32px; height:32px" class="me-1">
        <a class="fw-bold">Sair</a>
    </div>
</div>
</div>

<script>
        let nav = document.getElementById("nav")
        var i = 0

        function toggleNav() {
            if (i == 0) {
                nav.classList.add("navbarActive-on");
                nav.classList.remove("navbarActive-off");
                i = 1
            } else {
                nav.classList.add("navbarActive-off");
                nav.classList.remove("navbarActive-on");
                i = 0
            }
        }
</script>
<script>
    let select = document.getElementById("select")
    var j = 0
    function ToggleSelect(){
        if (j == 0) {
                select.classList.add("selectPerfil-on");
                select.classList.remove("selectPerfil-off");
                j = 1
            } else {
                select.classList.add("selectPerfil-off");
                select.classList.remove("selectPerfil-on");
                j = 0
            }
    }
</script>