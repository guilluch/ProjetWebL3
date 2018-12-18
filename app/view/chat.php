<div class="chat card much-rounded">
    <div class="card-header">
        <?php
        $prenom = utilisateurTable::getUserById(10)['prenom'];
        print($prenom);
        ?> 
    </div>
    <div class="card-body">

    </div>
    <div class="card-footer vote-btn-container">
       <input type="text" type="submit" value="Ecrivez votre message">
    </div>
</div>
