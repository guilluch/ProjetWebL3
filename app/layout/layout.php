<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>
        Ton appli !
    </title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Inclusion des fichiers css pour ma bibliothèque css -->
    <link rel="stylesheet" type="text/css" href="https://pedago.univ-avignon.fr/~uapv1901496/omegadesign/css/omegadesign.css">
    <link rel="stylesheet" type="text/css" href="http://omegaserv.net/omegadesign/css/omegadesign.css">
</head>

<body>
<header>
    <nav class="navbar">
        <ul>
            <li><a class="waves-effect waves-light" href="?action=index"><i class="material-icons">home</i></a></li>
<!--            <li><a class="waves-effect waves-light" href="?action=helloWorld">Hello World</a></li>-->
<!--            <li><a class="waves-effect waves-light" href="?action=superTest&param1=le_premier_parametre&param2=le_second_parametre">SuperTest</a></li>-->
            <li class="placeholder"></li>
            <?php
                if (!context::getInstance()->getSessionAttribute('connected')) {
                    echo '<li><a class="waves-effect waves-light" href="?action=login">Se connecter</a></li>';
                }
            ?>
            <?php
                if (context::getInstance()->getSessionAttribute('connected')) {
                    echo '<li><a class="waves-effect waves-light" href="?action=logout">Se déconnecter</a></li>';
                }
            ?>
        </ul>
    </nav>
</header>

<h2>Super c'est ton appli ! </h2>


<!--VIEW Liste d'amis-->
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

<main class="main">
    <?php
        if ($context->message !== null) {
            echo '<div id="notification" class="shadow full-rounded">' . $context->message . '</div>';
        }
    ?>
    <div class="container">
        <?php
            include($template_view);
        ?>
    </div>
</main>

<!-- Inclusion des fichiers js pour ma bibliothèque css -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="http://omegaserv.net/omegadesign/js/omegadesign.js"></script>
<script type="text/javascript" src="https://pedago.univ-avignon.fr/~uapv1901496/omegadesign/js/omegadesign.js"></script>
</body>


</html>
