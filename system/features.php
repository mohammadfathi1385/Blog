<?php

namespace system;

class features
{

    public function redirect($url)
    {
        header("location:http://localhost/" . $url);
    }

    public function redirectBack()
    {
        $referer = $_SERVER["HTTP_REFERER"];
        if ($referer != null or !empty($referer)) {
            header("location:" . $referer);
        } else {
            echo "Referer URL Not Found ! ";
        }
    }

    public function upload($file)
    {
        $fileName = $file["name"];
        $fileTemp = $file["tmp_name"];
        $fileType = $file["type"];

        switch ($fileType) {
            case "image/jpeg": {
                    $validType = true;
                    break;
                }
            case "image/jpg": {
                    $validType = true;
                    break;
                }
            case "image/png": {
                    $validType = true;
                    break;
                }
            case "image/svg": {
                    $validType = true;
                    break;
                }
            default: {
                    $validType = false;
                    break;
                }
        }

        if ($validType == true) {
            if (is_uploaded_file($fileTemp)) {
                $name = rand(1,1000) . "_" . $fileName;
                move_uploaded_file($fileTemp, "public/images/" . $name);
                return $name;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function deleteFile($path)
    {
        if (is_readable(__DIR__ . DIRECTORY_SEPARATOR . "../public/images/article/" . $path)) {
            unlink(is_readable(__DIR__ . DIRECTORY_SEPARATOR . "../public/images/article/" . $path));
            return true;
        } else {
            return false;
        }
    }

    public function view($path, $variables = null)
    {
        if (is_array($variables)) {
            extract($variables);
            require_once("public/views/" . $path);
        } else {
            require_once("public/views/" . $path);
        }
    }
}
