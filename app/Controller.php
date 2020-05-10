<?php

class Controller
{
    public $config;

    public function __construct()
    {
        $this->config = (object) include "config.php";
    }

    public function url($route)
    {
        return $this->config->base_url."/".$route;
    }

    public function view($page_to_view, $data = [])
    {

        $app = $this;

        foreach($data as $key => $value) {
            $$key = $value;
        }

        include $this->config->base_dir."/views/".$page_to_view.".php";
    }

    public function redirect($url)
    {
        echo "<script>window.location='".$this->url($url)."'</script>";
    }

    public function isGuest()
    {
        if(!isset($_SESSION['user']))
            $this->redirect('welcome/login');
    }


    public function setSession($data = [] ) {
        if(!empty($data) && is_array($data)) {
            foreach($data as $key => $value) {
                $_SESSION[$key] = $value;
            }
        }
    }

    public function session($key) {
        return $_SESSION[$key];
    }

    public function deleteSession($key) {
        unset($_SESSION[$key]);
    }


    public function loadModel($model) {
        include "model.php";

        $model = ucfirst($model);
        include "model/".$model.".php";

        return new $model();
    }

    public function post($key = "")
    {
        if($key != "" && isset($_POST[$key])) {
            return $_POST[$key];
        }
        elseif($key == "") {
            return $_POST;
        }

        return "";
    }
}