<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<?php session_start();
session_destroy();
?>
<link rel="icon" type="image/png, image/jpg, image/jpeg" href="Resources/images/02.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="Resources/css/style.css">

<body>
    <header>
        <?php include('header.php') ?>
    </header>

    <main>
        <br>
        <h2 style="text-align: center; font-size: 50px; font-weight: bold;">LOGIN</h2>
        <div class="mb-5">
        </div>
        <div class="container" style="padding-left: 400px; padding-right: 400px">
            <div style="margin-top: 50px;" class="div">
                <img style="height: 250px; display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;" src="Resources/images/logo.png" alt="">
                <br>
                <form action="auth.php" method="post" class="login-container">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input name="email" id="email" required type="email" placeholder="Email" class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input name="password" id="password" required type="password" placeholder="Password" class="form-control">
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary">Login</button>
                    <br>
                    <br>
                    <li><a style="text-decoration: none;" href="register.php">Register here</a></li>
                </form>
            </div>
        </div>
        <div class="mb-5">
        </div>
        <br>
        <?php  ?>
    </main>

    <footer>
        <?php include('footer.php') ?>
    </footer>
</body>

</html>