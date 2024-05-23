<?php
require_once(__DIR__ . '../../model/Conexao.php');

class PublicacaoDao
{
    public static function insert($publicacao)
    {
        $titulo = $publicacao->getTitulo();
        $descricao = $publicacao->getDescricao();
        $link = $publicacao->getLink();
        $idOrganizacaoEvento = $publicacao->getIdOrganizacaoEvento();
        $idSituacao = 1;

        $conn = Conexao::conectar();

        $stmt = $conn->prepare("INSERT INTO tbpublicacao (tituloPublicacao, descPublicacao, linkOrganizacaoEvento, idOrganizacaoEvento, idSituacaoPublicacao) VALUES (:titulo, :descricao, :link, :idOrganizacaoEvento, :idSituacao)");

        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':link', $link);
        $stmt->bindParam(':idOrganizacaoEvento', $idOrganizacaoEvento);
        $stmt->bindParam(':idSituacao', $idSituacao);

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
        $query = "SELECT * FROM tbpublicacao";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function selectAllActive()
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbpublicacao WHERE idSituacaoPublicacao = 1";
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function selectById($id)
    {
        $conexao = Conexao::conectar();
        $query = "SELECT * FROM tbpublicacao WHERE idPublicacao = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function delete($id)
    {
        $conexao = Conexao::conectar();
        $query = "DELETE FROM tbpublicacao WHERE idPublicacao = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public static function update($id, $publicacao)
    {
        $conexao = Conexao::conectar();

        $query = "UPDATE tbpublicacao SET 
                   tituloPublicacao = :titulo, 
                   descPublicacao = :descricao, 
                   linkOrganizacaoEvento = :link,
                   idOrganizacaoEvento = :idOrganizacaoEvento
                   WHERE idPublicacao = :id";

        $stmt = $conexao->prepare($query);

        // Atribuir os valores a variáveis antes de chamar bindParam
        $titulo = $publicacao->getTitulo();
        $descricao = $publicacao->getDescricao();
        $link = $publicacao->getLink();
        $idOrganizacaoEvento = $publicacao->getIdOrganizacaoEvento();

        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':link', $link);
        $stmt->bindParam(':idOrganizacaoEvento', $idOrganizacaoEvento);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
    public static function updateSituacao($id, $publicacao){
        $conexao = Conexao::conectar();
    
        $query = "UPDATE tbpublicacao SET 
            idSituacaoPublicacao = :situacao
            WHERE idPublicacao = :id";
        
        $stmt = $conexao->prepare($query);
    
        // Atribuir os valores a variáveis antes de chamar bindParam
        $situacao = $publicacao->getSituacaoPublicacao();

        $stmt->bindParam(':situacao', $situacao);
        $stmt->bindParam(':id', $id);
    
        return $stmt->execute();
    }
    public static function selectAllByOrganizacaoActive($idOrganizacao)
    {
        $conn = Conexao::conectar();
        $query = "SELECT * FROM tbpublicacao WHERE idOrganizacaoEvento = :idOrganizacao AND idSituacaoPublicacao = 1";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':idOrganizacao', $idOrganizacao, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function selectAllByOrganizacaoFiled($idOrganizacao)
    {
        $conn = Conexao::conectar();
        $query = "SELECT * FROM tbpublicacao WHERE idOrganizacaoEvento = :idOrganizacao AND idSituacaoPublicacao = 2";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':idOrganizacao', $idOrganizacao, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>