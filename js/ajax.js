function enviarIdEvento(idEvento) {
    // Faz a requisição AJAX
    $.ajax({
        url: '', // URL do seu script PHP
        method: 'POST',
        data: { idEvento: idEvento }, // Envia o ID do evento para o PHP
        success: function(data) {
            // Manipule a resposta do servidor, se necessário
            console.log(data);
            $('#informacoes').html(data); // Insere o conteúdo na tbody da tabela
        },
        error: function(error) {
            console.error('Erro:', error);
        }
    });
}
function enviarIdFeedback(idFeedback) {
    // Faz a requisição AJAX
    $.ajax({
        url: '', // URL do seu script PHP
        method: 'POST',
        data: { idFeedback: idFeedback }, // Envia o ID do evento para o PHP
        success: function(data) {
            // Manipule a resposta do servidor, se necessário
            console.log(data);
            $('#informacoes').html(data); // Insere o conteúdo na tbody da tabela
        },
        error: function(error) {
            console.error('Erro:', error);
        }
    });
}
