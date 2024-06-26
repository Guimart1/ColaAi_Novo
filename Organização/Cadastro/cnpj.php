<?php
session_start();

// Função para verificar se o CNPJ é válido
function verificarCNPJ($cnpj) {
    // Remover caracteres especiais do CNPJ
    $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);

    // Valida tamanho do CNPJ
    if (strlen($cnpj) != 14) {
        return false;
    }

    // Verificar se todos os dígitos são iguais
    if (preg_match('/(\d)\1{13}/', $cnpj)) {
        return false;
    }

    // Valida o primeiro dígito verificador
    for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
        $soma += $cnpj[$i] * $j;
        $j = ($j == 2) ? 9 : $j - 1;
    }
    $resto = $soma % 11;
    if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto)) {
        return false;
    }

    // Valida o segundo dígito verificador
    for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
        $soma += $cnpj[$i] * $j;
        $j = ($j == 2) ? 9 : $j - 1;
    }
    $resto = $soma % 11;
    return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cnpjOrganizacaoEvento'])) {
    $cnpj = trim($_POST['cnpjOrganizacaoEvento']);

    // Verifica se o CNPJ é válido
    if (verificarCNPJ($cnpj)) {
        $_SESSION['cnpjOrganizacaoEvento'] = $cnpj;
        header("Location: nomeOrg.php");
        exit;
    } else {
        // Se o CNPJ não for válido, redireciona de volta para a mesma página com uma mensagem de erro
        echo "<script>alert('CNPJ inválido');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - CNPJ</title>
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
                    <div class="title-box p-4 pt-5 pb-1 text-start">
                        <h1 class="fw-bold fs-3" id="title-cadastro">Qual é o CNPJ da Organização?</h1>
                    </div>
                    <div class="text-termos">
                        <p class="fs-4 ps-4 pe-4"> Informe apenas números.</p>
                    </div>
                    <div class="input-box mt-4 mb-5 ps-4 pe-5">
                        <input type="cnpj" class="input-group fs-5" name="cnpjOrganizacaoEvento" placeholder="00.000.000/0000-00" data-mask="00.000.000/0000-00" required>
                    </div>
                    <div class="d-flex justify-content-between mt-2 mb-4 ps-4 pe-4"> 
                    <a href="index.php" class="fs-4 mt-auto mb-2" style="color: #6D9EAF">Voltar</a>
                    <div class="w-100  justify-content-end align-items-end d-flex" id="btn-box">
                        <a href="nomeOrg.php"><button type="submit" class="border-0 rounded-3 fs-4">Prosseguir</button></a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"  crossorigin="anonymous" defer>
    </script>
     <!-- Para usar Mascara  -->
  <script type="text/javascript" src="../../js/jquery.mask.min.js"></script>
  <script type="text/javascript" src="../../js/personalizar.js"> </script>
  
 
</body>
</html>