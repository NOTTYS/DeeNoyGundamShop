<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
session_start();
session_destroy();
?>
<link rel="icon" type="image/png, image/jpg, image/jpeg" href="Resources/images/02.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <header>
    <?php include('header.php'); ?>
    </header>

    <main>
        <br>
    <h2 style="text-align: center; font-size: 50px; font-weight: bold;" class="login-header">REGISTER</h2>
    <a href="login.php" style="float: right; padding-right: 30px; padding-top: 30px; font-size: 18px; color: white; text-decoration: none">Login</a>
<a href="register.php" style="float: right; padding-right: 30px; padding-top: 30px; font-size: 18px; color: white; text-decoration: none">Register</a>
<div class="mb-5">
</div>
<div class="container" style="padding-left: 400px; padding-right: 400px">
<img style="height: 250px; display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;" src="Resources/images/logo.png" alt="">
  <br>
    <div class="login">
        <div class="login-triangle">
        </div>

        <form action="adduser.php" method="post" class="login-container">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">First name</label>
                <input name="firstname" id="text" required type="text" placeholder="First name" class="form-control" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Last name</label>
                <input name="lastname" id="lastname" required type="text" placeholder="Last name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Phone number</label>
                <input name="phone_number" id="phone_number" required type="number" placeholder="Phone number" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Email</label>
                <input name="email" id="email" required type="email" placeholder="Email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" id="password" required type="password" placeholder="Password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Re-password</label>
                <input name="re-password" id="re-password" required type="password" placeholder="Re-password" class="form-control" required>
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Register</button>
            <br>
            <br>
            <li><a style="text-decoration: none;" href="login.php">You already have an account?</a></li>

        </form>
    </div>

    <!-- <form action="adduser.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Password</label>
        <input type="password" name="ppassword" required>
        <br>
        <label for="username">Re-Password</label>
        <input type="password" name="re-password" required>
        <br>
        <input type="submit" name="submit" value="Register">
</form> -->
</div>
<div class="mb-5">
</div>
<br>
    </main>

    <footer>
    <?php include('footer.php'); ?>
    </footer>
</body>
</html>