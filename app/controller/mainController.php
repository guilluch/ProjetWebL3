<?php
/*
 * Controller
 */

class mainController {

    public static function helloWorld($request, $context) {
        // Si l'utilisateur est connecté
        if (context::getInstance()->getSessionAttribute('connected')) {
            $context->mavariable = "hello world";
            return context::SUCCESS;
        } else {
            return context::ERROR;
        }
    }


    public static function index($request, $context) {
        $context->loggedUser = context::getInstance()->getSessionAttribute('user');
        $context->user = context::getInstance()->getSessionAttribute('user');
//        $context->messages = messageTable::getMessagesSentTo(61);
        $context->messages = messageTable::getLastMessages();
        $context->friendsList = utilisateurTable::getUsers();
        return context::SUCCESS;
    }


    public static function friendsList($request, $context) {
        if (context::getInstance()->getSessionAttribute('connected')) {
            $context->friendsList = utilisateurTable::getUsers();
            return context::SUCCESS;
        } else {
            return context::ERROR;
        }
    }

    public static function wall($request, $context) {
        $context->loggedUser = context::getInstance()->getSessionAttribute('user');
        if (isset($request['id'])) {
            $id = $request['id'];
            $context->user = utilisateurTable::getUserById($id);
            $context->messages = messageTable::getMessagesSentTo($id);
            return context::SUCCESS;
        } else {
            $context->user = context::getInstance()->getSessionAttribute('user');
            $context->messages = messageTable::getMessagesSentTo($context->user['id']);
            return context::SUCCESS;
        }
    }


    public static function superTest($request, $context) {
        // On récupère les paramètres de la requête pour les stocker dans le contexte
        $context->param1 = $request['param1'];
        $context->param2 = $request['param2'];
        return context::SUCCESS;
    }


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

    public static function logout($request, $context) {
        session_destroy();
        context::redirect('?action=login');

    }

    public static function addMessage($request, $context) {
        $postTable = [
            'texte' => $request['texte'],
            'date' => date('Y-m-d H:i:s'),
            'image' => NULL
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
}
