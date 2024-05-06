//Impede o formulário de ser processado caso as senhas sejam diferentes
document.getElementById("formulario").addEventListener("submit", function(event) {
if (!verificarSenhas()) {
    event.preventDefault(); // Impede o envio do formulário se as senhas forem diferentes
}
});

//Função que verifica se a senha e confirmar senha são iguais
function verificarSenhas() {
// Obtém os valores dos campos de senha e confirmar senha
var senha = document.getElementById("senha").value;
var confirmarSenha = document.getElementById("senha1").value;
// Verifica se os valores são diferentes
if (senha !== confirmarSenha) {
    //Caso sejam diferentes, exibe um alerta para o usuário
    alert("As senhas não coincidem. Por favor, verifique e tente novamente.");
    return false;
} 
return true;
}