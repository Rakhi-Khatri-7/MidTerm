<?php

include 'db.php';

if(isset($_POST['add_product'])){
    $name = $_POST['product_name'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $supplier = $_POST['supplier'];

    $sql = "INSERT INTO products (product_name, category, quantity, price, supplier) 
            VALUES ('$name', '$category', '$quantity', '$price', '$supplier')";

    if($conn->query($sql) === TRUE){
        echo "Product added successfully! <a href='view_products.php'>View Products</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Add Product </h2>
<form method="POST">
    Product Name: <input type="text" name="product_name" required><br><br>
    Open access: <input type="radio" name="open access" required><br><br>
    Category: <input type="text" name="category" required><br><br>
    Quantity: <input type="number" name="quantity" required><br><br>
    Price: <input type="number" step="0.01" name="price" required><br><br>
    Supplier: <input type="text" name="supplier" required><br><br>
    <button type="submit" name="add_product">Add Product</button>
</form>
    <p><a href="index.php" style="color : aqua;">Back to Dashboard</a></p>

</body>
</html>
