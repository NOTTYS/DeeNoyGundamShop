<?php
include_once('Database/db.con.php');
include_once('functions.php');
$fetchdata = new DB_con();
@$userid = $_SESSION['customerid'];
$sql = $fetchdata->fetchonerecord($userid);
include('dropdown.php');
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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Armata&display=swap" rel="stylesheet">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script rel="javascript" type="text/javascript" href="js/jquery-1.11.3.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao&display=swap" rel="stylesheet">

<style></style>
<div style="position: absolute; margin: auto; width: 100%; padding: 10px;">
    <h1 class="rainbow rainbow_text_animated" style="text-align: center; font-style: italic">DEENOY GUNDAM SHOP</h1>
</div>
<div style="background-color: pink; border-bottom: 2px solid yellow;" class="">
    <div class="">
        <br>
        <br>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img style="height: 100px; width: 100px;" src="Resources/images/02.png" class="img-fluid|thumbnail rounded-top|rounded-end|rounded-bottom|rounded-start|rounded-circle| zoom" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item mx-2">
                            <a href='index.php' style="color: white;" type="button" class="btn btn-secondary nav-link">Home</a>
                        </li>
                        <li class="nav-item dropdown mx-2">
                            <a style="color: white;" class="btn btn-secondary dropdown-toggle nav-link" type="a" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Product
                            </a>
                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                <a class="dropdown-item" href='product.php?page=sd&role=user'>SD</a>
                                <a class="dropdown-item" href='product.php?page=hg&role=user'>High Grade</a>
                                <a class="dropdown-item" href='product.php?page=mg&role=user'>Master Grade</a>
                                <a class="dropdown-item" href='product.php?page=rg&role=user'>Real Grade</a>
                                <a class="dropdown-item" href='product.php?page=pg&role=user'>Perfect Grade</a>
                            </div>
                        </li>
                       
                        <li class="nav-item mx-2">
                            <a href='purchaseHistory.php?id=<?php echo $userid ?>' style="color: white;" type="button" class="btn btn-secondary nav-link">Purchase History</a>
                        </li>
                        <li class="nav-item mx-2">
                        <a href='about.php' style="color: white;" type="a" class="btn btn-secondary nav-link">About</a>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        <?php
                        if (isset($_SESSION['login']) && $_SESSION['login'] == true) { ?>

                            <?php while ($row = mysqli_fetch_array($sql)) { ?>
                                <a href='cart.php' style="text-decoration: none;"><i style="color: black; text-decoration: none;" class="fa fa-lg fs-3">&#xf07a; <div id="cart_item" class="badge" style="font-size: 1rem;"></div> </i>
                                    <a href="profile.php?id=<?php echo $row['customer_id'] ?>" style="font-size: large; text-decoration: none;" class="px-3 border-right border-left text-light"><i class="fa fa-user" style="color: black; font-size: 25px;"></i> <?php echo $row['firstname'] . ' ';
                                                                                                                                                                                                                                                                    echo $row['lastname'] ?></a>
                                    <a href="logout.php" style="font-size: large; text-decoration: none;" class="px-3 border-right border-left text-light"><i class="fa fa-sign-out-alt" style="color: black; font-size: 25px;"></i> Logout</a>
                                <?php } ?>
                            <?php } else { ?>
                                <a href="login.php" style="font-size: large; text-decoration: none;" class="px-3 border-right border-left text-light">Login</a>
                                <a href="register.php" style="font-size: large; text-decoration: none;" class="px-3 border-right border-left text-light">Register</a>
                            <?php } ?>
                    </span>
                </div>
            </div>
        </nav>
        <!-- <span style="margin-left: 230px; position: static" class="pull-right">
            <a href="index.php"><img style="margin-top: -10px ;margin-left: -230px; height: 200px; width: 200px; position: absolute" src="Resources/images/02.png" class="img-fluid|thumbnail rounded-top|rounded-end|rounded-bottom|rounded-start|rounded-circle| zoom" alt=""></a>
            <a href='index.php' style="margin-top: 80px; margin-right:16px ;position: static ; width: 100px; " type="a" class="btn btn-secondary" name="submit" id="submit">Home</a>
            <a style="margin-top: 80px; margin-right:16px ;left: 50px; " class="btn btn-secondary dropdown-toggle" type="a" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Product
            </a>
            <div class="dropdown-menu" aria-labelledby="triggerId">
                <a class="dropdown-item" href='product.php?page=sd&role=user'>SD</a>
                <a class="dropdown-item" href='product.php?page=hg&role=user'>High Grade</a>
                <a class="dropdown-item" href='product.php?page=mg&role=user'>Master Grade</a>
                <a class="dropdown-item" href='product.php?page=rg&role=user'>Real Grade</a>
                <a class="dropdown-item" href='product.php?page=pg&role=user'>Perfect Grade</a>
            </div>
            <a href='purchaseHistory.php?id=<?php echo $userid ?>' style="margin-top: 80px; margin-right:16px ; position: static ; width: auto; " type="a" class="btn btn-secondary" name="submit" id="submit">Purchase History</a>
            <a href='about.php' style="margin-top: 80px; margin-right:16px ; position: static ; width: 100px; " type="a" class="btn btn-secondary" name="submit" id="submit">About</a>
            <?php
            if (isset($_SESSION['login']) && $_SESSION['login'] == true) { ?>
                <?php while ($row = mysqli_fetch_array($sql)) { ?>
                    <div style="float: right; margin-top: 2.5rem;">
                        <a href='cart.php' style="text-decoration: none;"><i style="color: black; margin-top: 0; text-decoration: none;" class="fa fa-lg fs-3">&#xf07a; <div id="cart_item" class="badge" style="font-size: 1rem;"></div> </i>
                            <a href="profile.php?id=<?php echo $row['customer_id'] ?>" style="font-size: large; text-decoration: none;" class="px-3 border-right border-left text-light"><i class="fa fa-user" style="color: black; font-size: 25px;"></i> <?php echo $row['firstname'] . ' ';
                                                                                                                                                                                                                                                            echo $row['lastname'] ?></a>
                            <a href="logout.php" style="font-size: large; text-decoration: none;" class="px-3 border-right border-left text-light"><i class="fa fa-sign-out-alt" style="color: black; font-size: 25px;"></i> Logout</a>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <a href="login.php" style="float: right; margin-top: 30px; font-size: large; text-decoration: none;" class="px-3 border-right border-left text-light">Login</a>
                <a href="register.php" style="float: right; margin-top: 30px; font-size: large; text-decoration: none;" class="px-3 border-right border-left text-light">Register</a>
            <?php } ?>
        </span> -->
        <br>
        <script type="text/javascript">
    function loadd() {
        $.get("cartItem.php?id=" + "<?php echo $userid ?>", function(data, status) {
            $("#cart_item").append(data)
        })
    }
    setTimeout(() => {
        loadd()
    }, 0)
    // $(document).ready(function() {
    //     var countItems;
    //     $("#cart-item").load("cartItem.php", {
    //         countItems: countItems,
    //     })
    // });
</script>
    </div>
</div>