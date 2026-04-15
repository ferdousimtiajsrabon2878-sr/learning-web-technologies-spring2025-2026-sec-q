<?php
session_start();

if (empty($_SESSION['is_logged_in'])) {
    header("Location: login.php");
    exit();
}
?>

<h2>Welcome to Dashboard</h2>

<ul>
    <li><a href="profile.php">View Profile</a></li>
    <li><a href="edit.php">Edit Profile</a></li>
    <li><a href="changepass.php">Change Password</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>