<?php

namespace app;

require_once("system/database.php");
require_once("system/features.php");

use system\DataBase;
use system\features;

class home extends features
{

    public function index()
    {
        $db = new DataBase();
        $articles = $db->read("articles");
        $menus = $db->read("menus");
        $setting = $db->read("setting", "id", "0")->fetch();
        $this->view("home/index.php", compact("articles", "menus", "setting"));
    }

    public function show_article($id = null)
    {
        if ($id != null) {
            $db = new DataBase();
            $article = $db->read("articles", "id", $id)->fetch();
            $menus = $db->read("menus");
            $setting = $db->read("setting", "id", 0)->fetch();
            $randoms = $db->query("SELECT * FROM `articles` ORDER BY RAND() LIMIT 5");
            $this->view("home/show_article.php", compact("article", "menus", "setting","randoms"));
        } else {
            echo "<h1 style='text-align:center'>آدرس وارد شده صحیح نمی باشد</h1>";
        }
    }
}

