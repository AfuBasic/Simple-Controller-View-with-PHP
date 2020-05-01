<?php
session_start();
include "vendor/autoload.php";
include "app.php";


$config = include "config.php";


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__."/../");
$dotenv->load();