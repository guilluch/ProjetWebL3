<?php

abstract class basemodel {
    private $data = array();

    public function __construct($table) {
        if (isset($table) && is_array($table)) {
            foreach ($table as $key => $item) {
                $this->__set($key, $item);
            }
        }
    }

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __get($name) {
        if (isset($this->data[$name])) {
            return $this->data[$name];
        } else {
            return NULL;
        }
    }

    public function save() {
        $connection = new dbconnection();

        if ($this->id) {
            $sql = "update fredouil." . get_class($this) . " set ";

            $set = array();
            foreach ($this->data as $att => $value) {
                if ($att != 'id' && $value) {
                    $set[] = "$att = '" . $value . "'";
                }
            }

            $sql .= implode(",", $set);
            $sql .= " where id=" . $this->id;
            /*print_r($sql);
            exit();*/
        } else {
            $sql = "insert into fredouil." . get_class($this) . " ";
            $sql .= "(" . implode(",", array_keys($this->data)) . ") ";
            $sql .= "values ('" . implode("','", array_values($this->data)) . "')";
            /*print_r($sql);
            exit();*/
        }

        $connection->doExec($sql);
        $id = $connection->getLastInsertId("fredouil." . get_class($this));

        return $id == false ? NULL : $id;
    }

}
