       <!DOCTYPE html>
       <html lang="en">
       <?php session_start();
        if (@$_SESSION['role'] == 'supplier') {
          header('location: supplyer.php');
        }

        if (@$_SESSION['role'] == 'admin') {
          header('location: admin.php');
        }
        ?>

       <head>
         <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>DeeNoy Gundam Shop</title>

         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
         <link rel="stylesheet" href="Resources/css/rainbow.css">
         <link rel="stylesheet" href="Resources/css/slider.css">
         <link rel="stylesheet" href="Resources/css/gundamFont.css">
         <link rel="stylesheet" href="Resources/css/footer.css">
         <link rel="icon" type="image/png, image/jpg, image/jpeg" href="Resources/images/02.png">
         <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

       </head>
       <style>

       </style>

       <body>
         <header id="header">
           <?php
            include('header.php'); ?>
         </header>

         <main id="main">

           <?php include('slider.php');
            ?>

         </main>
         <div class="mt-5"></div>
         <footer id="footer" class="text-center text-lg-start bg-light text-muted footer">
           <?php include('footer.php'); ?>
         </footer>
       </body>

       </html>