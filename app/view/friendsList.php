<div class="friends-list container">
    <div class="row">
        <?php
        foreach ($context->friendsList as $friend) {
            echo '<div class="profile s12 l4">
                <img class="avatar" src="';
            if ($friend['avatar']) {
                echo $friend['avatar'];
            } else {
                echo 'images/avatar.png';
            }
            echo '"/><a class="name" onclick="wall(event,' . $friend['id'] . ')" href="?action=wall&id=' . $friend['id'] . '">';
            echo $friend['prenom'] . ' ' . $friend['nom'];
            echo '</a><span>' . $friend['statut'] . '</span>
                <span class="birthdate">' . $friend['date_de_naissance'] . '</span></div>';
        }
        ?>
    </div>
</div>
<?php
