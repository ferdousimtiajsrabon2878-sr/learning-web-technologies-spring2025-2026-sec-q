<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($name && $email && $password) {

        $_SESSION['user_data'] = [
            "name" => $name,
            "email" => $email,
            "password" => $password
        ];

        echo "Registration successful! <a href='login.php'>Go to Login</a>";
        exit();
    } else {
        echo "All fields are required!";
    }
}
?>

<form method="post">
    <h3>Register</h3>
    Name: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Sign Up</button>
</form>