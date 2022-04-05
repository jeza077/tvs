<?php

require_once 'controllers/templateController.php';
require_once 'controllers/userController.php';

require_once 'models/userModel.php';

$template = new templateController();
$template -> template();