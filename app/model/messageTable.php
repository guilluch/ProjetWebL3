<?php


class messageTable {
    public static function getMessages() {
        $connection = new dbconnection();
        $sql = "select * from fredouil.message";
        $res = $connection->doQueryObject($sql, 'Message');
        if ($res === false) {
            return false;
        }
        return $res;
    }

    public static function getMessagesSentTo($id) {
        $connection = new dbconnection();
        $sql = "select * from fredouil.message where id = '" . $id . "'";
        $res = $connection->doQueryObject($sql, 'Message');
        if ($res === false) {
            return false;
        }
        return $res;
    }

    /* Dans la classe messageTable, vous devez implémenter une méthode « getMessagesByPage(début, fin) » permettant de
    faire de la pagination. Cette méthode devra faire appel à la fonction pl/sql « filtreMessages(début, fin) » que
    vous devez écrire et qui renvoie un tableau de messages. */

    public static function getMessagesByPage($debut, $fin, $id) {
        $connection = new dbconnection();
        $sql = "select filtreMessage(" . $debut .", " . $fin . "," . $id . ")";
        $res = $connection->doQueryObject($sql, 'Message');
        if ($res === false) {
            return false;
        }
        return $res;
    }

}