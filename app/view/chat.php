<div class="chat card much-rounded">
    <div class="card-header" style="display: flex;align-items: center">
        <span>Chat</span>
        <span class="placeholder"></span>
        <a class="close-chat"><i class="material-icons">close</i></a>
    </div>
    <div class="card-body chat-content">
        <?php include_once 'app/view/chatContent.php'?>
    </div>
    <div class="card-footer">
        <form class="form chat-form" xmlns="http://www.w3.org/1999/html" method="post" onsubmit="addChat(event)" action="?action=addChat">
            <div>
                <input type="hidden" name="emetteur" value="<?php echo $context->loggedUser['id'] ?>">
                <textarea id="chat-input" class="input" placeholder="Message" name="texte"></textarea>
            </div>
            <input class="btn full-rounded shadow h-align-right" type="submit" value="Poster"/>
        </form>
    </div>
</div>
