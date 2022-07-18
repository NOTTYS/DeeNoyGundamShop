<?php
include("Database/db.con.php");
$order_id = $_POST['id'];
$answer = $_POST['answer'];
$update = "UPDATE tb_orderproduct SET status = '$answer' WHERE order_id = $order_id";
$perform = mysqli_query($conn, $update);
?>