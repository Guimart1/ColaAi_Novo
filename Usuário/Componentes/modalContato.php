<div class="modal fade" id="modalContato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded rounded-5 pb-4" style="background-color: #FFFBE7;">
            <div class="modal-header border-0 pt-4 m-0 p-0 pb-2">
                <h1 class="modal-title fs-4 ps-5" id="exampleModalLabel">Contato</h1>
                <button type="button" class="btn-close me-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5 pt-0 pb-1" style="color: #a6a6a6; text-align:justify">
                <p>Entre em contato com a nossa equipe de colaboradores e seja atendido por profissionais capacitados e interessados para oferecer a melhor vivência no Cola Aí.</p>
                <form action="../Home/processContato.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="idUsuario" id="idUsuario" placeholder="id da organização" value="<?= isset($authUser['idUsuario']) ? $authUser['idUsuario'] : '' ?>" readonly>
                    <h2 class="fs-5 mt-3">Título</h2>
                    <div class="inputContato">
                        <input type="text" class="input-group mt-1 form-control" name="tituloContatoUsuario" placeholder="Título do contato" required>
                    </div>
                    <h2 class="fs-5 mt-3">Motivo de Contato</h2>
                    <select class="selectModal rounded rounded-4 form-select" name="idCategoriaContatoUsuario" aria-label="Default select example" required>
                        <option value="" selected disabled>Selecione</option>    
                        <option value="1">Suporte Técnico</option>
                        <option value="2">Denúncia</option>
                        <option value="3">Outros</option>
                    </select>
                    <!-- <h2 class="fs-5 mt-3">Categoria da denúncia</h2>
                    <select class="selectModal rounded rounded-4 form-select" name="categoriaContatoUsuario" aria-label="Default select example" required>
                        <option value="1">Organização</option>
                        <option value="2">Publicação</option>
                        <option value="3">Eventos</option>
                        <option value="4">Outros</option>
                    </select> -->
                    <h2 class="fs-5 mt-3">Descrição</h2>
                    <div class="inputContato">
                        <textarea class="form-control rounded rounded-4" name="descContatoUsuario" cols="30" rows="10" style="max-height: 300px;" placeholder="Descreva o motivo do seu contato." required></textarea>
                    </div>
                    <!-- <h2 class="fs-5 mt-3">Inserir imagem</h2>
                    <div class="position-relative">
                        <img src="../../img/Usuario/add-image.png" alt="" style="width: 25px; position:absolute; left: 90%; top:23%">
                        <label for="file-upload" class="fileInput rounded rounded-4">
                            Carregar imagem
                        </label>
                        <input id="file-upload" type="file" name="imagem" class="form-control-file">
                    </div>
                    <p style="color: #6D9EAF; font-size:0.9em" class="mt-3">As imagens serão reservadas e sem fins lucrativas, serão apenas para auxílio na resolução dos problemas</p> -->
                    <div class="btnModal w-100 mt-4 d-flex">
                        <button type="submit" class="border border-0 ms-auto rounded rounded-5" value="SALVAR" name="acao">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
