<?php
if (context::getInstance()->getSessionAttribute('connected')) {
    include_once 'app/view/profile.php';
    include_once 'app/view/messageList.php';
}

