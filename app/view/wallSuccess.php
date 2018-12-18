<?php
if (context::getInstance()->getSessionAttribute('connected')) {
    echo '<div class="row">';
    include_once 'app/view/profile.php';
    include_once 'app/view/messageList.php';
    echo '</div>';
    include_once 'app/view/chat.php';
}


