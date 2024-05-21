<?php

require_once (__DIR__ . '../../model/Conexao.php');

class InteresseEventoDao {
    public static function insert($interesse){
        $idUsuario  = $interesse->getIdUsuario();
        $idEvento  = $interesse->getIdEvento();
    
        $conn = Conexao::conectar(); // Estabeleça a conexão com o banco de dados
        
        $stmt = $conn->prepare("INSERT INTO tbinteresseevento (idUsuario, idEvento) 
                        VALUES (:idUsuario, :idEvento)");
    
        $stmt->bindParam(':idUsuario', $idUsuario);        
        $stmt->bindParam(':idEvento', $idEvento);
    
        $result = $stmt->execute();
    
        if ($result) {
            return true; // Inserção bem-sucedida
        } else {
            return false; // Erro na inserção
        }
    }
    
    public static function selectAll(){
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbinteresseevento";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    
    public static function selectById($id){
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbinteresseevento WHERE idInteresseEvento = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':id', $id,  PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public static function delete($id){
        $conexao = Conexao::conectar();
        $query = "DELETE FROM tbinteresseevento WHERE idInteresseEvento = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':id', $id);
        return  $stmt->execute();
    }
    
    public static function update($id, $interesse){
        $conexao = Conexao::conectar();
    
        $query = "UPDATE tbinteresseevento SET 
            idUsuario = :idUsuario,
            idEvento = :idEvento
            WHERE idInteresseEvento = :id";
        
        $stmt = $conexao->prepare($query);
    
        // Atribuir os valores a variáveis antes de chamar bindParam
        $idUsuario = $interesse->getIdUsuario();
        $idEvento = $interesse->getIdEvento();
           
        $stmt->bindParam(':id', $id);        
        $stmt->bindParam(':idUsuario', $idUsuario);
        $stmt->bindParam(':idEvento', $idEvento);
    
        return $stmt->execute();
    }
    public static function selectByUsuarioEvento($idUsuario, $idEvento) {
        $conn = Conexao::conectar(); // Estabeleça a conexão com o banco de dados
        
        try {
            $stmt = $conn->prepare("SELECT * FROM tbinteresseevento WHERE idUsuario = :idUsuario AND idEvento = :idEvento");
            
            $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
            $stmt->bindParam(':idEvento', $idEvento, PDO::PARAM_INT);
            
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
            throw new Exception("Erro ao selecionar interesse de evento: " . $e->getMessage());
        }
    }
    public static function selectByUsuario($idUsuario) {
        $conn = Conexao::conectar(); // Estabeleça a conexão com o banco de dados
    
        try {
            $stmt = $conn->prepare("SELECT tbevento.imagemEvento, tbevento.nomeEvento, tbevento.descEvento
                                    FROM tbinteresseevento
                                    INNER JOIN tbevento ON tbinteresseevento.idEvento = tbevento.idEvento
                                    WHERE tbinteresseevento.idUsuario = :idUsuario");
            $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
            $stmt->execute();
    
            // Retorna todos os eventos em que o usuário registrou interesse
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Em caso de erro, lança uma exceção
            throw new Exception("Erro ao selecionar eventos de interesse do usuário: " . $e->getMessage());
        }
    }
    public static function selectTopEventosMaisInteresse() {
        $conn = Conexao::conectar(); // Estabeleça a conexão com o banco de dados
        
        try {
            $stmt = $conn->prepare("SELECT 
                                        tbinteresseevento.idEvento, 
                                        COUNT(*) AS total_interesse, 
                                        tbevento.nomeEvento, 
                                        tbevento.imagemEvento, 
                                        tbevento.descEvento 
                                    FROM 
                                        tbinteresseevento 
                                    JOIN 
                                        tbevento ON tbinteresseevento.idEvento = tbevento.idEvento 
                                    GROUP BY 
                                        tbinteresseevento.idEvento 
                                    ORDER BY 
                                        total_interesse DESC 
                                    LIMIT 
                                        5");
            
            $stmt->execute();
            
            // Retorna os 5 eventos com mais interesse, incluindo o nome do evento, a foto e a descrição
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Em caso de erro, lança uma exceção
            throw new Exception("Erro ao selecionar os eventos com mais interesse: " . $e->getMessage());
        }
    }
    public static function verificarInteresseUsuarioEvento($idUsuario, $idEvento) {
        $conn = Conexao::conectar(); 
        
        try {
            $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM tbinteresseevento WHERE idUsuario = :idUsuario AND idEvento = :idEvento");
            $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
            $stmt->bindParam(':idEvento', $idEvento, PDO::PARAM_INT);
            $stmt->execute();
            
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return $resultado['total'] > 0; // Retorna true se o usuário já registrou interesse neste evento, caso contrário, retorna false
        } catch (PDOException $e) {
            // Em caso de erro, lança uma exceção
            throw new Exception("Erro ao verificar interesse do usuário neste evento: " . $e->getMessage());
        }
    }
    public static function deleteInterest($idEvento, $idUsuario)
    {
        $conn = Conexao::conectar(); 

        try {
            //instrução SQL para excluir o interesse do evento
            $stmt = $conn->prepare("DELETE FROM tbinteresseevento WHERE idEvento = :idEvento AND idUsuario = :idUsuario");

            // Vincule os parâmetros
            $stmt->bindParam(':idEvento', $idEvento, PDO::PARAM_INT);
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
        $query = "SELECT COUNT(*) AS total FROM tbinteresseevento";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
    public static function countByOrganization($idOrganizacao) {
        $conn = Conexao::conectar();
        $query = "SELECT COUNT(*) AS total 
                  FROM tbinteresseevento ie
                  JOIN tbevento e ON ie.idEvento = e.idEvento
                  WHERE e.idOrganizacaoEvento = :idOrganizacaoEvento";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':idOrganizacaoEvento', $idOrganizacao, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
    
    
}
?>
