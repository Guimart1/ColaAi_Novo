<?php
require_once '../../model/User.php';
require_once '../../dao/UserDao.php';
require_once '../../model/Mensagem.php';

$user = new User();
$msg = new Mensagem();

$response = [];

try {
    switch ($_POST["acao"]) {
        case 'DELETE':
            $userDao = UserDao::delete($_POST['id']);
            $response = [
                'status' => 'success',
                'message' => 'Usuário deletado com sucesso.',
                'redirect' => 'index.php'
            ];
            break;
        case 'SALVAR':
            $user->setNome($_POST['nomeUsuario']); 
            $user->setSobrenome($_POST['sobrenomeUsuario']);  
            $user->setEmail($_POST['emailUsuario']);
            $user->setSenha($_POST['senhaUsuario']);
            $user->setTel($_POST['telUsuario']);
            $userDao = UserDao::insert($user);
            $response = [
                'status' => 'success',
                'message' => 'Usuário inserido com sucesso.',
                'redirect' => 'index.php'
            ];
            break;
        case 'ATUALIZAR':
            $user->setNome($_POST['nomeUsuario']);
            $user->setSobrenome($_POST['sobrenomeUsuario']);  
            $user->setEmail($_POST['emailUsuario']);
            $user->setSenha($_POST['senhaUsuario']);
            $user->setTel($_POST['telUsuario']);
            $userDao = UserDao::update($_POST["idUsuario"], $user);
            $response = [
                'status' => 'success',
                'message' => 'Usuário atualizado com sucesso.',
                'redirect' => 'index.php'
            ];
            break;
        case 'SELECTID':
            $userDao = UserDao::selectById($_POST['id']);
            $response = [
                'status' => 'success',
                'data' => $userDao
            ];
            break;
    }
} catch (Exception $e) {
    $response = [
        'status' => 'error',
        'message' => 'Erro: ' . $e->getMessage()
    ];
}

echo json_encode($response);
?>
