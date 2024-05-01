<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Cola Aí</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css'>
    <link rel="stylesheet" href="../../css/styleUsuarioCadastro.css">
</head>

<body style="background-color: #FFFBE7">

    <div class="col-md-12 ps-3 mt-2" style="height: 10vh;">
        <img src="../../img/Login/Cola AI logo.png" style="height: 70%;" alt="Logo Cola Aí">
    </div>

    <div class="row w-100 d-flex justify-content-center align-items-center g-4" style="height: 80vh;">
        <div class="col-md-7 d-flex justify-content-center align-items-center">
            <img src="../../img/Usuario/criança_arrumado.png" class="img-fluid" style="width: 85%;" alt="Crianças pulando">
        </div>
        <div class="col-md-5 d-flex justify-content-center">
            <div class="formulario rounded-5  p-3 rounded d-flex flex-column sombra">
                <!--Titulo-->
                <h1 class="text-center mb-5"><b style="color: #E6AEB0;">Ca</b><b style="color: #6DA2B1;">das</b><b style="color: #93CC4C;">tre</b><b style="color: #FFD417;">-se</b></h1>
                <form method="post" action="process.php" id="formulario">

                    <!--Nome e sobrenome-->
                    <div class="col-12 d-flex flex-row mb-4">
                        <input required type="text" placeholder="Nome" id="nome" name="nomeUsuario" class="input-group me-4">
                        <input required type="text" placeholder="Sobrenome" id="sobrenome" name="sobrenomeUsuario" class="input-group">
                    </div>

                    <!--Email-->
                    <input required type="email" placeholder="Email" id="email" name="emailUsuario" class="input-group mb-4">

                    <!--Celular-->
                    <input required type="tel" placeholder="Telefone" id="telefone" name="telUsuario" class="input-group mb-4" data-mask="(00)00000-0000">

                    <!--Senha-->
                    <div class="orgSenha d-flex">
                        <input required type="password" placeholder="Senha" id="senha" name="senhaUsuario" class="input-group mb-4">
                        <i class="bi bi-eye col1" id="btnSenha" onclick="MostrarSenha()"></i>
                    </div>

                    <!--Confirmar senha-->
                    <div class="orgSenha d-flex">
                        <input required type="password" id="senha1" placeholder="Confirmar senha" name="senhaUsuario" class="input-group mb-4">
                        <i class="bi bi-eye col1" id="btnSenha1" onclick="MostrarSenha2()"></i>
                    </div>
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
                    <!--Confirmar-->
                    <div class="col-12 d-flex justify-content-end">
                        <button id="botao" type="submit" class="botao btn fs-5" name="acao" value="SALVAR">Cadastre-se</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Script para mostrar ou não mostrar a senha-->
    <script>
        function MostrarSenha() {
            var inputPass = document.getElementById('senha')
            var btnShowPass = document.getElementById('btnSenha')

            if (inputPass.type === 'password') {
                inputPass.setAttribute('type', 'text')
                btnShowPass.classList.replace('bi-eye', 'bi-eye-slash')
            } else {
                inputPass.setAttribute('type', 'password')
                btnShowPass.classList.replace('bi-eye-slash', 'bi-eye')
            }
        }

        function MostrarSenha2() {
            var inputPass = document.getElementById('senha1')
            var btnShowPass = document.getElementById('btnSenha1')

            if (inputPass.type === 'password') {
                inputPass.setAttribute('type', 'text')
                btnShowPass.classList.replace('bi-eye', 'bi-eye-slash')
            } else {
                inputPass.setAttribute('type', 'password')
                btnShowPass.classList.replace('bi-eye-slash', 'bi-eye')
            }
        }
    </script>
    <script>
        //Impede o formulário de ser processado caso as senhas sejam diferentes
        document.getElementById("formulario").addEventListener("submit", function(event) {
        if (!verificarSenhas()) {
            event.preventDefault(); // Impede o envio do formulário se as senhas forem diferentes
        }
        });

        //Função que verifica se a senha e confirmar senha são iguais
        function verificarSenhas() {
        // Obtém os valores dos campos de senha e confirmar senha
        var senha = document.getElementById("senha").value;
        var confirmarSenha = document.getElementById("senha1").value;
        // Verifica se os valores são diferentes
        if (senha !== confirmarSenha) {
            //Caso sejam diferentes, exibe um alerta para o usuário
            alert("As senhas não coincidem. Por favor, verifique e tente novamente.");
            return false;
        } 
        return true;
    }
    </script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer>
    </script>
    <!--Máscara-->
    <script type="text/javascript" src="../../js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="../../js/personalizar.js"> </script>
</body>

</html>