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


        }
        ?>
    </div>
</div>


<div class="profile shadow much-rounded s12 l3">
    <div class="row">
        <img class="avatar" src="<?php
        if ($friend['avatar']) {
            echo $friend['avatar'];
        } else {
            echo 'images/avatar.png';
        }
        ?>"/>
        <span><?php echo $friend['prenom'] . ' ' . $friend['nom'] ?></span>
    </div>
    <span class="row"><?php echo $friend['statut'] ?></span>
    <span class="row birthdate"><?php echo $friend['date_de_naissance'] ?></span>
</div>