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
    <link rel="stylesheet" type="text/css" href="https://pedago.univ-avignon.fr/~uapv1901496/projet-web-l3/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://pedago.univ-avignon.fr/~uapv1901496/omegadesign/css/omegadesign.css">
</head>

<body>
<h2>Super c'est ton appli ! </h2>
<main class="main">
    <div id="notification" class="shadow hoverable full-rounded">Notification</div>
    <div class="container shadow much-rounded">
        <?php
        include($template_view);
        ?>
    </div>
</main>
</body>


</html>