<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    // Check user credentials
    foreach ($_SESSION['users'] as $user) {
        if ($user['username'] === $inputUsername && $user['password'] === $inputPassword) {
            $_SESSION['user'] = $user;
            header("Location: home.php");
            exit();
        }
    }

    echo "Incorrect username or password.";
}
?>

<form method="post">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>