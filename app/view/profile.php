<!--TODO : sans card-->

<div class="profile shadow much-rounded s12 l2">
<!--    <div class="row">-->
        <img class="avatar" src="<?php
        if ($context->user['avatar']) {
            echo $context->user['avatar'];
        } else {
            echo 'images/avatar.png';
        }
        ?>"/>
        <span class="name"><?php echo $context->user['prenom'] . ' ' . $context->user['nom'] ?></span>
<!--    </div>-->
    <span><?php echo $context->user['statut'] ?></span>
    <span class="birthdate"><?php echo $context->user['date_de_naissance'] ?></span>

    <?php
    if ($context->loggedUser['id'] === $context->user['id']) {
        echo '<br/><form class="form profile-form" xmlns="http://www.w3.org/1999/html" method="post" action="?action=updateProfile" enctype="multipart/form-data">
            <label>Avatar :</label>
            <input type="file" name="avatar" value="Uploader avatar"/>
            <input type="text" name="statut" placeholder="Changer statut"/>
            <input class="btn full-rounded" type="submit" value="Sauvegarder"/>
            </form>';
    }
    ?>
</div>

