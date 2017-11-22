<?php
 
include_once $_SERVER['DOCUMENT_ROOT'] . '/initconfig.php';
include_once 'php-login-form/user-dbop.php';
$objUser = new User();
$objUser->delete_account($_SESSION['user_id']);
header('location:index.php');
?>
