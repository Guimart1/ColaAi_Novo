<?php

// Função para verificar o login
function verificar_login($email_or_phone, $password) {
    // Conectar ao banco de dados (substitua 'host', 'usuario', 'senha', 'banco' pelos valores reais)
    $conexao = new mysqli('host', 'usuario', 'senha', 'banco');

    // Verificar a conexão
    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }

    // Consultar o banco de dados para obter as informações de login correspondentes ao email ou número de telefone
    $query = "SELECT * FROM usuarios WHERE email = '$email_or_phone' OR telefone = '$email_or_phone'";
    $resultado = $conexao->query($query);

    // Verificar se houve resultados da consulta
    if ($resultado->num_rows > 0) {
        // Recuperar os dados do usuário
        $usuario = $resultado->fetch_assoc();

        // Verificar se a senha fornecida corresponde à senha armazenada no banco de dados
        if (password_verify($password, $usuario['senha'])) {
            // Senha correta, login bem-sucedido
            return true;
        } else {
            // Senha incorreta
            return false;
        }
    } else {
        // Não há usuário com o email ou número de telefone fornecido
        return false;
    }

    // Fechar a conexão com o banco de dados
    $conexao->close();
}

?>
