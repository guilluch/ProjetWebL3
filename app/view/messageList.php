<div class="news-feed s12 m9 l6 h-align-center">
    <form class="form post-form" xmlns="http://www.w3.org/1999/html" method="post" action="?action=addMessage">
        <div>
            <input type="hidden" name="emetteur" value="<?php echo $context->loggedUser['id'] ?>">
            <input type="hidden" name="destinataire" value="<?php echo $context->user['id'] ?>">
            <input type="hidden" name="parent" value="<?php echo $context->loggedUser['id'] ?>">
            <textarea id="post-input" class="input" placeholder=" " name="texte"></textarea>
            <label class="internal-label" for="post-input">Message</label>
        </div>
        <input class="btn full-rounded shadow h-align-right" type="submit" value="Poster"/>
    </form>
    <?php
    foreach ($context->messages as $message) {
        echo '<div class="post card much-rounded hoverable">
            <div class="card-header">
            <img class="avatar" src="';
        if (utilisateurTable::getUserById($message->emetteur)['avatar']) {
            echo utilisateurTable::getUserById($message->emetteur)['avatar'];
        } else {
            echo 'images/avatar.png';
        }
        echo '"/>
            <a class="name" href="?action=wall&id=' . $message->emetteur . '">' . utilisateurTable::getUserById($message->emetteur)['prenom'] . ' ' . utilisateurTable::getUserById($message->emetteur)['nom'] . '</a>
            </div>
            <div class="card-body">
            <p>' . $message->getPost()->texte . '</p>';
        if ($message->getPost()->image) {
            echo '<img class="post-img shadow" src="' . $message->getPost()->image . '"/>';
        }
        echo '</div>
            <div class="card-footer vote-btn-container"><span>'.
            $message->aime
            .'</span><a class="btn vote-btn full-rounded waves-effect" href="?action=like&messageId=' . $message->id . '&aime=' . $message->aime . '"><i class="material-icons">thumb_up_alt</i></a>
            <a class="btn vote-btn full-rounded waves-effect"><i class="material-icons">share</i></a>
            </div>
            </div>';
    }
    ?>
</div>
