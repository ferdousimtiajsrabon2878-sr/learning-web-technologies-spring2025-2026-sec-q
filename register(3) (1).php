<?php
session_start();

// Initialize user array if not set already
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [
        ["username" => "admin", "password" => "1234", "role" => "admin"]
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $newUser = [
        "username" => $_POST['username'],
        "password" => $_POST['password'],
        "role" => "customer"
    ];

    $_SESSION['users'][] = $newUser;

    echo "Registration successful! <a href='login.php'>Login</a>";
}
?>

<form method="post">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Register</button>
</form>