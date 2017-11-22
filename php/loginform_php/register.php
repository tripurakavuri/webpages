<?php
ob_start();
if (isset($_POST['register'])) {
    include_once $_SERVER['DOCUMENT_ROOT'] . '/initconfig.php';
    include_once 'php-login-form/user-dbop.php'; //php-login-form directory
    $objUser = new User();
    $objUser->insert($_POST['user_name'], $_POST['password'], $_POST['name'], $_POST['address'], $_POST['contact_no'], $_POST['about']);
    header('location:index.php');
}
?>

