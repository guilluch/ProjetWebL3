<?php
/*
 * Controller
 */

class mainController
{

    public static function helloWorld($request,$context)
    {
        $context->mavariable="hello world";
        return context::SUCCESS;
    }



    public static function index($request,$context)
    {
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
        }
        $context->dbconnection = new dbconnection();
        return context::SUCCESS;
    }

}
