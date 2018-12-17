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
</div>

