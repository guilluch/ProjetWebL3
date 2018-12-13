<?php


class Chat extends basemodel {

    public function getPost($id) {
        return postTable::getPostById($id);
    }
}