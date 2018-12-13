<div class="card rounded friends-list">
    <h3 class="card-header">Liste d'amis</h3>
    <div class="card-body">
        <?php
        foreach ($context->friendsList as $friend) {
            echo '<div>' . $friend . '</div>';
        }
        ?>
    </div>
</div>