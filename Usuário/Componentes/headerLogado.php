
<nav>
    <div class="navigation">
        <div class="imgHeader ms-5">
            <img src="../../img/Login/Cola AI logo.png" alt="" class="img-fluid mb-2 logoHeader">
        </div>
        <a href="../Home/index.php" class=" me-auto ms-5 fs-5">Página Inicial</a>
        <div class="iconBox me-5" style="width: 15%;">
            <a href="../TodosEventos/index.php"><img src="../../img/Usuario/icon-mapa.png" alt="" style="width: 35px; height:35px;"></a>
            <img src="../../img/Usuario/icon-notificacao.png" alt="">
            <a href="../Perfil/index.php"><img src="../../img/Usuario/icon-perfil.png" alt=""></a>
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

<div class="navbarActive" id="nav">
    <div class="linkActive p-3">
        <a href="../Home/index.php">Página Inicial</a>
    </div>
    <div class="iconBoxActive">
        <a href="../TodosEventos/index.php"><img src="../../img/Usuario/icon-mapa.png" alt="" style="width: 40px; height:40px;"></a>
        <img src="../../img/Usuario/icon-notificacao.png" alt="">
        <a href="../Perfil/index.php"><img src="../../img/Usuario/icon-perfil.png" alt=""></a>
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
    function ToggleSelect(){
        if (selectAtivo == 0) {
                select.classList.add("selectPerfil-on");
                select.classList.remove("selectPerfil-off");
                selectAtivo = 1
            } else {
                select.classList.add("selectPerfil-off");
                select.classList.remove("selectPerfil-on");
                selectAtivo = 0
            }
    }
</script>
