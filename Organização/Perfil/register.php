<?php
session_start(); // Inicia a sessão
require_once(__DIR__ . '../../../Adm/Componentes/modal.php');
require_once(__DIR__ . '../../../dao/OrganizacaoDao.php');

if (!empty($_POST)) {
    $id_Org = $organizacaoDao['idOrganizacaoEvento'];
    $nome_Org =  $organizacaoDao['nomeOrganizacaoEvento'];
    $cnpj_Org =  $organizacaoDao['cnpjOrganizacaoEvento'];
    $cep_Org = $organizacaoDao['cepOrganizacaoEvento'];
    $endereco_Org = $organizacaoDao['enderecoOrganizacaoEvento'];
    $num_Org = $organizacaoDao['numeroOrganizacaoEvento'];
    $complemento_Org = $organizacaoDao['complementoOrganizacaoEvento'];
    $bairro_Org = $organizacaoDao['bairroOrganizacaoEvento'];
    $cidade_Org = $organizacaoDao['cidadeOrganizacaoEvento'];
    $uf_Org = $organizacaoDao['ufOrganizacaoEvento'];
    $tel_Org = $organizacaoDao['telOrganizacaoEvento'];
    $email_Org = $organizacaoDao['emailOrganizacaoEvento'];
    $senha_Org = $organizacaoDao['senhaOrganizacaoEvento'];
    $link_Org = $organizacaoDao['linkSiteOrganizacaoEvento'];
    // $fotoPerfil_Org = $organizacaoDao['imagemOrganizacaoEvento'];
    $desc_Org = $organizacaoDao['descOrganizacaoEvento'];
} else {
    $nome_Org = '';
    $cnpj_Org = '';
    $cep_Org = '';
    $endereco_Org = '';
    $num_Org = '';
    $complemento_Org = '';
    $bairro_Org = '';
    $cidade_Org = '';
    $uf_Org = '';
    $tel_Org = '';
    $email_Org = '';
    $senha_Org = '';
    $link_Org = '';
    // $fotoPerfil_Org = '';
    $desc_Org = '';
    $id_Org = '';
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil Organização</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"> <!-- CSS Projeto -->
    <link rel="stylesheet" href="../../css/styleAdm.css">

</head>

<body style="justify-content: center; align-items: center; height: 100vh ">
<?php
    // Verificar se o índice 'Autenticado' existe ou é igual a 'SIM'
    if (!isset($_SESSION['AutenticaoOrg']) || $_SESSION['AutenticaoOrg'] != 'SIM') {
        // Redirecionar para o login com um erro2 se não estiver autenticado
        header('Location: loginEmail.php?login=erro2');
        exit();
    }

    //o usuário está autenticado
    $authUserOrg = $_SESSION['userOrg'];
    ?>
    <?php
    include('../../Adm/Componentes/header.php');
    ?>
    <div class="container-fluid" style="height: 90vh">
        <div class="hamburger-wrapper">
            <div class="hamburger" onclick="toggleSidebar(), toggleHamburger()">
                <input class="checkbox" type="checkbox" />
                <svg fill="none" viewBox="0 0 50 50" height="50" width="50">
                    <path class="lineTop line" stroke-linecap="round" stroke-width="4" stroke="black" d="M6 11L44 11"></path>
                    <path stroke-linecap="round" stroke-width="4" stroke="black" d="M6 24H43" class="lineMid line"></path>
                    <path stroke-linecap="round" stroke-width="4" stroke="black" d="M6 37H43" class="lineBottom line"></path>
                </svg>
            </div>
        </div>
        <div class="row h-100">
            <?php
            include('../../Adm/Componentes/menu.php')
            ?>
            <div class="col-md-9 p-4  align-items-center d-flex flex-column" id="data-box" style="background-blend-mode: darken; background-color: #E8E8E8;">
            <div class="headerPerfil d-flex mt-4 rounded rounded-4" style="width: 90%; background-color:#fff; min-height:90px" >
                <div class="textBox h-100 d-flex align-items-center justify-content-evenly rounded rounded-4 " style="background-color: #FFF7D1; width:20%;">
                    <img src="../../img/Admin/icon-usuario.png" alt="" style="height: 50px; width:50px">
                    <h2 class="fs-2 m-0" style="color: #a6a6a6">Meu Perfil</h2>
                </div>
                <h2 class="mt-auto mb-auto ms-5" style="color: #a6a6a6">Alterar dados do perfil</h2>
            </div>
                <div class="d-flex flex-column w-75 border border-1 rounded rounded-4 mt-5 " style="background-color: #FFFFFF;" id="formBox">
                    <h1 class="text-center mt-5 fs-2" style="color: #a6a6a6;">Organização - Dados do perfil</h1>
                    <form method="post" action="process.php" enctype="multipart/form-data" class="needs-validation w-100 h-100 p-4" novalidate>
                        <input type="hidden" name="idOrganizacaoEvento" id="idOrganizacaoEvento" placeholder="id" value="<?= $id_Org ?>">
                        <input type="hidden" value="<?= $id_Org ? 'ATUALIZAR' : 'SALVAR' ?>" name="acao">
                        <div class="row">
                            <div class="col-md-6 mb-3 needs-validation">
                                <label for="nomeOrganizacao" class="col-form-label">Nome da Organização*</label>
                                <input type="text" class="form-control inputGeral " placeholder="" name="nomeOrganizacaoEvento" maxlength="50" id="nomeOrganizacaoEvento" value="<?= $nome_Org ?>" required>
                                <div class="invalid-feedback">
                                    Preencha este campo
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 needs-validation">
                                <label for="CNPJ" class="col-form-label">CNPJ da organização*</label>
                                <input type="text" class="form-control inputGeral" placeholder="" name="cnpjOrganizacaoEvento" data-mask="00.000.000/0000-00" maxlength="50" id="cnpjOrganizacaoEvento" value="<?= $cnpj_Org ?>" required>
                                <div class="invalid-feedback">
                                    Preencha este campo
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 needs-validation">
                                <label for="nomeOrg" class="col-form-label">CEP da organização*</label>
                                <input type="text" class="form-control inputGeral" placeholder="" name="cepOrganizacaoEvento" data-mask="00000-000" maxlength="10" id="cepOrganizacaoEvento" value="<?= $cep_Org ?>" required onchange="buscarEnderecoPorCEP()">
                            </div>
                            <div class="col-md-6 needs-validation">
                                <label for="cep" class="col-form-label">Bairro da organização*</label>
                                <input type="text" class="form-control inputGeral" name="bairroOrganizacaoEvento" id="bairroOrganizacaoEvento" value="<?= $bairro_Org ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 needs-validation">
                                <label for="endereco" class="col-form-label">Endereço da Organização*</label>
                                <input type="text" class="form-control inputGeral" placeholder="" name="enderecoOrganizacaoEvento" maxlength="100" id="enderecoOrganizacaoEvento" value="<?= $endereco_Org ?>" required>
                            </div>
                            <div class="col-md-2 needs-validation">
                                <label for="numero" class="col-form-label">N°*</label>
                                <input type="text" class="form-control inputGeral" placeholder="" name="numeroOrganizacaoEvento" maxlength="100" id="numeroOrganizacaoEvento" value="<?= $num_Org ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="complemento" class="col-form-label">Complemento da organização</label>
                                <input type="text" class="form-control inputGeral" placeholder="" name="complementoOrganizacaoEvento" maxlength="100" id="complementoOrganizacaoEvento" value="<?= $complemento_Org ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 needs-validation">
                                <label for="complemento" class="col-form-label">Cidade da Organização*</label>
                                <input type="text" class="form-control inputGeral" placeholder="" name="cidadeOrganizacaoEvento" maxlength="20" id="cidadeOrganizacaoEvento" value="<?= $cidade_Org ?>" required>
                            </div>
                            <div class="col-md-6 needs-validation">
                                <label for="complemento" class="col-form-label">UF da Organização*</label>
                                <input type="text" class="form-control inputGeral" placeholder="" name="ufOrganizacaoEvento" maxlength="20" id="ufOrganizacaoEvento" value="<?= $uf_Org ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 needs-validation">
                                <label for="telefone" class="col-form-label">Telefone da Organização*</label>
                                <input type="telefone" class="form-control inputGeral" placeholder="" name="telOrganizacaoEvento" data-mask="00-00000-0000" maxlength="20" id="" value="<?= $tel_Org ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 needs-validation">
                                <label for="email" class="col-form-label">E-mail da Organização*</label>
                                <input type="email" class="form-control inputGeral" placeholder="" name="emailOrganizacaoEvento" maxlength="100" id="" value="<?= $email_Org ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 needs-validation">
                                <label for="senha" class="col-form-label">Senha da Organização*</label>
                                <input type="password" class="form-control inputGeral" placeholder="" name="senhaOrganizacaoEvento" maxlength="10" id="senhaOrganizacaoEvento" value="<?= $senha_Org ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 needs-validation">
                                <label for="link" class="col-form-label">Link do Site Organização</label>
                                <input type="text" class="form-control inputGeral" placeholder="" name="linkSiteOrganizacaoEvento" maxlength="2000" id="linkSiteOrganizacaoEvento" value="<?= $link_Org ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 needs-validation ">
                                <label for="descricao" class="col-form-label">Descrição da Organização</label>
                                <textarea class="form-control inputGeral" name="descOrganizacaoEvento" id="descOrganizacaoEvento" cols="30" rows="10" style="max-height: 400px;"><?= $desc_Org ?></textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class=" text-end p-3">
                                <a class=" btn px-3" role="button" aria-disabled="true" href="index.php">Voltar</i></a>
                                <input type="submit" class="btn" value="Editar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Adicione isso no final do seu arquivo HTML, antes do fechamento da tag </body> -->
<script>
    function buscarEnderecoPorCEP() {
        var cep = document.getElementById('cepOrganizacaoEvento').value;
        cep = cep.replace(/\D/g, ''); // Remove caracteres não numéricos

        // Verifica se o CEP possui 8 dígitos
        if (cep.length !== 8) {
            return;
        }

        // URL de consulta ao ViaCEP
        var url = 'https://viacep.com.br/ws/' + cep + '/json/';

        // Envia a solicitação AJAX
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var endereco = JSON.parse(xhr.responseText);
                    preencherCamposEndereco(endereco);
                } else {
                    console.error('Erro ao buscar endereço por CEP');
                }
            }
        };
        xhr.open('GET', url, true);
        xhr.send();
    }

    function preencherCamposEndereco(endereco) {
        document.getElementById('enderecoOrganizacaoEvento').value = endereco.logradouro;
        document.getElementById('bairroOrganizacaoEvento').value = endereco.bairro;
        document.getElementById('cidadeOrganizacaoEvento').value = endereco.localidade;
        document.getElementById('ufOrganizacaoEvento').value = endereco.uf;
    }

    // Adicione um evento de escuta para chamar a função buscarEnderecoPorCEP() quando o campo de CEP for alterado
    document.getElementById('cepOrganizacaoEvento').addEventListener('blur', buscarEnderecoPorCEP);
</script>

    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        }
    </script>
    <script>
        function toggleHamburger() {
            var hamburger = document.querySelector('.hamburger'); // Selecionando o ícone do hambúrguer corretamente
            hamburger.classList.toggle('showHamburger');
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer>
    </script>
    <!-- Para usar Mascara  -->
    <script type="text/javascript" src="../../js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="../../js/personalizar.js"></script>

</body>

</html>