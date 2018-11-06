<?php


class message extends basemodel {

    public function getPost($id) {
        return postTable::getPostById($id);
    }

    public function getEmetteur() {
        return $this->emetteur;
    }

    public function getDestinataire() {
        return $this->destinataire;
    }

    public function getParent() {
        return $this->parent;
    }

    public function getLikes() {
        return $this->aime;
    }
}