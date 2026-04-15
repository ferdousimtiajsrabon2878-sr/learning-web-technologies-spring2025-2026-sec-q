<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (isset($_SESSION['user_data'])) {

        $storedUser = $_SESSION['user_data'];

        if ($email === $storedUser['email'] && $password === $storedUser['password']) {

            $_SESSION['is_logged_in'] = true;
            header("Location: dashboard.php");
            exit();

        } else {
            echo "Invalid email or password!";
        }

    } else {
        echo "No registered user found!";
    }
}
?>

<form method="post">
    <h3>Login</h3>
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>