<?php
session_start();
include('Database/db.con.php');
 $sql4 = "SELECT * FROM tb_orderproduct WHERE adminRead = 1";
 $query2 = mysqli_query($conn, $sql4);
 $rows = mysqli_num_rows($query2);
 if ($rows > 0) {
      echo $rows;
 }

 $conn->close();
