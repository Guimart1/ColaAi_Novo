<?php

class Publicacao {
    public $id, $titulo, $descricao,$link, $imagem, $idOrganizacaoEvento, $situacaoPublicacao;

    // Getters e Setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getLink() {
        return $this->link;
    }

    public function setLink($link) {
        $this->link = $link;
    }

    public function getIdOrganizacaoEvento() {
        return $this->idOrganizacaoEvento;
    }

    public function setIdOrganizacaoEvento($idOrganizacaoEvento) {
        $this->idOrganizacaoEvento = $idOrganizacaoEvento;
    }
    public function getImagem(){
        return $this->imagem;
    }
    public function setImagem($imagem){
        $this-> imagem = $imagem;
    }
    public function getSituacaoPublicacao(){
        return $this->situacaoPublicacao;
    }
    public function setSituacaoPublicacao($situacaoPublicacao){
        $this-> situacaoPublicacao = $situacaoPublicacao;
    }

    public function salvarImagem($novo_nome){
        if(empty($_FILES['foto']['size']) != 1){
            if($novo_nome == ""){
                $novo_nome = md5(time()). ".jpg";
            }
            $diretorio = "../../img/Organizacao/";
            $nomeCompleto = $diretorio.$novo_nome;
            move_uploaded_file($_FILES['foto']['tmp_name'], $nomeCompleto);
            return $novo_nome;
        }
        else{
            return $novo_nome;
        }
    }
}
?>
