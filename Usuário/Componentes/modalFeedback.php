<div class="modal fade" id="modalFeedback" role="dialog"><!--Modal de FeedBack-->
        <div class=" modal-dialog modal-dialog-centered">
            <div class="modal-content rounded rounded-5 pb-4" style="background-color: #FFFBE7;">
                <div class="modal-header border-0 pt-4 m-0 p-0 pb-2">
                    <h1 class="modal-title fs-4 ps-5" id="exampleModalLabel">Feedback</h1>
                    <button type="button" class="btn-close me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5 pt-0 pb-1" style="color: #a6a6a6; text-align:justify">
                    <p>Nos ajude a melhorar a sua experiência como usuário, nos envie sugestões
                        e nos conte das suas melhores vivencias com o Cola Aí.</p>
                    <form method="post" action="./processFeedBack.php">
                        <input type="hidden" name="idUsuario" id="idUsuario" placeholder="id da organização" value="<?= isset($authUser['idUsuario']) ? $authUser['idUsuario'] : '' ?>" readonly>
                        <h2 class="fs-5 mt-3">Título</h2>
                        <div class="inputContato">
                            <input type="text" class="input-group mt-1" name="tituloFeedBackApp" placeholder="Título do feedback">
                        </div>
                        <h2 class="fs-5 mt-3">Comentário</h2>
                        <div class="inputContato">
                            <textarea class="form-control rounded rounded-4" name="descFeedbackApp" cols="30" rows="10" style="max-height: 300px;" placeholder="Escreva sua experiência  com o site, podendo ser sugestões, criticas e melhorias"></textarea>
                        </div>
                        <div class="btnModal w-100 mt-4 d-flex">
                            <button type="submit" id="btnEnviarFeedback" class="border border-0 ms-auto rounded rounded-5" value="SALVAR" name="acao">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>