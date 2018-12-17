<!--TODO : sans card-->

<div class="profile shadow much-rounded s12 l3">
    <div class="row">
        <img class="avatar" src="<?php
        if ($context->loggedUser['avatar']) {
            echo $context->loggedUser['avatar'];
        } else {
            echo 'images/avatar.png';
        }
        ?>"/>
        <span><?php echo $context->loggedUser['prenom'] . ' ' . $context->loggedUser['nom'] ?></span>
    </div>
    <span class="row"><?php echo $context->loggedUser['statut'] ?></span>
    <span class="row birthdate"><?php echo $context->loggedUser['date_de_naissance'] ?></span>
</div>

