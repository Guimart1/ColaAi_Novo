<div class="modal fade" id="modalDadosPessoais" role="dialog">
        <div class=" modal-dialog modal-dialog-centered">
            <div class="modal-content rounded rounded-5 pb-4" style="background-color: #FFFBE7;">
                <div class="modal-header border-0 pt-4 m-0 p-0 pb-2">
                    <h1 class="modal-title fs-4 ps-5" id="exampleModalLabel">Dados Pessoais</h1>
                    <button type="button" class="btn-close me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5 pt-0 pb-1" style="color: #a6a6a6; text-align:justify">
                    <p>O Cola Aí utiliza esses dados para manter sua segurança e elegibilidade de perfil único.</p>
                    <form method="post" action="./processFeedBack.php">
                        <input type="hidden" name="idUsuario" id="idUsuario" placeholder="id da organização" value="<?= isset($authUser['idUsuario']) ? $authUser['idUsuario'] : '' ?>" readonly>
                        <h2 class="fs-5 mt-3">Nome</h2>
                        <div class="inputContato">
                            <input type="text" class="input-group mt-1" name="nomeUsuario" placeholder="Nome do usuário">
                        </div>
                        <h2 class="fs-5 mt-3">E-mail</h2>
                        <div class="inputContato">
                            <input type="text" class="input-group mt-1" name="emailUsuario" placeholder="E-mail do usuário">
                        </div>
                        <h2 class="fs-5 mt-3">Senha</h2>
                        <div class="inputContato d-flex">
                            <input required type="password" placeholder="Senha" name="senha" id="password" class="input-group mb-4" style="font-weight: 600; color: #a6a6a6">
                            <i class="bi bi-eye col1" id="btnSenha" onclick="MostrarSenha()"></i>
                        </div>
                        <div class="btnModal w-100 mt-4 d-flex">
                            <button type="submit" class="border border-0 ms-auto rounded rounded-5" value="SALVAR" name="acao">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>