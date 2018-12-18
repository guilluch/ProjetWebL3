<?php


class chat extends basemodel {

    public function getPost() {
        return postTable::getPostById($this->post);
    }
}