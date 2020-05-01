<?php 
include "app/bootstrap.php";


//Load the Application Bootstrap with the necessary Configuration
$app = new App($config);

//Run the Application
$app->run();