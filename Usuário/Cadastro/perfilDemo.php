<?php 
  require_once "../../dao/UserDao.php";

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
<?php
    // Iniciar a sessão
    session_start();

    // Verificar se o índice 'Autenticado' existe ou é igual a 'SIM'
    if (!isset($_SESSION['AutenticacaoUser']) || $_SESSION['AutenticacaoUser'] != 'SIM') {
        // Redirecionar para o login com um erro2 se não estiver autenticado
        header('Location: login.php?login=erro2');
        exit();
    }

    //o usuário está autenticado
    $authUser = $_SESSION['user'];

    $idUsuario = $authUser['idUsuario']; // Supondo que o ID do usuário está armazenado na sessão

    // Busque os eventos em que o usuário registrou interesse
    //var_dump($eventosInteresse);
    // Verifique se o usuário já tem uma foto de perfil
    $imagemPerfil = ''; // Defina a variável como vazia inicialmente
    $imagemBanner = ''; // Defina a variável como vazia inicialmente

    if ($authUser && isset($authUser['imagemPerfilUsuario'])) {
        // Se o usuário tiver uma imagem de perfil, atribua à variável $imagemPerfil
        $imagemPerfil = $authUser['imagemPerfilUsuario'];
    }
    if ($authUser && isset($authUser['imagemBannerUsuario'])) {
        // Se o usuário tiver uma imagem de banner, atribua à variável $imagemBanner
        $imagemBanner = $authUser['imagemBannerUsuario'];
    }
?>

    <div class="container mt-2 ms-2">
        <img src="../../img/Login/Cola AI logo.png" alt="" style="height: 10vh;">
    </div>
    <div class="container-fluid text-center" style="height:80vh">
            <h1 class="fs-3 mt-2">Este é o seu perfil</h1>
            <p>É assim como ele ficará visível para os perfis de<br> organizações e administradores do Cola Aí.</p>
            <div class="perfilBox me-auto ms-auto mt-4 rounded rounded-4" style="width: 42vh;">
                <div class="position-relative">
                    <img src="../../img/Usuario/<?= $imagemPerfil != "" ? $imagemPerfil : 'icon-user.png'; ?>" class="img-fluid" alt="imagem Perfil" style="border-radius: 90px; height: auto; width: 200px;">
                    <img src="../../img/Usuario/<?= $imagemBanner != "" ? $imagemBanner : 'banner-padrao.png'; ?>" class="img-fluid" alt="imagem Perfil" style="border-radius: 90px; height: auto; width: 200px;">
                </div>
                <div class="d-flex">
                    <div class="fill" style="width: 220px"></div>
                    <h2 class="text-start">
                        <?php
                            if (isset($authUser['nomeUsuario'])) {
                                echo $authUser['nomeUsuario'];
                            } else {
                                echo "Nome de Usuário";
                            }
                        ?></h2>
                </div>

            </div>
            <div class="" style="height: 9%;"></div>
            <div class="row mb-auto mt-5">
                <div class="col-md-4"></div>
                <div class="col-md-4 col-12">
                    <div class="button">
                        <a href="../Home/">
                            <button class="border-0 rounded-3">Continuar</button>
                        </a>
                    </div>
                </div>
            </div>

    </div>
</body>
</html>