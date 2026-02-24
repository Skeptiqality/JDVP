<?php
include '../include/db_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $total_order = $_POST['order_quantity'];
    $total_price = $_POST['order_totalPrice'];
    $customer_name = $_POST['customer_name'];
    $customer_address = $_POST['customer_address'];
    $customer_mobile = $_POST['customer_mobile'];
    $customer_email = $_POST['customer_email'];

    $sql_stock = "SELECT stocks FROM products WHERE product_id='$product_id'";
    $result_stocks = mysqli_query($conn, $sql_stock);
    $row_stock = mysqli_fetch_assoc($result_stocks);
    $current_stock = $row_stock['stocks'];

    if ($total_order > $current_stock) {
        echo "<script>
                alert('Order exceeds available stock! Only {$current_stock} left.');
                window.location.href='home-page.php';
              </script>";
    }

    else {
        $sql_insert = "INSERT INTO orders (product_id, product_name, price, order_quantity, order_totalPrice, customer_name, customer_address, customer_mobile, customer_email)
                       VALUES ('$product_id', '$product_name', '$price', '$total_order', '$total_price', '$customer_name', '$customer_address', '$customer_mobile', '$customer_email')";
        if (mysqli_query($conn, $sql_insert)) {
            $new_stock = $current_stock - $total_order;
            $sql_update = "UPDATE products SET stocks='$new_stock' WHERE product_id='$product_id'";
            mysqli_query($conn, $sql_update);

            echo "<script>
                    alert('Order placed successfully!');
                    window.location.href='home-page.php';
                  </script>";
        }

        else {
            $message = "Error: " . mysqli_error($conn);
        }
    }
}


?>