<?php
session_start();

// Redirect if the user is not logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Initialize products array if not set
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [
        ["name" => "Laptop", "price" => 500],
        ["name" => "Phone", "price" => 300]
    ];
}

$user = $_SESSION['user'];
?>

<h2>Welcome, <?php echo htmlspecialchars($user['username']); ?></h2>
<a href="logout.php">Logout</a>

<h3>Available Products</h3>

<?php foreach ($_SESSION['products'] as $index => $product): ?>
    <form method="post">
        <?php echo htmlspecialchars($product['name']); ?> - $<?php echo $product['price']; ?>

        <?php if ($user['role'] == "customer"): ?>
            <input type="text" name="new_name" placeholder="New name">
            <input type="number" name="new_price" placeholder="New price">
            <button name="edit_product" value="<?php echo $index; ?>">Edit</button>
        <?php endif; ?>

        <?php if ($user['role'] == "admin"): ?>
            <button name="delete_product" value="<?php echo $index; ?>">Delete</button>
        <?php endif; ?>
    </form>
<?php endforeach; ?>

<?php
// Handle product editing
if (isset($_POST['edit_product'])) {
    $index = $_POST['edit_product'];
    $_SESSION['products'][$index]['name'] = $_POST['new_name'];
    $_SESSION['products'][$index]['price'] = $_POST['new_price'];
    header("Location: home.php");
    exit();
}

// Handle product deletion
if (isset($_POST['delete_product'])) {
    $index = $_POST['delete_product'];
    array_splice($_SESSION['products'], $index, 1);
    header("Location: home.php");
    exit();
}
?>

<?php if ($user['role'] == "admin"): ?>
    <br><a href="add_product.php">Add Product</a>
<?php endif; ?>