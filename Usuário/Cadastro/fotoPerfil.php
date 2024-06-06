<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foto de Perfil</title>
    <link rel="stylesheet" href="../../css/styleAdm.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css'>
    <link rel="stylesheet" href="../../css/styleUsuario.css">
</head>

<body class="fundo-bolinha">
    <div class="container mt-2 ms-2">
        <img src="../../img/Login/Cola AI logo.png" alt="" style="height: 10vh;">
    </div>
    <div class="container-fluid text-center" style="height:80vh">
        <form action="banner.php" method="post" enctype="multipart/form-data"> <!-- Adicionado enctype para upload de arquivos -->  
            <h1 class="fs-3 mt-3">Adicione uma foto ao perfil</h1>
            <p>A sua foto de perfil ficará visível para os perfis de<br> organizações e administradores do Cola Aí.</p>
            <!-- Input do tipo file para seleção de imagem -->
            <img id="preview" src="../../img/Usuario/add-foto.png" alt="" style="width: 20%; min-width:250px" class="mt-5">
            <div class="" style="height: 50px;"></div>
            <div class="row mb-auto mt-5">
                <div class="col-md-4"></div>
                <div class="col-md-4 col-6   text-center">
                    <!-- Input file e label -->
                    <input type="file" id="imagemPerfilUsuario" name="imagemPerfilUsuario" accept="image/*" style="display: none;">
                    <label for="imagemPerfilUsuario" style="cursor: pointer; color: #6D9EAF;">Adicionar imagem</label>
                </div>
                <div class="col-md-4 col-6">
                    <!-- Mantido o botão para continuar -->
                    <div class="button">
                        <a href="banner.php"><button class="border-0 rounded-3">Continuar</button></a>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>

</html>
