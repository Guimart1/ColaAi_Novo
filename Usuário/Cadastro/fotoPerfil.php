<?php
session_start(); // Inicia a sessão
require_once(__DIR__ . '../../../Adm/Componentes/modal.php');
require_once(__DIR__ . '../../../dao/UserDao.php');

// Verifica se o formulário foi enviado
if (!empty($_POST['idUsuario'])) {
    $id_Usuario = $_POST['idUsuario'];
    // Se estiver atualizando, você também precisa buscar o usuário no banco de dados para obter a imagem atual
    $user = UserDao::selectById($id_Usuario);
    $ImagemPerfil_Usuario = $user['imagemPerfilUsuario'];
} else {
    $ImagemPerfil_Usuario = '';
    $id_Usuario = '';
}
?>
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
        <img src="../../img/Login/Cola AI logo.png" alt="" style="height: 5.4vh;">
    </div>
    <div class="container-fluid text-center" style="height:92vh">
        <form action="banner.php" method="post" enctype="multipart/form-data"> <!-- Adicionado enctype para upload de arquivos -->  
            <h1 class="fs-3 mt-3">Adicione uma foto ao perfil</h1>
            <p>A sua foto de perfil ficará visível para os perfis de<br> organizações e administradores do Cola Aí.</p>
            <!-- Input do tipo file para seleção de imagem -->
            <img id="preview" src="../../img/Usuario/<?= $ImagemPerfil_Usuario!=""?$ImagemPerfil_Usuario:'add-foto.png';?>" alt="" style="width: 20%; min-width:250px" class="mt-5">
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

    <script>
        // Função para atualizar a pré-visualização da imagem
        document.getElementById('imagemPerfilUsuario').addEventListener('change', function(event) {
            var file = event.target.files[0]; // Obtém o arquivo selecionado
            var reader = new FileReader(); // Cria um objeto FileReader

            // Função de callback que será executada quando a leitura do arquivo estiver completa
            reader.onload = function(e) {
                // Atualiza a imagem de pré-visualização com a imagem selecionada
                document.getElementById('preview').src = e.target.result;
            }

            // Inicia a leitura do arquivo como URL de dados
            reader.readAsDataURL(file);
        });
    </script>
</body>

</html>
