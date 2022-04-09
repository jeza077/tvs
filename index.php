<?php

require_once 'vendor/autoload.php';
require_once 'controllers/templateController.php';
require_once 'controllers/userController.php';

require_once 'models/userModel.php';
require_once 'models/connection.php';


$template = new templateController();
$template -> template();