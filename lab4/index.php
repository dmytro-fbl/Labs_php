<?php
require_once 'Models/UserModel.php';
require_once 'Controllers/UserController.php';
require_once 'Views/UserView.php';

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
