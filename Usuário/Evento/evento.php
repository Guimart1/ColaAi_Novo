<?php
require_once '../../dao/EventoDao.php';
require_once '../../dao/InteresseEventoDao.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações Eventos</title>
    <link rel="stylesheet" href="../../css/styleAdm.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css'>
    <link rel="stylesheet" href="../../css/styleUsuario.css">
    <!-- <link rel="stylesheet" href="node_modules/@glidejs/glide/dist/css/glide.core.min.css"> -->
    <link rel="stylesheet" href="../../css/glide.core.min.css">
    <link rel="stylesheet" href="../../css/glide.theme.css">
</head>

<body class="fundo-bolinha">
    <?php
    // Iniciar a sessão
    session_start();

    // Verificar se o índice 'Autenticado' existe ou é igual a 'SIM'
    if (!isset($_SESSION['AutenticaoUser']) || $_SESSION['AutenticaoUser'] != 'SIM') {
        // Redirecionar para o login com um erro2 se não estiver autenticado
        header('Location: login.php?login=erro2');
        exit();
    }
    //o usuário está autenticado
    $authUsuario = $_SESSION['user'];

    // Verifique se o parâmetro id está definido na URL
    if (isset($_GET['id'])) {
        // Obtém o id do evento da URL
        $idEvento = $_GET['id'];
        
        // Busca os detalhes do evento com base no id do evento
        $evento = EventoDao::selectById($idEvento);
        $organizacao = EventoDao::selecionarEventoComOrganizacaoPorId($idEvento);

        // Verifica se o evento foi encontrado
        if ($evento && $organizacao) {
            // Verificar se o usuário já registrou interesse neste evento
            $idUsuario = $_SESSION['user']['idUsuario'];
    ?>
    <?php
        } else {
            // Se o evento não foi encontrado, exibe uma mensagem de erro
            echo "<p>Evento não encontrado.</p>";
        }
    } else {
        // Se o parâmetro idEvento não estiver definido na URL, exibe uma mensagem de erro
        echo "<p>Parâmetro idEvento não especificado na URL.</p>";
    }
    ?>
    <?php
        require_once('../Componentes/headerLogado.php');
        require_once('../Componentes/modalEditarPerfil.php');
    ?>
    <!--inicio do conteudo-->
    <div class="container-fluid eventoBox d-flex align-items-center flex-column p-0">
        <div class="row d-flex justify-content-evenly gap-4 mb-5" style="width: 100%; min-height: 92vh">
            <div class="eventImage col-md-4">
                <h1 class="fw-bold fs-2 mt-4"><span style="color: #E6AEB2">E</span><span style="color: #6D9EAF">VEN</span><span style="color: #FFD417">TO</span></h1>
                <div class="d-flex align-items-center">
                    <img src="<?php echo !empty($organizacao['imagemOrganizacaoEvento']) ? "../../img/Organizacao/" . $organizacao['imagemOrganizacaoEvento'] : "../../img/Organizacao/userPadrao.png"; ?>" alt="foto perfil" style="width: 40px; height:40px; border-radius: 50%;">

                    <a class="ms-2 mt-auto mb-auto" href="../PerfilOrganização/index.php?id=<?= $organizacao['idOrganizacaoEvento']; ?>" style="color: #6D9EAF; text-decoration:none"><?= $organizacao['nomeOrganizacaoEvento']; ?></a>
                </div>
                <div class="imagemEvento">
                    <input type="hidden" name="idEvento" value="<?= $idEvento ?>">
                    <img src="../../img/Organizacao/<?= $evento['imagemEvento']; ?>" alt="<?= $evento['nomeEvento']; ?>" style="width: 100%; height: 100%;" class="mt-2 img-fluid">
                </div>
                <div class="eventTag mt-4">
                    <div class="row d-flex justify-content-between mt-3 g-3">
                        <div class="col-md-auto d-flex centerInfo">
                            <div class="" style="height: 33px; width:33px">
                                <div class="livreBox d-flex justify-content-center align-items-center rounded rounded-2">
                                    <span>L</span>
                                </div>
                            </div>
                            <span class="fw-bold ms-1" style="font-size: 1.1em;">Faixa etária:</span>
                            <span class="ms-2 mt-1" style="font-size: 0.9em;">
                                <?php
                                // array associativo para mapear os valores numéricos para os valores correspondentes
                                $faixa_etaria = array(
                                    '1' => '0-12 meses',
                                    '2' => '1-3 anos',
                                    '3' => '3-5 anos',
                                    '4' => '5-12 anos',
                                    '5' => 'Livre para todos os públicos'
                                );

                                // Verifique se o valor da faixa etária está definido e não é vazio
                                if (isset($evento['faixaEtariaEvento']) && !empty($evento['faixaEtariaEvento'])) {
                                    // Use o valor da faixa etária para acessar o array e exibir o valor correspondente
                                    echo $faixa_etaria[$evento['faixaEtariaEvento']];
                                } else {
                                    // Se o valor não estiver definido ou for vazio, exiba uma mensagem de erro ou padrão
                                    echo "Faixa etária não especificada";
                                }
                                ?>
                            </span>
                        </div>
                        <div class="col-md-auto d-flex centerInfo">
                            <img src="../../img/Usuario/icon-valor.png" alt="" style="min-width: 33px; max-height:33px">
                            <span class="fw-bold ms-1" style="font-size: 1.1em;">Valor:</span>
                            <span class="ms-1" style="font-size: 1em;">
                                <?php
                                // array associativo para mapear os valores numéricos para os valores correspondentes
                                $valores = array(
                                    '1' => 'Grátis',
                                    '2' => 'Pago',
                                    '3' => 'Outros'
                                );

                                // Verifique se o valor do evento está definido e não é vazio
                                if (isset($evento['valorEvento']) && !empty($evento['valorEvento'])) {
                                    // Use o valor do evento para acessar o array e exibir o valor correspondente
                                    echo $valores[$evento['valorEvento']];
                                } else {
                                    // Se o valor não estiver definido ou for vazio, exiba uma mensagem de erro ou padrão
                                    echo "Valor não especificado";
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                    
                        <div class="col-md-auto mt-3 d-flex centerInfo">
                            <img src="../../img/Usuario/icon-local.png " alt="" style="min-width: 34px; height:32px">
                            <span class="fw-bold ms-1" style="font-size: 1.1em;">Local:</span>
                            <span class="ms-3 mb-auto" style="font-size: 1em;"><?= $evento['enderecoEvento']; ?>, <?= $evento['numeroEvento']; ?>, <?= $evento['complementoEvento']; ?> <?= $evento['bairroEvento']; ?> <?= $evento['cepEvento']; ?> <?= $evento['cidadeEvento']; ?> <?= $evento['ufEvento']; ?></span>
                        </div>

                    <div class="row d-flex justify-content-between mt-1 g-3" >
                        <div class="col-md-auto col-6  d-flex centerInfo" >
                            <img src="../../img/Usuario/icon-data.png" alt="" style="width: 40px; height:40px" class="mt-auto mb-auto">
                            <div class="d-flex flex-column ms-1">
                                <span class="fw-bold mb-auto" style="font-size: 1.1em;">Data começo:</span>
                                <span class="text-center"><?= $evento['dataEvento']; ?></span>
                            </div>
                        </div>
                        <div class="col-md-auto col-6 d-flex centerInfo" >
                            <img src="../../img/Usuario/icon-data.png" alt="" style="width: 40px; height:40px" class="mt-auto mb-auto">
                            <div class="d-flex flex-column ms-1">
                                <span class="fw-bold mb-auto" style="font-size: 1.1em;">Data Fim:</span>
                                <span class="text-center"><?= $evento['dataFimEvento']; ?></span>
                            </div>
                        </div>
                            <div class="col-md-auto d-flex centerInfo">
                                    <img src="../../img/Usuario/icon-horario.png" alt="" style="width: 35px; height:35px">
                                    <div class="d-flex flex-column ms-2">
                                        <span class="fw-bold mb-auto" style="font-size: 1.1em;">Turnos:</span>
                                        <span class="text-center">
                                    
                                        <?php
                                        // array associativo para mapear os valores numéricos para os valores correspondentes
                                        $turnos = array(
                                            '1' => 'Manhã',
                                            '2' => 'Tarde',
                                            '3' => 'Noite',
                                            '4' => 'Dia Todo'
                                        );

                                        // Verifique se o turno do evento está definido e não é vazio
                                        if (isset($evento['periodoEvento']) && !empty($evento['periodoEvento'])) {
                                            // Use o turno do evento para acessar o array e exibir o valor correspondente
                                            echo $turnos[$evento['periodoEvento']];
                                        } else {
                                            // Se o turno não estiver definido ou for vazio, exiba uma mensagem de erro ou padrão
                                            echo "Turno não especificado";
                                        }
                                        ?>
                                        </span>
                                    </div>
                                </div>
                    </div>
                        
                </div>
            </div>
            <div class="eventDesc col-md-4 d-flex align-items-center justify-content-center flex-column mt-4">
                <h1 class="fw-bold fs-2 mb-5">
                    <?php
                    $nomeEvento = $evento['nomeEvento'];
                    $cores = ['#FFD417', '#6D9EAF', '#E6AEB2']; // Cores correspondentes a cada parte do nome do evento
                    $comprimento = mb_strlen($nomeEvento, 'UTF-8');
                    $jaRegistrado = InteresseEventoDao::selectByUsuarioEvento($idUsuario, $idEvento);

                    for ($i = 0; $i < $comprimento; $i++) {
                        $letra = mb_substr($nomeEvento, $i, 1, 'UTF-8');
                        echo "<span style='color: " . $cores[$i % count($cores)] . "'>" . $letra . "</span>";
                    }
                    ?>
                </h1>
                <p style="text-align: justify;"><?= $evento['descEvento']; ?></p>
                <div class="button">
                    <form id="interestForm" method="post" action="./processInterresseEvento.php">
                        <!-- Adicione um campo oculto para armazenar o ID do evento -->
                        <input type="hidden" name="idEvento" value="<?= $idEvento ?>">

                        <!-- Adicione um campo oculto para armazenar o ID do usuário -->
                        <input type="hidden" name="idUsuario" value="<?= $authUsuario['idUsuario'] ?>">

                        <!-- Adicione um campo oculto para a ação -->
                        <input type="hidden" name="acao" value="<?php echo $jaRegistrado ? 'DELETE' : 'SALVAR'; ?>">

                        <button id="interestButton" type="submit" class="border-0 rounded-5 mt-3" style="width: 15vw; height: 50px;min-width:200px" value="SALVAR" name="acao">
                            <?php
                            // Verificar se o usuário já registrou interesse
                            // Suponha que $jaRegistrado seja uma variável que indica se o usuário já registrou interesse no evento
                            if ($jaRegistrado) {
                                echo "Retirar Interesse";
                            } else {
                                echo "Registrar Interesse";
                            }
                            ?>
                        </button>
                    </form>
                </div>
                <a href="" style="color: #6D9EAF;" class="mt-2 mb-5">Clique para obter Informações detalhadas</a>
            </div>
        </div>
    </div>
            <script>
                // Adicione um evento de clique ao botão
                document.getElementById('interestButton').addEventListener('click', function(event) {
                    event.preventDefault(); // Evitar o envio do formulário

                    // Verificar se o texto do botão é "Registrar Interesse"
                    if (this.textContent.trim() === "Registrar Interesse") {
                        this.textContent = "Retirar Interesse"; // Alterar o texto do botão
                    } else {
                        this.textContent = "Registrar Interesse"; // Alterar o texto do botão
                    }

                    // Submeter o formulário
                    document.getElementById('interestForm').submit();
                });
            </script>


            <?php
            require_once('../Componentes/footerLogado.php');
            require_once('../Componentes/modalFeedback.php');
            require_once('../Componentes/modalContato.php');
            require_once('../Componentes/modalSobre.php');
            ?>

            <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
            </script>
            <script type="text/javascript" src="../../js/modal.js"></script>
            <script>  

let nav = document.getElementById("nav")
var i = 0
function toggleNav(){
    if (i == 0) {
        nav.classList.add("navbarActive-on");
        nav.classList.remove("navbarActive-off");
        i = 1
    }else {
        nav.classList.add("navbarActive-off");
        nav.classList.remove("navbarActive-on");
        i = 0
    }
}
</script>
</body>

</html>