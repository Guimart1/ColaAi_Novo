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
    // Função para selecionar um interesse de evento pelo ID do usuário e ID do evento
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

}
?>
