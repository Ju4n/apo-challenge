<?php
require_once('../vendor/autoload.php');

// load env vars
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->safeLoad();

require_once('../src/Utils/Includes/container.php');
require_once('../src/Utils/Includes/routes.php');