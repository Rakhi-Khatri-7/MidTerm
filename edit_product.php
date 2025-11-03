<?php

include 'db.php';

if(!isset($_GET['id'])){
    header("Location: view_products.php");
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id=$id";
$result = $conn->query($sql);
if($result->num_rows == 0){
    echo "Product not found!";
    exit();
}
$product = $result->fetch_assoc();

if(isset($_POST['update_product'])){
    $name = $_POST['product_name'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $supplier = $_POST['supplier'];

    $sql = "UPDATE products SET product_name='$name', category='$category', quantity='$quantity', price='$price', supplier='$supplier' WHERE id=$id";

    if($conn->query($sql) === TRUE){
        echo "Product updated successfully! <a href='view_products.php'>View Products</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Edit Product</h2>
<form method="POST">
    Product Name: <input type="text" name="product_name" value="<?php echo $product['product_name']; ?>" required><br><br>
    Category: <input type="text" name="category" value="<?php echo $product['category']; ?>" required><br><br>
    Quantity: <input type="number" name="quantity" value="<?php echo $product['quantity']; ?>" required><br><br>
    Price: <input type="number" step="0.01" name="price" value="<?php echo $product['price']; ?>" required><br><br>
    Supplier: <input type="text" name="supplier" value="<?php echo $product['supplier']; ?>" required><br><br>
    <button type="submit" name="update_product">Update Product</button>
</form>
<p><a href="view_products.php">Back to Products</a></p>
</body>
</html>
