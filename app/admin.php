<?php

namespace app;

session_start();

require_once("system/database.php");
require_once("system/features.php");

use system\DataBase;
use system\features;

class admin extends features{

    public function __construct()
    {
        if (empty($_SESSION["user"])){
            $this->redirect("auth/login");
        }
    }

    public function index()
    {
        $db = new DataBase();
        $articles = $db->read("articles");
        $setting = $db->read("setting","id","0")->fetch();
        $countArticles = $db->query("SELECT COUNT(*) FROM `articles` ")->fetch();
        $countAdmins = $db->query("SELECT COUNT(*) FROM `admins` ")->fetch();
        $countMenus = $db->query("SELECT COUNT(*) FROM `menus` ")->fetch();
        $this->view("admin/index.php",compact("articles","countMenus","setting","countArticles","countAdmins"));
    }

    # Remove Methods

    public function rmArticle($id){
        $db = new DataBase();
        $db->delete("articles",$id);
        $this->redirect("admin/index");
    }

    public function rmMenu($id){
        $db = new DataBase();
        $db->delete("menus",$id);
        $this->redirect("admin/menus");
    }

    // End

    # Index Items

    public function articles(){
        $db = new DataBase();
        $articles = $db->read("articles");
        $setting = $db->read("setting","id","0")->fetch();
        $this->view("admin/articles.php",compact("articles","setting"));
    }

    public function admins(){
        $db = new DataBase();
        $admins = $db->read("admins");
        $setting = $db->read("setting","id","0")->fetch();
        $this->view("admin/admins.php",compact("admins","setting"));
    }

    public function menus(){
        $db = new DataBase();
        $menus = $db->read("menus");
        $setting = $db->read("setting","id","0")->fetch();
        $this->view("admin/menus.php",compact("menus","setting"));
    }

    // End

    # Forms For Store Datas

    public function addArticle(){
        $db = new DataBase();
        $setting = $db->read("setting","id","0")->fetch();
        $this->view("admin/addArticle.php",compact("setting"));
    }

    public function addMenu(){
        $db = new DataBase();
        $setting = $db->read("setting","id","0")->fetch();
        $this->view("admin/addMenu.php",compact("setting"));
    }

    public function addAdmin(){
        $db = new DataBase();
        $setting = $db->read("setting","id","0")->fetch();
        $this->view("admin/addAdmin.php",compact("setting"));
    }

    // End

    public function storeArticle(){
        $db = new DataBase();
        $title = $_POST["title"];
        $body = $_POST["body"];
        $image = $_FILES["image"];        
        $imageName = $this->upload($image);
        $db->query("INSERT INTO `articles` (`title`,`body`,`image`,`create_time`) VALUES ('$title','$body','$imageName',now()) ");
        $this->redirect("admin/articles");
    }

    public function storeMenu(){
        $db = new DataBase();
        $title = $_POST["title"];
        $link = $_POST["link"];
        $db->query("INSERT INTO `menus` (`title`,`link`,`create_time`) VALUES ('$title','$link',now()) ");
        $this->redirect("admin/menus");
    }

    public function storeAdmin(){
        $db = new DataBase();
        $username = $_POST["username"];
        $password = $_POST["password"];
        $db->query("INSERT INTO `admins` (`username`,`password`,`create_time`) VALUES ('$username','$password',now()) ");
        $this->redirect("admin/admins");
    }

    // Website Setting

    public function settings(){
        $db = new DataBase();
        $setting = $db->read("setting")->fetch();
        $this->view("admin/settings.php",compact("setting"));
    }

    public function storeSetting(){
        $db = new DataBase();
        $title = $_POST["title"];
        $email = $_POST["email"];
        $description = $_POST["description"];
        $db->query("UPDATE `setting` SET `title` = '$title' , `description` = '$description' , `email` = '$email' WHERE `id` = '0' ");
        $this->redirect("admin/index");
    }


}

