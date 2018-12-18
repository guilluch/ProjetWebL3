<div class="chat card much-rounded">
    <div class="card-header">Chat</div>
    <div class="card-body">
        <?php
        if ($context->chats !== null) {
            foreach ($context->chats as $chat) {
                echo utilisateurTable::getUserById($chat->emetteur)['prenom'] . ' ' . utilisateurTable::getUserById($chat->emetteur)['nom'] . ' : ' . $chat->getPost()->texte . '<br/><br/>';
            }
        }
        ?>
    </div>
    <div class="card-footer">
<!--       <input type="text" type="submit" placeholder="Message">-->
        <form class="form chat-form" xmlns="http://www.w3.org/1999/html" method="post" action="?action=addChat">
            <div>
                <input type="hidden" name="emetteur" value="<?php echo $context->loggedUser['id'] ?>">
                <textarea id="chat-input" class="input" placeholder=" " name="texte"></textarea>
                <label class="internal-label" for="post-input">Message</label>
            </div>
            <input class="btn full-rounded shadow h-align-right" type="submit" value="Poster"/>
        </form>
    </div>
</div>
