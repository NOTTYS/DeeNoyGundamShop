<?php
include_once('Database/db.con.php');
include_once('functions.php');
$fetchdata = new DB_con();
@$userid = $_SESSION['customerid'];
$sql = $fetchdata->fetchonerecord($userid);
?>
<style>
    .badge {
        content: attr(value);
        font-size: 10px;
        background-color: red;
        background-size: 1px;
        border-radius: 50%;
        padding: 0 5px;
        position: relative;
        left: -8px;
        top: -10px;
        opacity: 1;
    }
</style>
<link rel="icon" type="image/png, image/jpg, image/jpeg" href="Resources/images/02.png">
<link rel="stylesheet" href="Resources/css/bootstrap.min.css">
<link rel="stylesheet" href="Resources/css/gundamFont.css">
<link rel="stylesheet" href="Resources/css/rainbow.css">
<link rel="stylesheet" href="Resources/css/style.css">
<link rel="stylesheet" href="Resources/css/zoom.css">
<link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Armata&display=swap" rel="stylesheet">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script rel="javascript" type="text/javascript" href="js/jquery-1.11.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao&display=swap" rel="stylesheet">
<script>
    // function loadDoc() {
    //     setInterval(function() {
    //         const xhttp = new XMLHttpRequest();
    //         xhttp.onload = function() {
    //             document.getElementById("mail").innerHTML = this.responseText;
    //         }
    //         xhttp.open("GET", "mail.php", true);
    //         xhttp.send();
    //     }, 1000);
    // }
    // loadDoc()
</script>
<div style="position: absolute; margin: auto; width: 100%; padding: 10px;">
    <h1 class="rainbow rainbow_text_animated" style="text-align: center; font-style: italic">DEENOY GUNDAM SHOP</h1>
</div>
<div style="background-color: orange; border-bottom: 2px solid yellow; padding-bottom: 30px; " class="">
    <div class="">
        <br>
        <span style="margin-left: 230px; position: static" class="pull-right">
            <a href="index.php"><img style="margin-top: -10px ;margin-left: -230px; height: 200px; width: 200px; position: absolute" src="Resources/images/02.png" class="img-fluid|thumbnail rounded-top|rounded-end|rounded-bottom|rounded-start|rounded-circle| zoom" alt=""></a>
            <a href='index.php' style="margin-top: 80px; margin-right:16px ;position: static ; width: 100px; " type="a" class="btn btn-secondary" name="submit" id="submit">Home</a>
            <a href='Export.php' style="margin-top: 80px; margin-right:16px ; position: static ; width: auto; " type="a" class="btn btn-secondary" name="submit" id="submit">Export History</a>
            <a href='' style="margin-top: 80px; margin-right:16px ; position: static ; width: 100px; " type="a" class="btn btn-secondary" name="submit" id="submit">Contact</a>
            <?php
            if (isset($_SESSION['login']) && $_SESSION['login'] == true) { ?>
                <?php while ($row = mysqli_fetch_array($sql)) { ?>
                    <div style="float: right; margin-top: 2.5rem;">
                        <a href='export.php' style="text-decoration: none;"><i style="color: black; margin-top: 0; text-decoration: none; margin-right: 0.5rem;" class="fa fa-lg fs-3"><i class="fa fa-envelope" aria-hidden="true"></i>
                                <div id="mail" class="badge" style="font-size: 1rem;"></div></a>
                        </i>
                        <a href="profile.php?id=<?php echo $row['customer_id'] ?>" style="font-size: large; text-decoration: none;" class="px-3 border-right border-left text-light"><i class="fa fa-user" style="color: black; font-size: 25px;"></i> <?php echo $row['firstname'] . ' ';
                                                                                                                                                                                                                                                        echo $row['lastname'] ?></a>
                        <a href="logout.php" style="font-size: large; text-decoration: none;" class="px-3 border-right border-left text-light"><i class="fa fa-sign-out-alt" style="color: black; font-size: 25px;"></i> Logout</a>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <a href="login.php" style="float: right; margin-top: 30px; font-size: large; text-decoration: none;" class="px-3 border-right border-left text-light">Login</a>
                <a href="register.php" style="float: right; margin-top: 30px; font-size: large; text-decoration: none;" class="px-3 border-right border-left text-light">Register</a>
            <?php } ?>
        </span>
        <br>

    </div>
</div>