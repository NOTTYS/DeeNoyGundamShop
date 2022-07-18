<!doctype html>
<html lang="en">

<head>
  <?php
  session_start();
include_once('Database/db.con.php');
include_once('functions.php');
$fetchdata = new DB_con();
@$userid = $_SESSION['customerid'];
$sql = $fetchdata->fetchonerecord($userid);
  ?> 
  <?php
  include('supplier_check.php');
  ?>
  <title>DeeNoy Gundam Shop</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.0.2 -->
  <link rel="icon" type="image/png, image/jpg, image/jpeg" href="Resources/images/02.png">
<link rel="stylesheet" href="Resources/css/gundamFont.css">
<link rel="stylesheet" href="Resources/css/rainbow.css">
<link rel="stylesheet" href="Resources/css/zoom.css">
<link rel="stylesheet" href="Resources/css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Armata&display=swap" rel="stylesheet">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>

<body>
  <header>
 <?php include('headerForSupplier.php') ?>
  </header>
  
  <main>
    <br>
    <h1 class="text-center fw-bold text-uppercase">WELCOME <?php echo $_SESSION['firstname'].' '. $_SESSION['lastname'] ?></h1>
  <?php include('slider.php'); ?>        
  </main>
  <br>
  <br>
  <!-- Bootstrap JavaScript Libraries -->
<footer style="position:absolute; bottom:0; width:100%; height:60px;" class="text-center text-lg-start bg-light text-muted footer">
   <?php include('footer.php') ?>
</footer>
</body>
</html>
  <script src="Resources/js/slider.js"></script>