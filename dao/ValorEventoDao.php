<?php
require_once (__DIR__ . '/../../model/Conexao.php');

class ValorEventoDao {
    public static function insert($valorEvento) {
        $valor = $valorEvento->getValor();
        $idEvento = $valorEvento->getIdEvento();

        $conn = Conexao::conectar();
        
        $stmt = $conn->prepare("INSERT INTO tbvalorevento (valorEvento, idEvento)  
                                VALUES (:valor, :idEvento)");
        
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':idEvento', $idEvento);
        
        $result = $stmt->execute();
        
        if ($result) {
            return true; // Inserção bem-sucedida
        } else {
            return false; // Erro na inserção
        }
    }
    
    public static function selectAll() {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbvalorevento";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function selectById($id) {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbvalorevento WHERE idValorEvento = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function delete($id) {
        $conexao = Conexao::conectar();
        $query = "DELETE FROM tbvalorevento WHERE idValorEvento = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public static function update($id, $valorEvento) {
        $conexao = Conexao::conectar();
        
        $query = "UPDATE tbvalorevento SET 
                   valorEvento = :valor, 
                   idEvento = :idEvento
                   WHERE idValorEvento = :id";
        
        $stmt = $conexao->prepare($query);
        
        // Atribuir os valores a variáveis antes de chamar bindParam
        $valor = $valorEvento->getValor();
        $idEvento = $valorEvento->getIdEvento();
        
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':idEvento', $idEvento);
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }
}
?>
