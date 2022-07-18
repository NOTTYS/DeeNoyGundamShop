<!doctype html>
<html lang="en">

<head>

 <?php
        include('main.php');
        ?>
    <title>DeeNoyGundamShop</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Resources/css/rainbow.css">
    <link rel="stylesheet" href="Resources/css/slider.css">
    <link rel="icon" type="image/png, image/jpg, image/jpeg" href="Resources/images/02.png">
    <style>


    </style>
</head>

<body>
<header>
    <div style="position: absolute; margin: auto; width: 100%; padding: 10px;">
        <h1 class="rainbow rainbow_text_animated" style="text-align: center; font-style: italic">DEENOY GUNDAM SHOP</h1>
    </div>
    <div style="background-color: pink; border-bottom: 2px solid yellow; padding-bottom: 30px; " class="">
        <div class="">
            <br>
            <span style="margin-left: 230px; position: static" class="pull-right">
                <a href="index.php"><img style="margin-top: -10px ;margin-left: -230px; height: 200px; width: 200px; position: absolute" src="Resources/images/02.png" class="img-fluid|thumbnail rounded-top|rounded-end|rounded-bottom|rounded-start|rounded-circle|" alt=""></a>
                <button onclick="location.href='index.php'" style="margin-top: 80px; margin-right:16px ;position: static ; width: 100px; font-family: monospace" type="button" class="btn btn-secondary" name="submit" id="submit">Home</button>
                <button style="margin-top: 80px; margin-right:16px ;left: 50px; font-family: monospace" class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Product
                </button>
                <div class="dropdown-menu" aria-labelledby="triggerId">
                    <a class="dropdown-item" href='product.php?page=sd&role=user'>SD</a>
                    <a class="dropdown-item" href='login.php?page=hg&role=user'>High Grade</a>
                    <a class="dropdown-item" href='product.php?page=rg&role=user'>Real Grade</a>
                    <a class="dropdown-item" href='product.php?page=pg&role=user'>Perfect Grade</a>
                </div>
                <button onclick="location.href=''" style="margin-top: 80px; margin-right:16px ; position: static ; width: auto; font-family: monospace" type="button" class="btn btn-secondary" name="submit" id="submit">Purchase History</button>
                <button onclick="location.href=''" style="margin-top: 80px; margin-right:16px ; position: static ; width: 100px; font-family: monospace" type="button" class="btn btn-secondary" name="submit" id="submit">Contact</button>
  
            
            </span>
            <br>
            
        </div>
    </div>
   
</header>

  <main>

  </main>

  <footer style="height: 100px; 
    width:100%;
    position: absolute;
    left: 0;
    bottom: 0;" id="footer" class="text-center text-lg-start bg-light text-muted">
  <!-- Section: Social media -->
  <section
    class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
  >
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="https://www.facebook.com/DeenoyGundamshop" target="_blank" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>DeeNoy Gundam Shop
          </h6>
          <p>
           
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="product.php?page=sd&user=user" class="text-reset">Gundam SD</a>
          </p>
          <p>
            <a href="product.php?page=hg&user=user" class="text-reset">Gundam High Grade</a>
          </p>
          <p>
            <a href="product.php?page=rg&user=user" class="text-reset">Gundam Real Grade</a>
          </p>
          <p>
            <a href="product.php?page=pg&user=user" class="text-reset">Gundam Perfect Grade</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="login.php" class="text-reset">Login</a>
          </p>
          <p>
            <a href="register.php" class="text-reset">Register</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Contact
          </h6>
          <p><i class="fas fa-home me-3"></i> Vientiane, Saphangmor, Lao PDR</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            Ezioastore30@gmail.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 856 20 780 162 40</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
  <p style="display: inline-block;">©</p>  <p style="display: inline-block;" id="year"></p> <p style="display: inline-block;">Copyright:</p>
    <a class="text-reset fw-bold" href="https://deenoygundam.com/">DeeNoyGundam.com</a>
  </div>
  <!-- Copyright -->
</footer>
</body>

<script src="js/jquery-3.3.1.slim.min.js" type="text/javascript"></script>
<script src="js/popper.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</html>


