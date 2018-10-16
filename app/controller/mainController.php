<?php
/*
 * Controller
 */

class mainController
{

    public static function helloWorld($request,$context) {
        if (isset($_SESSION)) {
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
        $context->param1 = $request['param1'];
        $context->param2 = $request['param2'];
        return context::SUCCESS;
    }


    public static function login($request, $context) {
        if (isset($request['username']) && isset($request['password'])) {
            $context->session = utilisateurTable::getUserByLoginAndPass($request['username'], $request['password']);
            if (!$context->session) {
                $context->message = 'Error with the username or the password';
                return context::ERROR;
            } else {
                context::getInstance()->setSessionAttribute('prenom', $context->session[0]['prenom']);
                $context->message = 'Bonjour, ' . context::getInstance()->getSessionAttribute('prenom');


            }
        }
        new dbconnection();
        return context::SUCCESS;
    }
}
