<?php

if (context::getInstance()->getSessionAttribute('connected')) {
    include_once 'app/view/friendsList.php';
    include_once 'app/view/chat.php';
}