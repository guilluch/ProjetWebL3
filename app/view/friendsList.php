<!--TODO : sans card-->

<!--<div class="friends-list s12 l3">
    <div class="card much-rounded">
        <h3 class="card-header">Liste d'amis</h3>
        <div class="card-body">
            <?php
/*            foreach ($context->friendsList as $friend) {
                echo '<div class="row"><div class="col"><img class="avatar" src="images/avatar.png"/></div><div class="col">' . $friend['prenom'] . ' ' . $friend['nom'] . '</div></div>';
            }
            */ ?>
        </div>
    </div>
</div>-->


<div class="friends-list container">
    <div class="row">
        <?php
        foreach ($context->friendsList as $friend) {
            /*echo '<div class="col much-rounded shadow s12 m6 l4" style="padding: 1rem; box-sizing: border-box">
                <div class="row" style="align-items: center">
                    <img class="avatar" src="images/avatar.png"/>
                    <a>' . $friend['prenom'] . ' ' . $friend['nom'] . '</a>
                </div>
            </div>';*/


            echo '<div class="profile s12 l4">
                <img class="avatar" src="';
            if ($friend['avatar']) {
                echo $friend['avatar'];
            } else {
                echo 'images/avatar.png';
            }
            echo '"/><a class="name" href="?action=wall&id=' . $friend['id'] . '">';
            echo $friend['prenom'] . ' ' . $friend['nom'];
            echo '</a><span>' . $friend['statut'] . '</span>
                <span class="birthdate">' . $friend['date_de_naissance'] . '</span></div>';

        }
        ?>
    </div>
</div>

<?php
