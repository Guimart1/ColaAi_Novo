<?php  

require_once (__DIR__ . '../../model/Conexao.php');

class ContatoOrgEventoDao {
    public static function insert($contato){
        $titulo = $contato->getTitulo();
        $descricao = $contato->getDesc();
        $idOrganizacaoEvento = $contato->getIdOrganizacaoEvento();
        $idCategoriaContatoOrganizacaoEvento = $contato->getIdCategoriaContatoOrganizacaoEvento();
    
        $conn = Conexao::conectar(); // Estabeleça a conexão com o banco de dados
        
        $stmt = $conn->prepare("INSERT INTO tbcontatoorganizacaoevento (tituloContatoOrganizacaoEvento, descContatoOrganizacaoEvento, idOrganizacaoEvento, idCategoriaContatoOrganizacaoEvento) 
                        VALUES (:titulo, :descricao, :idOrganizacaoEvento, :idCategoriaContatoOrganizacaoEvento)");
    
        $stmt->bindParam(':titulo', $titulo);        
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':idOrganizacaoEvento', $idOrganizacaoEvento);
        $stmt->bindParam(':idCategoriaContatoOrganizacaoEvento', $idCategoriaContatoOrganizacaoEvento);
    
        $result = $stmt->execute();
    
        if ($result) {
            return true; // Inserção bem-sucedida
        } else {
            return false; // Erro na inserção
        }
    }
    
    public static function selectAll(){
        $conexao = Conexao::conectar();
        $query = "SELECT c.*, o.nomeOrganizacaoEvento, o.emailOrganizacaoEvento 
                  FROM tbcontatoorganizacaoevento c
                  INNER JOIN tborganizacaoevento o ON c.idOrganizacaoEvento = o.idOrganizacaoEvento";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    
    public static function selectById($id){
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbcontatoorganizacaoevento WHERE idContatoOrgEvento = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':id', $id,  PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function selectByIdInner($id){
        $conexao = Conexao::conectar();
        $query = "SELECT nomeOrganizacaoEvento, emailOrganizacaoEvento, tituloContatoOrganizacaoEvento, categoriaContatoOrganizacaoEvento, descContatoOrganizacaoEvento FROM `tbcontatoorganizacaoevento`
        INNER JOIN tborganizacaoevento ON tborganizacaoevento.idOrganizacaoEvento = tbcontatoorganizacaoevento.idOrganizacaoEvento
        INNER JOIN tbcategoriacontatoorganizacaoevento ON tbcategoriacontatoorganizacaoevento.idCategoriaContatoOrganizacaoEvento = tbcontatoorganizacaoevento.idCategoriaContatoOrganizacaoEvento WHERE idContatoOrganizacaoEvento = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':id', $id,  PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public static function delete($id){
        $conexao = Conexao::conectar();
        $query = "DELETE FROM tbcontatoorganizacaoevento WHERE idContatoOrganizacaoEvento = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':id', $id);
        return  $stmt->execute();
    }
    
    public static function update($id, $contato){
        $conexao = Conexao::conectar();
    
        $query = "UPDATE tbcontatoorganizacaoevento SET 
            tituloContatoOrganizacaoEvento = :titulo,
            descContatoOrganizacaoEvento = :descricao,
            idOrganizacaoEvento = :idOrganizacaoEvento,
            idCategoriaContatoOrganizacaoEvento = :idCategoriaContatoOrganizacaoEvento
            WHERE idContatoOrgEvento = :id";
        
        $stmt = $conexao->prepare($query);
    
        // Atribuir os valores a variáveis antes de chamar bindParam
        $titulo = $contato->getTitulo();
        $descricao = $contato->getDesc();
        $idOrganizacaoEvento = $contato->getIdOrganizacaoEvento();
        $idCategoriaContatoOrganizacaoEvento = $contato->getIdCategoriaContatoOrganizacaoEvento();
           
               
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':idOrganizacaoEvento', $idOrganizacaoEvento);
        $stmt->bindParam(':idCategoriaContatoOrganizacaoEvento', $idCategoriaContatoOrganizacaoEvento);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
} ?>
