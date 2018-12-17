<?php
if (context::getInstance()->getSessionAttribute('connected')) {
    require 'app/view/profil.php';
    include_once 'app/view/messageList.php';
    include_once 'app/view/friendList.php';
}

