<?php
require_once(__DIR__ . '../../model/Conexao.php');

class UserDao
{
    public static function insert($user)
    {
        // Ajuste para obter o ID corretamente usando o método getId()
        $nome = $user->getNome();
        $sobrenome = $user->getSobrenome();
        $email = $user->getEmail();
        $senha = $user->getSenha();
        $tel = $user->getTel();
        $imagemP = $user->getImagemPerfil();
        $imagemB = $user->getImagemBanner();

        $conn = Conexao::conectar(); // Estabeleça a conexão com o banco de dados

        $stmt = $conn->prepare("INSERT INTO tbusuario (nomeUsuario, sobrenomeUsuario, emailUsuario, senhaUsuario, telUsuario, imagemPerfilUsuario, ImagemBannerUsuario) 
                            VALUES (:nome, :sobrenome, :email, :senha, :tel, :imagemPerfil, :imagemBanner)");

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':sobrenome', $sobrenome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':tel', $tel);
        $stmt->bindParam(':imagemPerfil', $imagemP);
        $stmt->bindParam(':imagemBanner', $imagemB);

        $result = $stmt->execute();

        if ($result) {
            return true; // Inserção bem-sucedida
        } else {
            return false; // Erro na inserção
        }
    }


    public static function selectAll()
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbusuario";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function selectById($id)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbusuario WHERE idUsuario = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':id', $id,  PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function delete($id)
    {
        $conexao = Conexao::conectar();
        $query = "DELETE FROM tbusuario WHERE idUsuario = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':id', $id);
        return  $stmt->execute();
    }

    public static function update($id, $user)
    {
        $conexao = Conexao::conectar();

        $query = "UPDATE tbusuario SET 
                nomeUsuario = :nome, 
                sobrenomeUsuario = :sobrenome,
                emailUsuario = :email, 
                senhaUsuario = :senha, 
                telUsuario = :tel,
                imagemPerfilUsuario = :imagemPerfil,
                imagemBannerUsuario = :imagemBanner
                WHERE idUsuario = :id";

        $stmt = $conexao->prepare($query);

        // Atribuir os valores a variáveis antes de chamar bindParam
        $nome = $user->getNome();
        $sobrenome = $user->getSobrenome();
        $email = $user->getEmail();
        $senha = $user->getSenha();
        $tel = $user->getTel();
        $imagemP = $user->getImagemPerfil();
        $imagemB = $user->getImagemBanner();

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':sobrenome', $sobrenome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':tel', $tel);
        $stmt->bindParam(':imagemPerfil', $imagemP);
        $stmt->bindParam(':imagemBanner', $imagemB);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    public static function checkCredentials($email, $senha)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbusuario WHERE emailUsuario = :email and senhaUsuario = :senha";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function checkCredentialsTel($tel, $senha)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbusuario WHERE telUsuario = :telefone and senhaUsuario = :senha";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':telefone', $tel);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public static function getTotalUsuarios()
    {
        $conexao = Conexao::conectar();
        $query = "SELECT COUNT(*) as totalUsuarios FROM tbusuario";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result['totalUsuarios'];
    }
    
    public static function updatePerfilImage($id, $user){
        $conexao = Conexao::conectar();
    
        // Verifica se há uma imagem a ser atualizada
        if (!empty($_FILES['foto']['size'])) {
            // Diretório onde as imagens são armazenadas
            $diretorio = "../../img/Usuario/";
            $nomeCompleto = $diretorio . $user->getImagemPerfil();
            // Verifica se a imagem já foi movida e renomeada
            if (!$user->getImagemPerfil()) {
                // Gera um nome aleatório para a imagem
                $novo_nome = md5(time()) . ".jpg";
                $nomeCompleto = $diretorio . $novo_nome;
    
                // Move a imagem para o diretório
                move_uploaded_file($_FILES['foto']['tmp_name'], $nomeCompleto);
    
                // Atualiza o nome da imagem no objeto usuário
                $user->setImagemPerfil($novo_nome);
            } else {
                // A imagem já foi movida e renomeada
                $nomeCompleto = $diretorio . $user->getImagemPerfil();
            }
        } else {
            // Se não houver uma nova imagem, use a imagem existente
            
        }
    
        // Query SQL para atualizar a imagem do perfil do usuário
        $query = "UPDATE tbusuario SET 
                imagemPerfilUsuario = :imagemPerfil
                WHERE idUsuario = :id";
    
        // Prepara a declaração
        $stmt = $conexao->prepare($query);
    
        // Obtém o nome da imagem do objeto usuário
        $imagemP = $user->getImagemPerfil();
    
        // Vincula os parâmetros
        $stmt->bindParam(':imagemPerfil', $imagemP);
        $stmt->bindParam(':id', $id);
    
        // Executa a consulta SQL
        return $stmt->execute();
    }

    public static function updateBannerImage($id, $user){
        $conexao = Conexao::conectar();
    
        // Verifica se há uma imagem a ser atualizada
        if (!empty($_FILES['foto']['size'])) {
            // Diretório onde as imagens são armazenadas
            $diretorio = "../../img/Usuario/";
            $nomeCompleto = $diretorio . $user->getImagemBanner();
            // Verifica se a imagem já foi movida e renomeada
            if (!$user->getImagemBanner()) {
                // Gera um nome aleatório para a imagem
                $novo_nome = md5(time()) . ".jpg";
                $nomeCompleto = $diretorio . $novo_nome;
    
                // Move a imagem para o diretório
                move_uploaded_file($_FILES['foto']['tmp_name'], $nomeCompleto);
    
                // Atualiza o nome da imagem no objeto usuário
                $user->setImagemBanner($novo_nome);
            } else {
                // A imagem já foi movida e renomeada
                $nomeCompleto = $diretorio . $user->getImagemBanner();
            }
        } else {
            // Se não houver uma nova imagem, use a imagem existente
            
        }
    
        // Query SQL para atualizar a imagem do perfil do usuário
        $query = "UPDATE tbusuario SET 
                imagemBannerUsuario = :imagemBanner
                WHERE idUsuario = :id";
    
        // Prepara a declaração
        $stmt = $conexao->prepare($query);
    
        // Obtém o nome da imagem do objeto usuário
        $imagemB = $user->getImagemBanner();
    
        // Vincula os parâmetros
        $stmt->bindParam(':imagemBanner', $imagemB);
        $stmt->bindParam(':id', $id);
    
        // Executa a consulta SQL
        return $stmt->execute();
    }
}