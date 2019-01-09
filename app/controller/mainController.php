<?php
/*
 * Controller
 */

class mainController {

    /*
     * Action helloWorld
     */
    public static function helloWorld($request, $context) {
        // Si l'utilisateur est connecté
        if (context::getInstance()->getSessionAttribute('connected')) {
            $context->mavariable = "hello world";
            return context::SUCCESS;
        } else {
            return context::ERROR;
        }
    }


    /*
     * Action index
     */
    public static function index($request, $context) {
        $context->loggedUser = context::getInstance()->getSessionAttribute('user');
        $context->user = context::getInstance()->getSessionAttribute('user');
        $context->messages = messageTable::getLastMessages();
        $context->friendsList = utilisateurTable::getUsers();
        $context->chats = array_reverse(chatTable::getLastChats(25));
        return context::SUCCESS;
    }

    /*
     * Action friendsList
     */
    public static function friendsList($request, $context) {
        if (context::getInstance()->getSessionAttribute('connected')) {
            $context->loggedUser = context::getInstance()->getSessionAttribute('user');
            $context->friendsList = utilisateurTable::getUsers();
            $context->chats = array_reverse(chatTable::getLastChats(25));
            return context::SUCCESS;
        } else {
            return context::ERROR;
        }
    }

    /*
     * Action wall
     */
    public static function wall($request, $context) {
        $context->loggedUser = context::getInstance()->getSessionAttribute('user');
        if (isset($request['id'])) {
            $id = $request['id'];
            $context->user = utilisateurTable::getUserById($id);
            $context->messages = messageTable::getMessagesSentTo($id);
        } else {
            $context->user = utilisateurTable::getUserById(context::getInstance()->getSessionAttribute('user')['id']);
            $context->messages = messageTable::getLastMessagesSentTo($context->user['id']);
        }
        $context->chats = array_reverse(chatTable::getLastChats(25));
        return context::SUCCESS;
    }

    /*
     * Action superTest
     */
    public static function superTest($request, $context) {
        // On récupère les paramètres de la requête pour les stocker dans le contexte
        $context->param1 = $request['param1'];
        $context->param2 = $request['param2'];
        return context::SUCCESS;
    }

    /*
    * Action login
    */
    public static function login($request, $context) {
        // Si l'identifiant et le mot de passe ont été rentrés
        if (isset($request['username']) && isset($request['password'])) {
            $context->session = utilisateurTable::getUserByLoginAndPass($request['username'], $request['password']); // On recupere l'utilisateur
            // Si l'utilisateur n'existe pas
            if (!$context->session) {
                $context->notification = 'Erreur avec l\'identifiant ou le mot de passe'; // On génére un message d'erreur pour la notification
                return context::ERROR;
            } else {
                context::getInstance()->setSessionAttribute('connected', true); // On stocke le booleen de connexion dans la variable de session
                context::getInstance()->setSessionAttribute('user', $context->session[0]);
                $context->notification = 'Bonjour, ' . context::getInstance()->getSessionAttribute('user')['prenom']; // On génére un message de bienvenue pour la notification
                context::redirect('?action=index');
            }
        }
        return context::SUCCESS;
    }

    /*
    * Action logout
    */
    public static function logout($request, $context) {
        session_destroy();
        context::redirect('?action=login');

    }

    /*
    * Action addMessage
    */
    public static function addMessage($request, $context) {
        if(move_uploaded_file($_FILES['image']['tmp_name'],"images/".$_FILES['image']['name'])) {
            $image = "https://pedago02a.univ-avignon.fr/~uapv1901496/projet-web-l3/images/".$_FILES['image']['name'];
        }
        else {
            $image = "";
        }
        $postTable = [
            'texte' => $request['texte'],
            'date' => date('Y-m-d H:i:s'),
            'image' => $image
        ];
        $post = new post($postTable);
        $postId = $post->save();
        $messageTable = [
            'emetteur' => $request['emetteur'],
            'destinataire' => $request['destinataire'],
            'parent' => $request['parent'],
            'post' => $postId,
            'aime' => 0
        ];
        $message = new message($messageTable);
        $messageId = $message->save();
        context::redirect('?action=index');
    }

    /*
    * Action addChat
    */
    public static function addChat($request, $context) {
        $postTable = [
            'texte' => $request['texte'],
            'date' => date('Y-m-d H:i:s'),
            'image' => NULL
        ];
        $post = new post($postTable);
        $postId = $post->save();
        $chatTable = [
            'emetteur' => $request['emetteur'],
            'post' => $postId,
        ];
        $chat = new chat($chatTable);
        $chatId = $chat->save();
        context::redirect('?action=index');
    }

    /*
    * Action like
    */
    public static function like($request, $context) {
        $messageId = $request['messageId']; //NEED
        $aime = $request['aime']; //NEED

        $messageTable = [
            'id' => $messageId,
            'aime' => ++$aime
        ];
        $message = new message($messageTable);
        $messageId = $message->save();
        context::redirect('?action=index');
    }

    /*
    * Action share
    */
    public static function share($request, $context) {
        $messageId = $request['messageId'];
        $messageShared = messageTable::getMessageById($messageId)[0];
        $postTable = [
            'texte' => $messageShared->getPost()->texte,
            'date' => date('Y-m-d H:i:s'),
            'image' => $messageShared->getPost()->image
        ];
        $post = new post($postTable);
        $postId = $post->save();
        $messageTable = [
            'emetteur' => context::getInstance()->getSessionAttribute('user')['id'],
            'destinataire' => context::getInstance()->getSessionAttribute('user')['id'],
            'parent' => $messageShared->parent,
            'post' => $postId,
            'aime' => 0
        ];
        $message = new message($messageTable);
        $messageId = $message->save();
        context::redirect('?action=index');
    }

    /*
    * Action updateProfile
    */
    public static function updateProfile($request, $context) {
        if(move_uploaded_file($_FILES['avatar']['tmp_name'],"images/".$_FILES['avatar']['name'])) {
            $image = "https://pedago02a.univ-avignon.fr/~uapv1901496/projet-web-l3/images/".$_FILES['avatar']['name'];
        }
        else {
            $image = "";
        }
        $statut = $request['statut'];
        $user = new utilisateur([
            'id' => context::getInstance()->getSessionAttribute('user')['id'],
            'avatar' => $image,
            'statut' => $statut
        ]);
        $user->save();
        context::redirect('?action=wall');
    }
}
