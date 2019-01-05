<?php


class message extends basemodel {

    public function getPost() {
        return postTable::getPostById($this->post);
    }

    public function getEmetteur() {
        return utilisateurTable::getUserById($this->emetteur);
    }

    public function getDestinataire() {
        return utilisateurTable::getUserById($this->destinataire);
    }

    public function getParent() {
        return utilisateurTable::getUserById($this->parent);
    }

    public function getLikes() {
        return $this->aime;
    }
}