<?php
session_start();
include('Database/db.con.php');
include('functions.php');
$InsertToCart = new DB_con();
$updateToCart = new DB_con();
$user_id = $_SESSION['customerid'];
$product_id = $_POST['id'];
$amount = $_POST['amount'];
echo $user_id;
echo $product_id;
echo $amount;
$sql = "SELECT * FROM tb_product WHERE product_id = $product_id";
$query = mysqli_query($conn, $sql);
foreach ($query as $row) {
    $image = $row['image'];
    $name = $row['name'];
    $protype = $row['protype_id'];
    $price = $row['price'];
    $datetime = date("Y-m-d H:i:s");
}


$sql2 = "SELECT * FROM tb_cart WHERE user_id = $user_id AND product_id = $product_id AND product_name = '$name'";
$result = mysqli_query($conn, $sql2);
$cart = mysqli_fetch_assoc($result);

if ($name === @$cart['product_name'] && $product_id == @$cart['product_id']) {
    $sql2 = $updateToCart->updateToCart($user_id, $product_id, $image, $name, $protype, $amount, $price, $datetime);
} else {
    $sql3 = $InsertToCart->addToCart($user_id, $product_id, $image, $name, $protype, $amount, $price, $datetime);
}
