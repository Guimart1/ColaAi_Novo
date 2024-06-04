<div class="modal fade" id="modalDadosPessoais" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded rounded-5 pb-4" style="background-color: #FFFBE7;">
            <div class="modal-header border-0 pt-4 m-0 p-0 pb-2">
                <h1 class="modal-title fs-4 ps-5" id="exampleModalLabel">Dados Pessoais</h1>
                <button type="button" class="btn-close me-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5 pt-0 pb-1" style="color: #a6a6a6; text-align:justify">
                <p>O Cola Aí utiliza esses dados para manter sua segurança e elegibilidade de perfil único.</p>
                <form id="formDadosPessoais" method="post">
                    <input type="hidden" name="idUsuario" id="idUsuario" value="<?= isset($authUser['idUsuario']) ? $authUser['idUsuario'] : '' ?>" readonly>
                    <h2 class="fs-5 mt-3">Nome</h2>
                    <div class="inputContato">
                        <input type="text" class="input-group mt-1" name="nomeUsuario" id="nomeUsuario" value="<?= isset($authUser['nomeUsuario']) ? $authUser['nomeUsuario'] : '' ?>" disabled>
                    </div>
                    <h2 class="fs-5 mt-3">Sobrenome</h2>
                    <div class="inputContato">
                        <input type="text" class="input-group mt-1" name="sobrenomeUsuario" id="sobrenomeUsuario" value="<?= isset($authUser['sobrenomeUsuario']) ? $authUser['sobrenomeUsuario'] : '' ?>" disabled>
                    </div>
                    <h2 class="fs-5 mt-3">Telefone</h2>
                    <div class="inputContato d-flex">
                        <input required type="text" name="telUsuario" id="telUsuario" class="input-group mb-4" value="<?= isset($authUser['telUsuario']) ? $authUser['telUsuario'] : '' ?>" disabled>
                    </div>
                    <h2 class="fs-5 mt-3">E-mail</h2>
                    <div class="inputContato">
                        <input type="text" class="input-group mt-1" name="emailUsuario" id="emailUsuario" value="<?= isset($authUser['emailUsuario']) ? $authUser['emailUsuario'] : '' ?>" disabled>
                    </div>
                    <h2 class="fs-5 mt-3">Senha</h2>
                    <div class="inputContato d-flex">
                        <input required type="password" name="senhaUsuario" id="senhaUsuario" class="input-group mb-4" value="<?= isset($authUser['senhaUsuario']) ? $authUser['senhaUsuario'] : '' ?>" disabled>
                        <i class="bi bi-eye col1" id="btnSenha" onclick="MostrarSenha()"></i>
                    </div>
                    <div class="btnModal w-100 mt-4 d-flex">
                        <button type="button" class="border border-0 ms-auto rounded rounded-5" id="btnAtualizar">Atualizar</button>
                        <button type="submit" class="border border-0 ms-auto rounded rounded-5 ms-2" value="SALVAR" name="acao">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('btnAtualizar').addEventListener('click', function() {
    document.getElementById('nomeUsuario').disabled = false;
    document.getElementById('sobrenomeUsuario').disabled = false;
    document.getElementById('telUsuario').disabled = false;
    document.getElementById('emailUsuario').disabled = false;
    document.getElementById('senhaUsuario').disabled = false;
});

document.getElementById('formDadosPessoais').addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(this);

    fetch('../Perfil/processModalEditarPerfil.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert(data.message);
            window.location.href = data.redirect;
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error('Error:', error));
});
</script>
