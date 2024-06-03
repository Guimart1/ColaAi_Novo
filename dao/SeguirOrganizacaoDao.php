<?php

require_once (__DIR__ . '../../model/Conexao.php');

class SeguirOrganizacaoDao {
    public static function insert($seguir){
        $idUsuario = $seguir->getIdUsuario();
        $idOrganizacaoEvento  = $seguir->getIdOrgEvento();
    
        $conn = Conexao::conectar(); // Estabeleça a conexão com o banco de dados
        
        $stmt = $conn->prepare("INSERT INTO tbusuarioseguindo (idUsuario, idOrganizacaoEvento) 
                        VALUES (:idUsuario, :idOrganizacaoEvento)");
    
        $stmt->bindParam(':idUsuario', $idUsuario);        
        $stmt->bindParam(':idOrganizacaoEvento', $idOrganizacaoEvento);
    
        $result = $stmt->execute();
    
        if ($result) {
            return true; // Inserção bem-sucedida
        } else {
            return false; // Erro na inserção
        }
    }
    
    public static function selectAll(){
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbusuarioseguindo";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    
    public static function selectById($id){
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbusuarioseguindo WHERE idSeguindo = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':id', $id,  PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public static function delete($id){
        $conexao = Conexao::conectar();
        $query = "DELETE FROM tbusuarioseguindo WHERE idSeguindo = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':id', $id);
        return  $stmt->execute();
    }
    
    public static function update($id, $seguir){
        $conexao = Conexao::conectar();
    
        $query = "UPDATE tbusuarioseguindo SET 
            idUsuario = :idUsuario,
            idOrganizacaoEvento = :idOrganizacaoEvento
            WHERE idSeguindo = :id";
        
        $stmt = $conexao->prepare($query);
    
        // Atribuir os valores a variáveis antes de chamar bindParam
        $idUsuario = $seguir->getIdUsuario();
        $idOrganizacaoEvento = $seguir->getIdOrgEvento();
           
        $stmt->bindParam(':id', $id);        
        $stmt->bindParam(':idUsuario', $idUsuario);
        $stmt->bindParam(':idOrganizacaoEvento', $idOrganizacaoEvento);
    
        return $stmt->execute();
    }
    public static function selectByUsuarioOrganizacao($idUsuario, $idOrganizacaoEvento) {
        $conn = Conexao::conectar(); // Estabeleça a conexão com o banco de dados
        
        try {
            $stmt = $conn->prepare("SELECT * FROM tbusuarioseguindo WHERE idUsuario = :idUsuario AND idOrganizacaoEvento = :idOrganizacaoEvento");
            
            $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
            $stmt->bindParam(':idOrganizacaoEvento', $idOrganizacaoEvento, PDO::PARAM_INT);
            
            // Executa a consulta
            $stmt->execute();
            
            // Verifica se encontrou algum interesse de evento
            if ($stmt->rowCount() > 0) {
                // Retorna os dados do interesse de evento
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                // Se não encontrou interesse de evento, retorna null
                return null;
            }
        } catch (PDOException $e) {
            // Em caso de erro, lança uma exceção
            throw new Exception("Erro ao selecionar seguindo: " . $e->getMessage());
        }
    }
    public static function selectByUsuario($idUsuario) {
        $conn = Conexao::conectar(); // Estabeleça a conexão com o banco de dados
    
        try {
            $stmt = $conn->prepare("SELECT tborganizacaoevento.imagemOrganizacaoEvento, tborganizacaoevento.nomeOrganizacaoEvento, tborganizacaoevento.descOrganizacaoEvento, tborganizacaoevento.idOrganizacaoEvento
                                    FROM tbusuarioseguindo
                                    INNER JOIN tborganizacaoevento ON tbusuarioseguindo.idOrganizacaoEvento = tborganizacaoevento.idOrganizacaoEvento
                                    WHERE tbusuarioseguindo.idUsuario = :idUsuario");
            $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
            $stmt->execute();
    
            // Retorna todos os eventos em que o usuário registrou interesse
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Em caso de erro, lança uma exceção
            throw new Exception("Erro ao selecionar organizacoes seguidas: " . $e->getMessage());
        }
    }
    public static function selectByOrganizacao($idOrganizacaoEvento) {
        $conn = Conexao::conectar(); // Estabeleça a conexão com o banco de dados
    
        try {
            $stmt = $conn->prepare("SELECT tbUsuario.imagemPerfilUsuario, tbUsuario.nomeUsuario, tbUsuario.idUsuario
                                    FROM tbusuarioseguindo
                                    INNER JOIN tbUsuario ON tbusuarioseguindo.idUsuario = tbUsuario.idUsuario
                                    WHERE tbusuarioseguindo.idOrganizacaoEvento = :idOrganizacaoEvento");
            $stmt->bindParam(':idOrganizacaoEvento', $idOrganizacaoEvento, PDO::PARAM_INT);
            $stmt->execute();
    
            // Retorna todos os eventos em que o usuário registrou interesse
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Em caso de erro, lança uma exceção
            throw new Exception("Erro ao selecionar organizacoes seguidas: " . $e->getMessage());
        }
    }
    public static function deleteSeguir($idOrganizacaoEvento, $idUsuario)
    {
        $conn = Conexao::conectar(); 

        try {
            //instrução SQL para excluir o interesse do evento
            $stmt = $conn->prepare("DELETE FROM tbusuarioseguindo WHERE idOrganizacaoEvento = :idOrganizacaoEvento AND idUsuario = :idUsuario");

            // Vincule os parâmetros
            $stmt->bindParam(':idOrganizacaoEvento', $idOrganizacaoEvento, PDO::PARAM_INT);
            $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);

            // Execute a consulta
            $stmt->execute();

            // Verifique se a exclusão foi bem-sucedida
            if ($stmt->rowCount() > 0) {
                return true; // Retorna true se a exclusão for bem-sucedida
            } else {
                return false; // Retorna false se nenhum registro for excluído (possivelmente o interesse não existia)
            }
        } catch (PDOException $e) {
            echo "Erro ao excluir interesse do evento: " . $e->getMessage();
            return false; // Retorna false em caso de erro
        }
    }
   
    public static function countAll() {
        $conn = Conexao::conectar();
        $query = "SELECT COUNT(*) AS total FROM tbusuarioseguindo";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
    
    
}
?>
