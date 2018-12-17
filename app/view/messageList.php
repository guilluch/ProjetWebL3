<div class="news-feed s12 m9 l6 h-align-center">
    <form id="post-form" class="form" xmlns="http://www.w3.org/1999/html" (submit)="submit($event)">
        <div style="position: relative;">
            <textarea id="post-input" class="input" type="text" placeholder=" "></textarea>
            <label class="internal-label" for="post-input">Message</label>
        </div>
        <input class="btn full-rounded shadow h-align-right" type="submit" value="Post"/>
    </form>
    <?php
    foreach ($context->messages as $message) {
        echo '<div class="post card much-rounded hoverable">
            <div class="card-header">
                <a href="?action=username">' . utilisateurTable::getUserById($message->emetteur)['prenom'] . ' ' . utilisateurTable::getUserById($message->emetteur)['nom'] . '</a>
            </div>
            <div class="card-body">
                <p>' . $message->getPost()->texte . '</p>
            </div>
            <div class="card-footer vote-btn-container">
                <button class="btn vote-btn full-rounded waves-effect"><i class="material-icons">thumb_up_alt</i></button>
                <button class="btn vote-btn full-rounded waves-effect"><i class="material-icons">share</i></button>
            </div>
        </div>';
    }
    ?>
</div>
