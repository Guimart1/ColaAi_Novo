<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../css/styleLogin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css'>
</head>
<body class="w-100">
    <div class="header d-flex justify-content-center align-items-center">
        <img src="../img/Login/Cola AI logo.png" alt="">
    </div>
    <div class="box-center container-fluid w-100">
        <div class="row h-100 justify-content-center vw-100 align-items-center">
            <div class="form-box col-10 col-sm-9 col-md-4  rounded-4">
                <form action="../valida_login.php" method="post">
                
                    <div class="title-box h-25 p-md-5 pt-3 pb-3 text-center">
                        <h1 class="fw-bold"><span style="color: #E6AEB2;">Lo</span><span style="color: #6D9EAF;">gin</span></h1>
                        <p class="fs-4 m-0 p-0 text-center">Entre com o seu telefone</p>
                        <?php
                    if (isset($_GET['login']) && $_GET['login'] == "erro") {
                    ?>
                        <div class="text-danger" style="text-align: center;">
                            Usuário ou senha Inválido(s)
                        </div>

                    <?php
                    }

                    ?>
                    <?php
                    if (isset($_GET['login']) && $_GET['login'] == "erro2") {
                    ?>
                        <div class="text-danger" style="text-align: center;">
                            Usuário não fez o login!
                        </div>

                    <?php
                    }

                    ?>
                    </div>
                    <div class="input-box mt-1 mb-5 ps-md-5 pe-md-5">
                        <input type="text" class="input-group fs-5" name="telefone" placeholder="Digite o seu telefone" data-mask = "(00)00000-0000">
                    </div>
                    <div class="input-box mt-4 mb-3 ps-md-5 pe-md-5">
                        <div class="orgSenha d-flex">
                            <input type="password" name="senha" id="password" class="inputSenha col-12 fs-5" placeholder="Digite a sua senha" required>
                            <i class="bi bi-eye col1" id="btnSenha" onclick="MostrarSenha()"></i>
                        </div>
                    </div>
                    <div class="f-password w-100 text-end pe-md-5">
                        <a href="" class="fs-5 mb-4" id="text-senha">Esqueci a senha</a>
                    </div>
                    <div class="w-100 h-25 justify-content-end align-items-end d-flex pe-md-5 mt-5 pb-4" id="btn-box">
                        <button type="submit" class="border-0 rounded-3 fs-4">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../../js/script.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="../../js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="../../js/personalizar.js"> </script>
</body>
</html>