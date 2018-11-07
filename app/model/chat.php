<?php


class chat extends basemodel {

    public function getPost($id) {
        return postTable::getPostById($id);
    }
}