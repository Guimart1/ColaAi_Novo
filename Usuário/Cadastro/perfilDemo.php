<?php
require_once '../../dao/UserDao.php';
$user = new UserDao();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Perfil</title>
    <link rel="stylesheet" href="../../css/styleAdm.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css'>
    <link rel="stylesheet" href="../../css/styleUsuario.css">
</head>
<body class="fundo-bolinha">
    <div class="container-fluid mt-2 ms-2">
        <img src="../../img/Login/Cola AI logo.png" alt="" style="height: 10vh;">
    </div>
    <div class="container-fluid text-center" style="height:80vh">
            <h1 class="fs-3 mt-2">Este é o seu perfil</h1>
            <p>É assim como ele ficará visível para os perfis de<br> organizações e administradores do Cola Aí.</p>
            <div class="img-fluid perfilBox me-auto ms-auto mt-4 rounded rounded-4" style="width: 70vh;">
                <div class="position-relative">
                    <img src="../../img/Usuario/icon-user.png" class="position-absolute perfilIcon" alt="imagem Perfil" style="width: 12vh; height: 12vh; border-radius: 50%">
                    <img src="../../img/Usuario/banner-padrao.png" class="rounded rounded-4" alt="imagem Perfil" style="width: 100%;">
                </div>
                <div class="d-flex">
                    <div class="fill" style="width: 150px"></div>
                    <h2 class="text-start">
                   </h2>
                </div>

            </div>
            <div class="" style="height: 9%;"></div>
            <div class="row mb-auto mt-5">
                <div class="col-md-4"></div>
                <div class="col-md-4 col-12">
                    <div class="button">
                        <a href="./perfilCriado.php"><button class="border-0 rounded-3">Continuar</button></a>
                    </div>
                </div>
            </div>

    </div>
</body>
</html>