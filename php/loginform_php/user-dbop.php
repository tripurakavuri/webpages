<?php
 
if (!isset($_SESSION))
    session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/initconfig.php';
include_once 'loginform_php/dbconnect.php';
 
class User {
 
    var $dbObj;
 
    public function __construct() {
        $this->dbObj = new db();
    }
 
    public function insert($user_name, $password, $name, $address, $contact_no, $about) {
        $password = hash('sha256', $password);
        $sql = " INSERT INTO user"
                . " (user_name,password,name,address,contact_no,about)"
                . " VALUES('$user_name','$password','$name','$address','$contact_no','$about')";
        return $this->dbObj->ExecuteQuery($sql, 2);
    }
 
    public function update($user_name, $password, $name, $address, $contact_no, $about, $old_password, $user_id) {
        if (empty($password))
            $password = $old_password;
        else
            $password = hash('sha256', $password);
        $sql = " UPDATE"
                . " user "
                . " SET user_name = '$user_name',password = '$password',name = '$name',address = '$address',"
                . " contact_no = '$contact_no',about = '$about'"
                . " WHERE user_id = '$user_id'";
        return $this->dbObj->ExecuteQuery($sql, 3);
    }
 
    public function select_by_id($user_id) {
        $sql = " SELECT"
                . " user_id,user_name,password,name,address,contact_no,about"
                . " FROM user WHERE user_id = '$user_id'";
        return $this->dbObj->ExecuteQuery($sql, 1);
    }
 
    public function delete_account($user_id) {
        $sql = " DELETE FROM user WHERE user_id = '$user_id'";
        return $this->dbObj->ExecuteQuery($sql, 3);
    }
 
    public function login($user_name, $password) {
        $password = hash('sha256', $password);
        $sql = " SELECT"
                . " user_id,name"
                . " FROM user WHERE"
                . " user_name = '$user_name' AND password = '$password'";
        $data = $this->dbObj->ExecuteQuery($sql, 1);
        if (mysqli_num_rows($data) > 0) {
            $fetch_data = mysqli_fetch_assoc($data);
            $_SESSION['user_id'] = $fetch_data['user_id'];
            $_SESSION['name'] = $fetch_data['name'];
            header("location:profile.php");
        } else {
            echo "<script>window.location='index.php';alert('Invalid User Name or Password !!')</script>";
        }
    }
 
}
 
?>
