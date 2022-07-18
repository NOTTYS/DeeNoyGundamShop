<?php
    if ($_SESSION['role'] != 'supplier') {
        header("location: index.php");
    }
?>