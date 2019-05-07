<?php

require '../config/dev.php';
require '../vendor/autoload.php';
session_start();
$router = new \App\config\Router();
$router->run();
//https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting#certificate-verification-failure