<div class="news-feed s12 m9 l6 h-align-center">
    <form class="form post-form" xmlns="http://www.w3.org/1999/html" method="post" action="?action=addMessage" enctype="multipart/form-data">
        <input type="hidden" name="emetteur" value="<?php echo $context->loggedUser['id'] ?>"/>
        <input type="hidden" name="destinataire" value="<?php echo $context->user['id'] ?>"/>
        <input type="hidden" name="parent" value="<?php echo $context->loggedUser['id'] ?>"/>
        <div>
            <textarea id="post-input" class="input" placeholder="Message" name="texte"></textarea>
        </div>
        <input type="file" value="Uploader une image" name="image"/>
        <input class="btn full-rounded shadow h-align-right" type="submit" value="Poster"/>
    </form>
    <?php
    foreach ($context->messages as $message) {
        $emetteur = $message->getEmetteur();
        $parent = $message->getParent();
        $post = $message->getPost();
        echo '<div class="post card much-rounded hoverable">
            <div class="card-header">
            <img class="avatar" src="';
        if ($emetteur['avatar']) {
            echo $emetteur['avatar'];
        } else {
            echo 'images/avatar.png';
        }
        echo '"/>
            <a class="name" href="?action=wall&id=' . $message->emetteur . '">' . $emetteur['prenom'] . ' ' . $emetteur['nom'] . '</a>';
        if ($message->parent !== $message->emetteur) {
            echo '<div class="placeholder"></div>';
            echo '<span>Partagé de ' . $parent['prenom'] . ' ' . $parent['nom'] . '</span>';
        }
        echo '</div>
            <div class="card-body">';
        echo '<p>' . $post->texte . '</p>';
        if ($post->image) {
            echo '<img class="post-img much-rounded" src="' . $post->image . '"/>';
        }
        echo '</div>
            <div class="card-footer vote-btn-container"><span>'.
            $message->aime
            .'</span><a class="like btn vote-btn full-rounded waves-effect" onclick="like(event,' . $message->id . ')" href="?action=like&messageId='
            .$message->id . '&aime=' . $message->aime
            . '"><i class="material-icons">thumb_up_alt</i></a>
            
            <a class="btn vote-btn full-rounded waves-effect" href="?action=share&messageId='
            .$message->id
            .'"><i class="material-icons">share</i></a>
            </div>
            </div>';
    }
    ?>
</div>