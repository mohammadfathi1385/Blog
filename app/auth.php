<?php

namespace app;

session_start();

require_once("system/features.php");
require_once("system/database.php");

use system\features;
use system\DataBase;

class auth extends features
{
    public function login()
    {
        if(isset($_SESSION["user"])){
            $this->redirect("admin/index");
        }else{
            $this->view("auth/login.php");
        }
    }

    public function loginAction()
    {
        $db = new DataBase();
        if (!empty($_POST["username"]) and !empty($_POST["password"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $user = $db->selectAdmin($username, $password)->fetch();
            if ($user["username"] === $username and $user["password"] === $password) {
                $userid = $user["id"];
                $_SESSION["user"] = $userid;
                $this->redirect("admin/index");
            } else {
                $this->redirect("auth/login/error=wrongUsername");
            }
        } else {
            $this->redirect("auth/login/error=emptyFields");
        }
    }

    public function logOut(){
        if(isset($_SESSION["user"])){
            unset($_SESSION["user"]);
            session_destroy();
            $this->redirect("home/index");
        }else{
            $this->redirect("auth/login");
        }
    }

}
