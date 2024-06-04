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
                <h1 class="text-center mb-5"><b style="color: #E6AEB0;">Ca</b><b style="color: #6DA2B1;">das</b><b style="color: #93CC4C;">tre</b><b style="color: #FFD417;">-se</b></h1>
                <form method="post" id="formulario">

                    <div class="col-12 d-flex flex-row mb-4">
                        <input required type="text" placeholder="Nome" id="nome" name="nomeUsuario" class="input-group me-4">
                        <input required type="text" placeholder="Sobrenome" id="sobrenome" name="sobrenomeUsuario" class="input-group">
                    </div>
                    <input required type="email" placeholder="Email" id="email" name="emailUsuario" class="input-group mb-4">
                    <input required type="tel" placeholder="Telefone" id="telefone" name="telUsuario" class="input-group mb-4" data-mask="(00)00000-0000">
                    <div class="orgSenha d-flex">
                        <input required type="password" placeholder="Senha" id="senha" name="senhaUsuario" class="input-group mb-4">
                        <i class="bi bi-eye col1" id="btnSenha" onclick="MostrarSenha()"></i>
                    </div>
                    <div class="orgSenha d-flex">
                        <input required type="password" id="senha1" placeholder="Confirmar senha" name="confirmarSenha" class="input-group mb-4">
                        <i class="bi bi-eye col1" id="btnSenha1" onclick="MostrarSenha2()"></i>
                    </div>
                    <div id="mensagemErro" class="text-danger mb-3" style="display:none;"></div>
                    <div id="mensagemErroSenha" class="text-danger mb-3" style="display:none;"></div>
                    <div class="col-12 d-flex justify-content-end">
                        <button id="botao" type="submit" class="botao btn fs-5" name="acao" value="SALVAR">Cadastre-se</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function MostrarSenha() {
            var inputPass = document.getElementById('senha');
            var btnShowPass = document.getElementById('btnSenha');

            if (inputPass.type === 'password') {
                inputPass.setAttribute('type', 'text');
                btnShowPass.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                inputPass.setAttribute('type', 'password');
                btnShowPass.classList.replace('bi-eye-slash', 'bi-eye');
            }
        }

        function MostrarSenha2() {
            var inputPass = document.getElementById('senha1');
            var btnShowPass = document.getElementById('btnSenha1');

            if (inputPass.type === 'password') {
                inputPass.setAttribute('type', 'text');
                btnShowPass.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                inputPass.setAttribute('type', 'password');
                btnShowPass.classList.replace('bi-eye-slash', 'bi-eye');
            }
        }

        document.getElementById('formulario').addEventListener('submit', function(event) {
            event.preventDefault(); // Impede o envio do formulário

            var senha = document.getElementById('senha').value;
            var confirmarSenha = document.getElementById('senha1').value;
            var mensagemErro = document.getElementById('mensagemErro');
            var mensagemErroSenha = document.getElementById('mensagemErroSenha');
            var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

            var formValido = true;

            if (!regex.test(senha)) {
                formValido = false;
                mensagemErro.style.display = 'block';
                mensagemErro.textContent = 'A senha deve ter pelo menos 8 caracteres, uma letra maiúscula, uma letra minúscula, um número e um caractere especial.';
            } else {
                mensagemErro.style.display = 'none';
            }

            if (senha !== confirmarSenha) {
                formValido = false;
                mensagemErroSenha.style.display = 'block';
                mensagemErroSenha.textContent = 'As senhas não coincidem.';
            } else {
                mensagemErroSenha.style.display = 'none';
            }

            if (formValido) {
                window.location.href = 'personalizar.php'; // Redireciona para a página personalizar.php
            }
        });
    </script>

    <script type="text/javascript" src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>
    <script type="text/javascript" src="../../js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="../../js/personalizar.js"> </script>
</body>

</html>
