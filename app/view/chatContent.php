<?php
if ($context->chats !== null) {
    foreach ($context->chats as $chat) {
        echo $chat->getEmetteur()['prenom'] . ' ' . $chat->getEmetteur()['nom'] . ' : ' . $chat->getPost()->texte . '<br/><br/>';
    }
}
?>