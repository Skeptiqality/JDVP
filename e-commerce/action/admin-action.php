<?php
include '../include/db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $stocks = $_POST['stocks'];

    if (!isset($_FILES['product_image']) || $_FILES['product_image']['error'] !== 0) {
        die("Error");
    }

    if (isset($_POST['register'])) {
        $product_image = file_get_contents($_FILES['product_image']['tmp_name']);
    
        $sql = "INSERT INTO products (product_id, product_name, product_image, price, stocks)
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issdi", $product_id, $product_name, $product_image, $price, $stocks);
    
        if ($stmt->execute()) {
            echo "<script>
                    alert('Product registered successfully!');
                    window.location.href='admin.php';
                  </script>";
        } else {
            echo "Error" . $stmt->error; 
        }
    
        $stmt->close();
        $conn->close();
    }

    

    // if (isset($_POST['update'])) {
    // $sql = "UPDATE products
    //     SET product_image='$product_image', product_name='$product_name', price='$price', stocks='$stocks'
    //     WHERE product_id='$product_id'";

    //     if ($conn->query($sql) === TRUE) {
    //         echo "<script> alert('Product record updated successfully!'); window.location.href='admin.php'; </script>";
    //         exit();
    //     }
    // }
}