<?php
session_start();

// Verifica se os detalhes do endereço foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enderecoOrganizacaoEvento']) && isset($_POST['numeroOrganizacaoEvento'])) {
    $_SESSION['enderecoOrganizacaoEvento'] = trim($_POST['enderecoOrganizacaoEvento']);
    $_SESSION['numeroOrganizacaoEvento'] = trim($_POST['numeroOrganizacaoEvento']);
    header("Location:complemento.php");
    exit;
}

// Função para buscar o endereço com base no CEP
function buscarEnderecoPorCEP($cep) {
    $url = "https://viacep.com.br/ws/{$cep}/json/";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}

// Verifica se foi enviado um CEP
if (isset($_SESSION['cepOrganizacaoEvento'])) {
    $cep = $_SESSION['cepOrganizacaoEvento'];
    $enderecoDetalhes = buscarEnderecoPorCEP($cep);

    // Se o endereço foi encontrado, preenche o campo de endereço
    if (!empty($enderecoDetalhes['logradouro'])) {
        $logradouro = $enderecoDetalhes['logradouro'];
    } else {
        $logradouro = '';
    }
} else {
    // Se não foi enviado um CEP, define o campo de endereço como vazio
    $logradouro = '';
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Endereço</title>
    <link rel="stylesheet" href="../../css/styleCadastro.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css'>
</head>
<body class="w-100">
    <div class="header d-flex justify-content-center align-items-center">
        <img src="../../img/Login/Cola AI logo.png" alt="">
    </div>
    <div class="box-center container-fluid w-100">
        <div class="row h-100 justify-content-center vw-100 align-items-center">
            <div class="form-box col-11 col-sm-9 col-md-5 rounded-4">
                <form action="" method="post">
                    <div class="title-box h-25 p-4 pb-0 pt-5 text-start">
                        <h1 class="fw-bold fs-3" id="title-cadastro">Qual é o endereço da Organização?</h1>
                    </div>
                    <div class="text-termos">
                        <p class="fs-4 ps-4 pe-4 mb-5">Recomendamos que envie dados atualizados.</p>
                    </div>
                    <div class="row mb-5 ps-md-4 pe-md-4 g-5">
                        <div class="input-box col-sm-8">
                            <input type="text" class="input-group" name="enderecoOrganizacaoEvento" id="enderecoOrganizacaoEvento" placeholder="Digite o endereço" maxlength="40" value="<?php echo $logradouro; ?>" required>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="input-group " placeholder="N°" maxlength="5" name="numeroOrganizacaoEvento" required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-2 mb-4 ps-4 pe-4"> 
                    <a href="cep.php" class="fs-4 mt-auto mb-2" style="color: #6D9EAF">Voltar</a>
                    <div class="w-100  justify-content-end align-items-end d-flex" id="btn-box">
                        <a href="complemento.php"><button type="submit" class="border-0 rounded-3 fs-4">Prosseguir</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="../../js/jquery.mask.min.js"></script>
</body>
</html>
