<?php
session_start();
include('Database/db.con.php');
include('functions.php');
$order_id = $_GET['id'];
$sql = "UPDATE tb_order SET readStatus = 1 WHERE order_id = $order_id";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
?>

