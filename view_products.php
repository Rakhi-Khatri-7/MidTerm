<?php

include 'db.php';


if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $conn->query("DELETE FROM products WHERE id=$id");
    header("Location: view_products.php");
    exit();
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Products</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


<h2>Products</h2>
<br>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Supplier</th>
        <th>Actions</th>
    </tr>
    <?php
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['product_name']}</td>
                    <td>{$row['category']}</td>
                    <td>{$row['quantity']}</td>
                    <td>{$row['price']}</td>
                    <td>{$row['supplier']}</td>
                    <td>
                        <a href='edit_product.php?id={$row['id']}'>Edit</a> |
                        <a href='view_products.php?delete_id={$row['id']}' onclick=\"return confirm('Are you sure?')\">Delete</a>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No products found</td></tr>";
    }
    ?>
</table>

<p><a href="add_product.php" style="color : aqua;">Add New Product</a> | <a href="index.php" style="color : aqua;"> Dashboard </a></p>
</body>
</html>
