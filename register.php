<?php
include "db.php";

$name = $_POST['name'];
$username = $_POST['username'];
$password = md5($_POST['password']);

if($name!="" && $username!="" && $_POST['password']!=""){
    $sql = "INSERT INTO employees (name, username, password) VALUES ('$name','$username','$password')";
    if(mysqli_query($conn,$sql)){
        echo "Registration successful. <a href='login.html'>Login here</a>";
    } else {
        echo "Error: ".mysqli_error($conn);
    }
} else {
    echo "All fields required. <a href='register.html'>Back</a>";
}
?>