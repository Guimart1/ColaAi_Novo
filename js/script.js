function MostrarSenha(){
    var inputPass = document.getElementById('password')
    var btnShowPass = document.getElementById('btnSenha')

    if(inputPass.type === 'password'){
        inputPass.setAttribute('type', 'text')
        btnShowPass.classList.replace('bi-eye', 'bi-eye-slash')
    } else {
        inputPass.setAttribute('type', 'password')
        btnShowPass.classList.replace('bi-eye-slash', 'bi-eye')
    }
}
function MostrarSenha2(){
    var inputPass = document.getElementById('password1')
    var btnShowPass = document.getElementById('btnSenha1')

    if(inputPass.type === 'password'){
        inputPass.setAttribute('type', 'text')
        btnShowPass.classList.replace('bi-eye', 'bi-eye-slash')
    } else {
        inputPass.setAttribute('type', 'password')
        btnShowPass.classList.replace('bi-eye-slash', 'bi-eye')
    }
}

function valorSelect() {
        var valorSelecionado = document.getElementById("filtroSelect").value;
         $.ajax({
        type: "POST",
        url: "<?php echo $_SERVER['PHP_SELF']; ?>",
        data: { valorSelecionado: valorSelecionado },
        success: function(response) {
            $("#data-table").html(response);
        }
    });
}