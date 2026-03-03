<?php
require_once('Utils/autoload.php');

use Controllers\UserController;
use Views\UserView;
use Models\UserModel;

$userController = new UserController();
$userView = new UserView();
$userModel = new UserModel();

$userController->printController();
$userView->printView();
$userModel->printModel();

//
?>
