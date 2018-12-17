<?php


class messageTable {
    public static function getMessages() {
        $connection = new dbconnection();
        $sql = "select * from fredouil.message order by id desc";
        $res = $connection->doQueryObject($sql, 'message');
        if ($res === false) {
            return false;
        }
        return $res;
    }

    public static function getLastMessages() {
        $connection = new dbconnection();
        $sql = "select * from fredouil.message order by id desc LIMIT 25";
        $res = $connection->doQueryObject($sql, 'message');
        if ($res === false) {
            return false;
        }
        return $res;
    }

    public static function getMessagesSentTo($id) {
        $connection = new dbconnection();
        $sql = "select * from fredouil.message where destinataire = '" . $id . "' order by id desc";
        $res = $connection->doQueryObject($sql, 'message');
        if ($res === false) {
            return false;
        }
        return $res;
    }

    public static function getMessagesByPage($debut, $fin, $id) {
        $connection = new dbconnection();
        $sql = "select filtreMessage(" . $debut .", " . $fin . "," . $id . ")";
        $res = $connection->doQueryObject($sql, 'message');
        if ($res === false) {
            return false;
        }
        return $res;
    }

}