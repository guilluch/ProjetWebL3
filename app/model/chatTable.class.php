<?php


class chatTable {

    public static function getChats() {
        $connection = new dbconnection();
        $sql = "select * from fredouil.chat";
        $res = $connection->doQueryObject($sql, 'chat');
        if ($res === false) {
            return false;
        }
        return $res;
    }

    public static function getLastChat() {
        $connection = new dbconnection();
        $sql = "select * from fredouil.chat order by id desc LIMIT 1";
        $res = $connection->doQueryObject($sql, 'chat');
        if ($res === false) {
            return false;
        }
        return $res;
    }

    public static function getLastChats($nb) {
        $connection = new dbconnection();
        $sql = "select * from fredouil.chat order by id desc LIMIT " . $nb;
        $res = $connection->doQueryObject($sql, 'chat');
        if ($res === false) {
            return false;
        }
        return $res;
    }
}