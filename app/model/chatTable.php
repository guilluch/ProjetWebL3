<?php


class chatTable {

    public static function getChats() {
        $connection = new dbconnection();
        $sql = "select * from fredouil.chat";
        $res = $connection->doQueryObject($sql, 'message');
        if ($res === false) {
            return false;
        }
        return $res;
    }

    public static function getLastChat() {
        $connection = new dbconnection();
        $sql = "select * from fredouil.chat LIMIT 1";
        $res = $connection->doQueryObject($sql, 'message');
        if ($res === false) {
            return false;
        }
        return $res;
    }
}