<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Cola Aí</title>
    <link rel="stylesheet" href="../../css/styleAdm.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css'>
    <link rel="stylesheet" href="../../css/styleUsuario.css">
    <link rel="stylesheet" href="../../css/styleUsuarioCadastro.css">
</head>
<body>
    <div class="container mt-2 ms-2" style="height: 8vh;">
        <img src="../../img/Login/Cola AI logo.png" alt="" style="height: 8vh;">
    </div>
    <div class="container-fluid" style="min-height: 90vh; height:90vh">
        <div class="row h-100 d-flex justify-content-center">
            <div class="col-lg-7 imageBox d-flex justify-content-center  align-items-center">
                <img src="../../img/Usuario/login-img.png" alt="" style="width: 90%;">
            </div>
            <div class="col-lg-4 formBox d-flex row align-items-center justify-content-center">
                <div class="inputBox h-auto rounded rounded-5 mb-5 mt-4 p-5">
                    <h1 class="text-center mt-2 mb-5 fs-2"><span style="color: #E6AEB2; font-size: 50px">Lo</span><span style="color: #6D9EAF; font-size: 50px">gin</span></h1>
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
                    <form action="../valida_login.php" method="post">
                        <input type="text" class="input-group mt-4" name="telefone" id="telefone" placeholder="Digite o seu telefone" data-mask="(00)00000-0000">
                        <div class="orgSenha d-flex mt-5">
                            <input required type="password" placeholder="Senha" name="senha" id="senha" class="input-group mb-4">
                            <i class="bi bi-eye col1" id="btnSenha" onclick="MostrarSenha()"></i>
                        </div>
                        <div class="f-password w-100 text-end">
                            <a href="" style="color: #6D9EAF;">Esqueci a senha</a>
                        </div>
                        <div class="f-password w-100 text-end">
                            <a href="./index.php" style="color: #6D9EAF;">Entrar com e-mail</a>
                        </div>
                        <div class="button w-100 d-flex pe-0 mt-5">
                            <button type="submit" class="border-0 rounded-3 ms-auto mb-4">Entrar</button>
                        </div>
                    </form>
                </div>
                <div class="inputBox mb-auto text-center p-2 rounded rounded-5">
                    <p class="m-0 p-0">Não tem uma conta? <a href="../Cadastro/" style="color: #6D9EAF; text-decoration:none">Cadastre-se</a></p>
                </div>
            </div>
        </div>
    </div>
    <!--Máscara-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="../../js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="../../js/personalizar.js"> </script>
    <script type="text/javascript" src="../../js/script.js"></script>
</body>
</html>