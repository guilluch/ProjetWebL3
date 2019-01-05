<?php
//nom de l'application
$nameApp = "app";

//action par défaut
$action = "index";

if (key_exists("action", $_REQUEST))
    $action = $_REQUEST['action'];

require_once 'lib/core.php';
require_once $nameApp . '/controller/ajaxController.php';
session_start();

$context = context::getInstance();
$context->init($nameApp);

$view = $context->executeAjaxAction($action, $_REQUEST);

echo $view;

if ($view === false) {
    echo "Une grave erreur s'est produite, il est probable que l'action " . $action . " n'existe pas...";
    die;
}
/*elseif ($view != context::NONE) {
    $template_view = $nameApp . "/view/" . $action . $view . ".php";
    include($nameApp . "/layout/" . $context->getLayout() . ".php");
}*/

?>
