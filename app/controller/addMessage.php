<?php

require_once 'app/model/message.php';

function addMessage($emetteur, $destinataire, $parent, $post, $aimer) {

    $post = new Post([]);

    $message = new Message([]);
    $message.save();
}