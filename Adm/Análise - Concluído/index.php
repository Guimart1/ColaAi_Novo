<?php
    require_once('../../dao/OrganizacaoDao.php');
    require_once '../../model/Mensagem.php';
    // Verifica se o método de requisição é POST e se o parâmetro filtro foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['filtro'])) {
    // Obtém o valor do filtro enviado pelo formulário
    $filtro = $_POST['filtro'];

    // Obtém os dados filtrados da organização com base no valor do filtro
    $organizacao_filtrada = OrganizacaoDao::selectAllInnerJoinFiltrado($filtro);

    // Constrói o HTML apenas para o <tbody> da tabela com os resultados filtrados
    $html_tbody = '';
    foreach ($organizacao_filtrada as $organizacao) {
        $html_tbody .= "<tr class='mt-1'>";
        $html_tbody .= "<td class='fs-5 pt-3'>" . $organizacao['idOrganizacaoEvento'] . "</td>";
        $html_tbody .= "<td class='fs-5 pt-3'>" . $organizacao['nomeOrganizacaoEvento'] . "</td>";
        $html_tbody .= "<td class='fs-5 pt-3'>" . $organizacao['emailOrganizacaoEvento'] . "</td>";
        $html_tbody .= "<td class='fs-5 pt-3'>" . $organizacao['cnpjOrganizacaoEvento'] . "</td>";
        $html_tbody .= "<td class='fs-5 pt-3'>" . $organizacao['situacaoOrganizacaoEvento'] . "</td>";
        $html_tbody .= "</tr>";
    }

    // Retorna o HTML do <tbody> com os dados filtrados
    echo $html_tbody;
    exit(); // Finaliza a execução do script após retornar o HTML do <tbody>
}

// Caso não seja uma requisição POST ou o filtro não foi enviado, exiba todos os registros da tabela
$organizacao = OrganizacaoDao::selectAllInnerJoin();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Análise Completa</title>
    <link rel="stylesheet" href="../../css/styleAdm.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css'>
</head>
<body>
    <?php
    session_start();

    // Verificar se o índice 'Autenticado' existe ou é igual a 'SIM'
    if (!isset($_SESSION['AutenticaoAdm']) || $_SESSION['AutenticaoAdm'] != 'SIM') {
      // Redirecionar para o login com um erro2 se não estiver autenticado
      header('Location: login.php?login=erro2');
      exit();
    }
  
    //o usuário está autenticado
    $authUser = $_SESSION['userAdm'];
  
    $nomeAdm = $authUser['nomeAdmin'];
    include('../Componentes/header.php');
    ?>
    <div class="container-fluid vw-100">
    <div class="hamburger-wrapper">
            <div class="hamburger" onclick="toggleSidebar(), toggleHamburger()">
                <input class="checkbox" type="checkbox" />
                <svg fill="none" viewBox="0 0 50 50" height="50" width="50">
                    <path
                        class="lineTop line"
                        stroke-linecap="round"
                        stroke-width="4"
                        stroke="black"
                        d="M6 11L44 11"
                    ></path>
                    <path
                        stroke-linecap="round"
                        stroke-width="4"
                        stroke="black"
                        d="M6 24H43"
                        class="lineMid line"
                    ></path>
                    <path
                        stroke-linecap="round"
                        stroke-width="4"
                        stroke="black"
                        d="M6 37H43"
                        class="lineBottom line"
                    ></path>
                </svg>
            </div>
        </div>
        <div class="row vw-100">
            <?php
                include('../Componentes/menu.php')
            ?>
            <div class="info-box col-md-9 pt-4" style="color: #a6a6a6;" id="data-box">
                <h1 class="text-center">Análise de registro - Concluídos</h1>
                <div class="w-100 d-flex flex-column mt-5 pe-5">
                    <div class="dropdown ms-auto">
                    <h1 class="fs-5 ms-auto me-0 ">Categoria</h1>
                    <form id="filtroForm">
                        <select name="filtro" class = "form-select" id="filtro">
                            <option value="0">Todos</option>
                            <option value="2">Ativo</option>
                            <option value="3">Desativado</option>
                        </select>
                        </form>
                    </div>
                </div>
                <div class="row ms-4 me-5 mt-2">
                    <table class="" id="tabelaOrganizacoes">
                        <thead>
                        <tr id="data-table">
                            <th class="col-md-1 fs-4">ID</th>
                            <th class="col-md-3 fs-4">Nome</th>
                            <th class="col-md-3 fs-4">E-mail</th>
                            <th class="col-md-3 fs-4">CNPJ</th>
                            <th class="col-md-3 fs-4">Situação</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
            // Loop para exibir os dados da tabela
            foreach ($organizacao as $org) {
                echo "<tr class='mt-1'>";
                echo "<td class='fs-5 pt-3'>" . $org['idOrganizacaoEvento'] . "</td>";
                echo "<td class='fs-5 pt-3'>" . $org['nomeOrganizacaoEvento'] . "</td>";
                echo "<td class='fs-5 pt-3'>" . $org['emailOrganizacaoEvento'] . "</td>";
                echo "<td class='fs-5 pt-3'>" . $org['cnpjOrganizacaoEvento'] . "</td>";
                echo "<td class='fs-5 pt-3'>" . $org['situacaoOrganizacaoEvento'] . "</td>";
                echo "</tr>";
            }
            ?>
                        </tbody>

</table>
</div>
</div>
</div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
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
    <script>
        $(document).ready(function() {
    $('#filtroForm').change(function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);

        $.ajax({
            url: '', // URL para o PHP que retorna o conteúdo da tabela filtrada
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                console.log(data)
                $('#tabelaOrganizacoes tbody').html(data); // Insere o conteúdo na tbody da tabela
            },
            error: function(error) {
                console.error('Erro:', error);
            }
        });
    });
});

    </script>
</body>
</html>
11