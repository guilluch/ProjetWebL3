<div class="friend-list s12 l2">
    <div class="card much-rounded">
        <h3 class="card-header">Liste d'amis</h3>
        <div class="card-body">
            <?php
            foreach ($context->friendsList as $friend) {
                echo '<div class="row"><div class="col"><img class="avatar" src="images/avatar.png"/></div><div class="col">' . $friend . '</div></div>';
            }
            ?>
        </div>
    </div>
</div>
