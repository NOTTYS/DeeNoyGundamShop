<?php
include('Database/db.con.php');
include_once('functions.php');
$fetchdata = new DB_con();
@$userid = $_SESSION['customerid'];
$sql = $fetchdata->fetchonerecord($userid);
@$role1 = $_SESSION['role'];
@$role = $_GET['role'];
@$page = $_GET['page'];
include('dropdown.php');
include('admin_check.php');
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
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div style="position: absolute; margin: auto; width: 100%; padding: 10px;">
    <h1 style="text-align: center; color: white;">ADMIN</h1>
</div>

<div style="background-color: blue; border-bottom: 2px solid yellow;" class="">
    <div class="">
        <br>
        <br>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="admin.php"><img style="height: 100px; width: 100px;" src="Resources/images/02.png" class="img-fluid|thumbnail rounded-top|rounded-end|rounded-bottom|rounded-start|rounded-circle| zoom" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item mx-2">
                            <a href='admin.php' style="color: white;" type="button" class="btn btn-secondary nav-link" name="submit" id="submit">Home</a>
                        </li>
                        <li class="nav-item dropdown mx-2">
                            <a style="color: white" class="btn btn-secondary dropdown-toggle nav-link" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Product
                            </a>
                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                <a class="dropdown-item" href='product.php?page=sd'>SD</a>
                                <a class="dropdown-item" href='product.php?page=hg'>High Grade</a>
                                <a class="dropdown-item" href='product.php?page=mg'>Master Grade</a>
                                <a class="dropdown-item" href='product.php?page=rg'>Real Grade</a>
                                <a class="dropdown-item" href='product.php?page=pg'>Perfect Grade</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown mx-2">
                            <a style="color: white;" class="btn btn-secondary dropdown-toggle nav-link" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Manage & Report
                            </a>
                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                <a class="dropdown-item" href='User.php'>Manage User</a>
                                <a class="dropdown-item" href='insertProduct.php'>Manage Product</a>
                                <a class="dropdown-item" href='customer.php'>Customer</a>
                                <a class="dropdown-item" href='employee.php'>Employee</a>
                                <a class="dropdown-item" href='supplier.php'>Supplier</a>
                                <a class="dropdown-item" href='income.php' style="font-family: 'Noto Sans Lao', sans-serif;">ລາຍຮັບ</a>
                                <a class="dropdown-item" href='expenses.php' style="font-family: 'Noto Sans Lao', sans-serif;">ລາຍຈ່າຍ</a>
                            </div>
                        </li>
                        <li class="nav-item mx-2">
                        <a href="orderProduct.php" style="color: white;" class="btn btn-secondary nav-link">Order</a>
                        </li>
                        <li class="nav-item mx-2">
                        <a href="orderProductDetail.php" style="color: white;" class="btn btn-secondary nav-link">Order Detail</a>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        <?php
                        if (isset($_SESSION['login']) && $_SESSION['login'] == true) { ?>

                            <?php while ($row = mysqli_fetch_array($sql)) { ?>
                                <a href='orderPage.php?status=1' style="text-decoration: none;"><i style="color: black;text-decoration: none;" class="fa fa-lg fs-3"><i class="fa fa-bell"></i>
                                        <div id="notification" class="badge" style="font-size: 0.8rem;"></div>
                                    </i>
                                    <a href="profile.php?id=<?php echo $row['customer_id'] ?>" style="font-size: large; text-decoration: none;" class="px-3 border-right border-left text-light"><i class="fa fa-user" style="color: black; font-size: 25px;"></i> <?php echo $row['firstname'] . ' ';
                                                                                                                                                                                                                                                                    echo $row['lastname'] ?></a>
                                    <a href="logout.php" style="font-size: large; text-decoration: none;" class="px-3 border-right border-left text-light"><i class="fa fa-sign-out-alt" style="color: black; font-size: 25px;"></i> Logout</a>
                                <?php } ?>
                            <?php } else { ?>
                                <a href="login.php" style="float: right; margin-top: 30px; font-size: large; text-decoration: none;" class="px-3 border-right border-left text-light">Login</a>
                                <a href="register.php" style="float: right; margin-top: 30px; font-size: large; text-decoration: none;" class="px-3 border-right border-left text-light">Register</a>
                            <?php } ?>
                    </span>
                </div>
            </div>
        </nav>
        <!-- <span style="margin-left: 230px; position: static" class="pull-right">
            <a href="admin.php"><img style="margin-top: -10px ;margin-left: -230px; height: 200px; width: 200px; position: absolute" src="Resources/images/02.png" class="img-fluid|thumbnail rounded-top|rounded-end|rounded-bottom|rounded-start|rounded-circle| zoom" alt=""></a>
            <button onclick="location.href='admin.php'" style="margin-top: 80px; margin-right:16px ;position: static ; width: 100px; " type="button" class="btn btn-secondary" name="submit" id="submit">Home</button>
            <a style="margin-top: 80px; margin-right:16px ;left: 50px; " class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Shop
            </a>
            <div class="dropdown-menu" aria-labelledby="triggerId">
                <a class="dropdown-item" href='product.php?page=sd'>SD</a>
                <a class="dropdown-item" href='product.php?page=hg'>High Grade</a>
                <a class="dropdown-item" href='product.php?page=mg'>Master Grade</a>
                <a class="dropdown-item" href='product.php?page=rg'>Real Grade</a>
                <a class="dropdown-item" href='product.php?page=pg'>Perfect Grade</a>
            </div>
            <button style="margin-top: 80px; margin-right:16px ;left: 50px; " class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Manage & Report
            </button>
            <div class="dropdown-menu" aria-labelledby="triggerId">
            <a class="dropdown-item" href='User.php'>Manage User</a>
                <a class="dropdown-item" href='insertProduct.php'>Manage Product</a>
                <a class="dropdown-item" href='customer.php'>Customer</a>
                <a class="dropdown-item" href='employee.php'>Employee</a>
                <a class="dropdown-item" href='supplier.php'>Supplier</a>
                <a class="dropdown-item" href='income.php' style="font-family: 'Noto Sans Lao', sans-serif;">ລາຍຮັບ</a>
                <a class="dropdown-item" href='expenses.php' style="font-family: 'Noto Sans Lao', sans-serif;">ລາຍຈ່າຍ</a>
            </div>
            <a href="orderProduct.php" style="margin-top: 80px; margin-right:16px ; position: static ; width: 100px; " type="button" class="btn btn-secondary" name="submit" id="submit">Import</a>
            <a href="orderProductDetail.php" style="margin-top: 80px; margin-right:16px ; position: static ; width: 150px; " type="button" class="btn btn-secondary" name="submit" id="submit">Import history</a>
            
            
        </span> -->
        <script type="text/javascript">
                        function loadDoc() {
                            setInterval(function() {
                                const xhttp = new XMLHttpRequest();
                                xhttp.onload = function() {
                                    document.getElementById("notification").innerHTML = this.responseText;
                                }
                                xhttp.open("GET", "notification.php", true);
                                xhttp.send();
                            }, 1000);
                        }

                        loadDoc()
                    </script>
        <br>
    </div>
</div>
</div>