<?php
include_once('Database/db.con.php');
include_once('functions.php');
@$id = $_GET['id'];
@$user_id = $_GET['user_id'];
$sql = "DELETE FROM tb_order WHERE order_id = $id";
        $sql_run = mysqli_query($conn ,$sql);
        if ($sql_run) {
            echo "<script>alert('ລົບໃບບິນສຳເລັດ')
            javascript:history.back()</script>";
        }
?>