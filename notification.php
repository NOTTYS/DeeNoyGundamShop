<?php
session_start();
include('Database/db.con.php');
include('functions.php');

 $sql4 = "SELECT * FROM tb_order WHERE readStatus = 0";
 $query2 = mysqli_query($conn, $sql4);
 $rows = mysqli_num_rows($query2);
 if ($rows > 0) {
      echo $rows;
 }
 
 $conn->close();
?>