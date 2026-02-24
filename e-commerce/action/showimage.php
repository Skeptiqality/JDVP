<?php 
include '../include/db_conn.php';

if (!isset($_GET['id'])) die("No ID specified.");

$id = intval($_GET['id']);

$sql = "SELECT product_image FROM products WHERE product_id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) die("No image found.");

$row = $result->fetch_assoc();

$finfo = finfo_open();
$type = finfo_buffer($finfo, $row['product_image'], FILEINFO_MIME_TYPE);
unset($finfo);

header("Content-Type: $type");
echo $row['product_image'];
?>