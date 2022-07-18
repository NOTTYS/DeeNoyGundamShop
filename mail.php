<?php
session_start();
include('Database/db.con.php');
 $sql4 = "SELECT * FROM tb_orderproduct WHERE readStatus = 0";
 $query2 = mysqli_query($conn, $sql4);
 $rows = mysqli_num_rows($query2);
 if ($rows > 0) {
      echo $rows;
 }

// if ($role == "admin") {
//     $sql4 = "SELECT * FROM tb_orderproduct WHERE status = 1 or status = 2";
//  $query2 = mysqli_query($conn, $sql4);
//  $rows = mysqli_num_rows($query2);
//  if ($rows > 0) {
//       echo $rows;
//  }
//  }
 $conn->close();
?>