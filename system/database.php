<?php

namespace system;

require_once(__DIR__ . DIRECTORY_SEPARATOR . "config.php");

use PDO;
use PDOException;

class DataBase
{

    private $connection = null;

    public function __construct()
    {
        if ($this->connection == null) {
            try {
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_PERSISTENT => TRUE
                ];
                $this->connection = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS, $options);
            } catch (PDOException $errors) {
                die("There is some problem in your connection : " . $errors->getMessage());
            }
        }
    }


    public function read($tableName, $where = null, $value = null)
    {
        try {
            if ($where != null and $value != null) {
                $query = $this->connection->query("SELECT * FROM `" . $tableName . "` WHERE `".$where."` = '$value' ");
                return $query != null ? $query : false;
            } else {
                $query = $this->connection->query("SELECT * FROM `" . $tableName . "` ");
                return $query != null ? $query : false;
            }
        } catch (PDOException $errors) {
            return false;
            die("There is some problem in your select method : " . $errors->getMessage());
        }
    }

    public function update($tableName, $id, $fields, $values)
    {
        try {
            $sql = "UPDATE `" . $tableName . "` SET ";
            foreach ($fields as $field) {
                $sql .= " `" . $field . "` = ? , ";
            }
            $sql .= " `created_time` = now() WHERE `id` = ? ";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(array_merge($values, $id));
            return true;
        } catch (PDOException $errors) {
            return false;
            die("There is some problem in your update method : " . $errors->getMessage());
        }
    }

    public function delete($tableName, $id)
    {
        try {
            $this->connection->query("DELETE FROM `" . $tableName . "` WHERE `id` = " . $id . " ");
            return true;
        } catch (PDOException $errors) {
            return false;
            die("There is some problem in your delete method : " . $errors->getMessage());
        }
    }

    public function create($tableName, $fields, $values)
    {
        try {
            $sql = "INSERT INTO `" . $tableName . "` (";
            $a = 0;
            while ($a < count($fields)) {
                $sql .= " `" . $fields[$a] . "` , ";
                $a++;
            }
            $sql .= " `created_time` ) VALUES (";
            $a = 0;
            while ($a < count($values)) {
                $sql .= " ? , ";
                $a++;
            }
            $sql .= " now() );";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($values);
        } catch (PDOException $errors) {
            return false;
            die("There is some problem in your create method : " . $errors->getMessage());
        }
    }

    public function query($sql, $values = null){
        try{
            if($values != null){
                $stmt = $this->connection->prepare($sql);
                $result = $stmt->execute($values);
                return $result;
            }else{
                $result = $this->connection->query($sql);
                return $result;
            }
            return false;
        }
        catch(PDOException $errors){
            die("There is some problem in your query method : ".$errors->getMessage());
        }
    }

    public function selectAdmin($username,$password){
        try{
            $query = $this->connection->query("SELECT * FROM `admins` WHERE `username` = '$username' AND `password` = '$password' ");
            return $query != null ? $query : false;
        }
        catch(PDOException $errors){
            die("There is some problem in your select Admin method : ".$errors->getMessage());
        }
    }

    public function __destruct()
    {
        $this->connection = null;
    }

}

