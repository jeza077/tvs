<?php

require_once 'vendor/autoload.php';
require_once 'controllers/templateController.php';
require_once 'controllers/userController.php';
require_once 'controllers/categoryController.php';

// require_once 'models/connection.php';
require_once 'models/userModel.php';
require_once 'models/categoryModel.php';


$template = new templateController();
$template -> template();