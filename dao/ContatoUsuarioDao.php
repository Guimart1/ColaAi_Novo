<?php  

require_once (__DIR__ . '../../model/Conexao.php');

class ContatoUsuarioDao{
    public static function insert($contato){
        $titulo = $contato->getTitulo();
        $descricao = $contato->getDesc();
        $idUsuario = $contato->getIdUsuario();
        $idCategoriaContatoUsuario = $contato->getIdCategoriaContatoUsuario();
    
        $conn = Conexao::conectar(); // Estabeleça a conexão com o banco de dados
        
        $stmt = $conn->prepare("INSERT INTO tbcontatousuario (tituloContatoUsuario, descContatoUsuario, idUsuario, idCategoriaContatoUsuario) 
                        VALUES (:titulo, :descricao, :idUsuario, :idCategoriaContatoUsuario)");
    
        $stmt->bindParam(':titulo', $titulo);        
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':idUsuario', $idUsuario);
        $stmt->bindParam(':idCategoriaContatoUsuario', $idCategoriaContatoUsuario);
    
        $result = $stmt->execute();
    
        if ($result) {
            return true; // Inserção bem-sucedida
        } else {
            return false; // Erro na inserção
        }
    }
    
    public static function selectAll(){
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbcontatousuario";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function selectAllInner(){
        $conexao = Conexao::conectar();
        $query = "SELECT c.*, o.nomeUsuario, o.emailUsuario 
                  FROM tbcontatousuario c
                  INNER JOIN tbusuario o ON c.idUsuario = o.idUsuario";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public static function selectById($id){
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbcontatousuario WHERE idContatoUsuario = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':id', $id,  PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function selectByIdInner($id){
        $conexao = Conexao::conectar();
        $query = "SELECT nomeUsuario, emailUsuario, tituloContatoUsuario, categoriaContatoUsuario, descContatoUsuario FROM `tbcontatousuario`
        INNER JOIN tbusuario ON tbusuario.idUsuario = tbcontatousuario.idUsuario
        INNER JOIN tbcategoriacontatousuario ON tbcategoriacontatousuario.idCategoriaContatoUsuario = tbcontatousuario.idCategoriaContatoUsuario WHERE idContatoUsuario = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':id', $id,  PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public static function delete($id){
        $conexao = Conexao::conectar();
        $query = "DELETE FROM tbcontatousuario WHERE idContatoUsuario = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':id', $id);
        return  $stmt->execute();
    }
    
    public static function update($id, $contato){
        $conexao = Conexao::conectar();
    
        $query = "UPDATE tbcontatousuario SET 
            tituloContatoUsuario = :titulo,
            descContatoUsuario = :descricao,
            idUsuario = :idUsuario,
            idCategoriaContatoUsuario = :idCategoriaContatoUsuario
            WHERE idContatoUsuario = :id";
        
        $stmt = $conexao->prepare($query);
    
        // Atribuir os valores a variáveis antes de chamar bindParam
        $titulo = $contato->getTitulo();
        $descricao = $contato->getDesc();
        $idUsuario = $contato->getIdUsuario();
        $idCategoriaContatoUsuario = $contato->getIdCategoriaContatoUsuario();
            
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':idUsuario', $idUsuario);
        $stmt->bindParam(':idCategoriaContatoUsuario', $idCategoriaContatoUsuario);
        $stmt->bindParam(':id', $id); 
        return $stmt->execute();
    }
}

?>
