<?php

namespace system;

// ini_set("display_errors","0");
error_reporting(E_ALL);

class router
{
    private $route;
    private $parameters;

    public function __construct()
    {
        $this->route = array_slice(explode("/", $_SERVER["REQUEST_URI"]), 1);
        $this->parameters = array_slice(explode("/", $_SERVER["REQUEST_URI"]), 3);
    }

    private function error404()
    {
        http_response_code(404);
    }

    public function run()
    {
        if(empty($this->route[0])){
            require_once(__DIR__.DIRECTORY_SEPARATOR."../app/home.php");
            $classHome = "\app\\home";
            $objectHome = new $classHome();
            call_user_func([$objectHome,"index"]);
        }
        elseif (is_readable("../app/" . $this->route[0]).".php") {
            // die(var_dump($this->route));
            require_once(__DIR__.DIRECTORY_SEPARATOR."../app/".$this->route[0].".php");
            $class = "\app\\" . $this->route[0];
            $object = new $class();
            $parameters = $this->parameters;
            $method = $this->route[1];
            if (method_exists($object, $method)) {
                if ($_SERVER["REQUEST_METHOD"] == "GET" and count($parameters) > 0) {
                    call_user_func_array([$object, $method], $parameters);
                } elseif ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_FILES)) {
                    call_user_func_array([$object, $method], [$_POST, $_FILES]);
                } elseif ($_SERVER["REQUEST_METHOD"] == $_POST) {
                    call_user_func_array([$object, $method], $_POST);
                } else {
                    call_user_func([$object, $method]);
                }
            } else {
                $this->error404();
                echo "404 - Method Not Found !";
                exit;
            }
        } else {
            $this->error404();
            echo "404 - Class Not Found !";
            exit;
        }
    }
}
