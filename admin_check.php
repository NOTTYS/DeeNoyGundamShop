<?php
    if ($_SESSION['role'] != 'admin') {
        header("location: index.php");
    }
?>