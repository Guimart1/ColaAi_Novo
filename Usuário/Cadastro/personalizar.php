<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css'>
    <link rel="stylesheet" href="../../css/styleUsuarioCadastro.css">
    <link rel="stylesheet" href="../../css/styleUsuario.css">
</head>

<body>

    <div class="col-md-12 ps-3 mt-2" style="height: 10vh;">
        <img src="../../img/Login/Cola AI logo.png" style="height: 70%;" alt="Logo Cola Aí">
    </div>

    <div class="row w-100 d-flex justify-content-center align-items-center g-4" style="height: 80vh;">
        <div class="col-md-7 d-flex justify-content-center align-items-center">
            <img src="../../img/Usuario/criança_arrumado.png" class="img-fluid" style="width: 85%;" alt="Crianças pulando">
        </div>
        <div class="col-md-5 d-flex justify-content-center">
            <div class="formulario rounded-5  p-4 rounded d-flex flex-column sombra pt-5 pb-5">
                <!--Titulo-->
                <h1 class="fs-4">Vamos personalizar o seu perfil?</h1>  
                <p class="fs-5">Agora vamos atualizar o seu perfil, para deixar o Cola Aí com a sua melhor identidade.</p> 
                <p style="font-size: 0.8em;">
                    Ao clicar em Continuar, você aceita o <a href=""  style="color: #6D9EAF;">Contrato do Usuário</a>, a <a href=""  style="color: #6D9EAF;">Política de Privacidade</a>
                    e a <a href="" style="color: #6D9EAF;">Política de Cookies</a> do Cola Aí.
                </p>
                <form action="processFotoPerfil.php" method="post">
                    <input type="hidden">
                    <div class="col-12 d-flex justify-content-end"><a href="fotoPerfil.php">
                        <button id="botao" type="submit" name="acao" class="botao btn fs-5" value="SELECTID">Continuar</button>
                        </a>
                    </div>
                </form>                
            </div>
            
        </div>
    </div>

    <!--Script para mostrar ou não mostrar a senha-->
    <script>
        function MostrarSenha(){
            var inputPass = document.getElementById('senha')
            var btnShowPass = document.getElementById('btnSenha')

            if(inputPass.type === 'password'){
                inputPass.setAttribute('type', 'text')
                btnShowPass.classList.replace('bi-eye', 'bi-eye-slash')
            } else {
                inputPass.setAttribute('type', 'password')
                btnShowPass.classList.replace('bi-eye-slash', 'bi-eye')
            }
        }
        function MostrarSenha2(){
            var inputPass = document.getElementById('senha1')
            var btnShowPass = document.getElementById('btnSenha1')

            if(inputPass.type === 'password'){
                inputPass.setAttribute('type', 'text')
                btnShowPass.classList.replace('bi-eye', 'bi-eye-slash')
            } else {
                inputPass.setAttribute('type', 'password')
                btnShowPass.classList.replace('bi-eye-slash', 'bi-eye')
            }
        }
    </script>
    <script>
        function myFunction() {
        var x = document.getElementById("senha");
        var y = document.getElementById("senha1")
        if (x.type === "password") {
            x.type = "text";
            y.type = "text";
        } else {
            x.type = "password";
            y.type = "password";
        }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"  crossorigin="anonymous" defer>
    </script>
    <!--Máscara-->
    <script type="text/javascript" src="../../js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="../../js/personalizar.js"> </script>
</body>
</html> 