<?php


class postTable {

    public static function getPostById($id) {
        $connection = new dbconnection();
        $sql = "select * from fredouil.post where id = '" . $id . "'";
        $res = $connection->doQuery($sql);
        if ($res === false) {
            return false;
        }
        return $res;
    }
}