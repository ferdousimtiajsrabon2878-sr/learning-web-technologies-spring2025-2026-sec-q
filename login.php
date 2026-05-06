<?php
session_start();
include "db.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM employees WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
    $_SESSION['username']=$username;
    header("Location: home.php");
} else {
    echo "Invalid credentials. <a href='login.html'>Try again</a>";
}
?>