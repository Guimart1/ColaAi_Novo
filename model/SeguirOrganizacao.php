<?php
class SeguirOrganizacao {
    public $id, $idUsuario, $idOrganizacaoEvento;

    // Getters e Setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }
    public function getIdOrgEvento() {
        return $this->idOrganizacaoEvento;
    }

    public function setIdOrgEvento($idOrganizacaoEvento) {
        $this->idOrganizacaoEvento = $idOrganizacaoEvento;
    }
}
?>