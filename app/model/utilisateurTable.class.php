<?php

class utilisateurTable {
    public static function getUserByLoginAndPass($login, $pass) {
        $connection = new dbconnection();
        $sql = "select * from fredouil.utilisateur where identifiant='" . $login . "' and pass='" . sha1($pass) . "'";

        $res = $connection->doQuery($sql);

        if ($res === false)
            return false;

        return $res;
    }

    public static function getUserById($id) {
        $connection = new dbconnection();
        $sql = "select * from fredouil.utilisateur where id = '" . $id . "'";
        $res = $connection->doQuery($sql);
        if ($res === false) {
            return false;
        }
        return $res[0];
    }

    public static function getUsers() {
        $connection = new dbconnection();
        $sql = "select * from fredouil.utilisateur";
        $res = $connection->doQuery($sql);
        if ($res === false) {
            return false;
        }
        return $res;
    }
}
