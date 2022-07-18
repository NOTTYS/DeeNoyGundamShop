<?php
session_start();
include('Database/db.con.php');
include('functions.php');
$user_id = $_GET['id'];

 $sql4 = "SELECT * FROM tb_cart WHERE user_id = $user_id";
 $query2 = mysqli_query($conn, $sql4);
 $rows = mysqli_num_rows($query2);
 if ($rows > 0) {
    echo $rows;
}
?>