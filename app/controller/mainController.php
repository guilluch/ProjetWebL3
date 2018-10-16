<?php
/*
 * Controller
 */

class mainController
{

    public static function helloWorld($request,$context) {
        // Si l'utilisateur est connecté
        if (context::getInstance()->getSessionAttribute('connected')) {
            $context->mavariable="hello world";
            return context::SUCCESS;
        } else {
            return context::ERROR;
        }
    }


    public static function index($request,$context) {
        return context::SUCCESS;
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
                $context->message = 'Erreur avec l\'identifiant ou le mot de passe'; // On génére un message d'erreur pour la notification
                return context::ERROR;
            } else {
                context::getInstance()->setSessionAttribute('connected', true); // On stocke le booleen de connexion dans la variable de session
                context::getInstance()->setSessionAttribute('prenom', $context->session[0]['prenom']); // On stocke le prenom dans la variable de session
                $context->message = 'Bonjour, ' . context::getInstance()->getSessionAttribute('prenom'); // On génére un message de bienvenue pour la notification
            }
        }
        return context::SUCCESS;
    }
}
