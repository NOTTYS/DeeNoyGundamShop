    <!doctype html>
    <html lang="en">
    <?php
    session_start();
    ob_start();
    include('Database/db.con.php');
    include_once('functions.php');
    $fetchdata = new DB_con();
    if (!isset($_SESSION['customerid'])) {
        $login = 0;
    } else {
        $login = 1;
    }
    @$userid = $_SESSION['customerid'];
    $sql = $fetchdata->fetchonerecord($userid);
    @$role1 = $_SESSION['role'];
    @$role = $_GET['role'];
    @$page = $_GET['page'];
    ?>

    <head>

        <title>Product</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS v5.0.2 -->
        <link rel="stylesheet" href="Resources/css/rainbow.css">
        <link rel="stylesheet" href="Resources/css/slider.css">
        <link rel="stylesheet" href="Resources/css/zoom.css">
        <link rel="stylesheet" href="Resources/css/gundamFont.css">
        <link rel="stylesheet" href="Resources/css/product.css">
        <link rel="stylesheet" href="Resources/css/flyToCart.css">
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script> -->
        <link rel="icon" type="image/png, image/jpg, image/jpeg" href="Resources/images/02.png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Armata&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    </head>

    <body>
        <header>
            <?php
            if (@$role1 == 'admin') {
                include('headerForAdmin.php');
            } else {
                include('header.php');
            }

            if (@$role1 == 'supplier') {
                header("location: supplyer.php");
            }
            ?>
        </header>
        <main id="main">
            <style>
                label {
                    font-size: 1.2rem;
                }
            </style>
            <script>
                var login = "<?php echo $login ?>"

                function loaddd() {
                    $.get("cartItem.php?id=" + "<?php echo $userid ?>", function(data, status) {
                        $("#cart_item").html(data)
                    })
                }

                function addToCart(id, amount) {

                    if (login == 0) {
                        alert('ກະລຸນາ Login ກ່ອນ')
                        window.location = "login.php";
                    } else {
                        $.post("addToCart.php", {
                            id: id,
                            amount
                        }, function(data, status) {
                            loaddd();
                        });
                    }
                };

                function addToCart2(id, amount) {
                    if (login == 0) {
                        alert('ກະລຸນາ Login ກ່ອນ')
                        window.location = "login.php";
                    } else {
                        $.post("addToCart.php", {
                            id: id,
                            amount
                        }, function(data, status) {
                            loaddd();
                        });
                    }
                };

                function addToCart3(id, amount) {
                    if (login == 0) {
                        alert('ກະລຸນາ Login ກ່ອນ')
                        window.location = "login.php";
                    } else {
                        $.post("addToCart.php", {
                            id: id,
                            amount
                        }, function(data, status) {
                            loaddd();
                        });
                    }
                };

                function addToCart4(id, amount) {
                    if (login == 0) {
                        alert('ກະລຸນາ Login ກ່ອນ')
                        window.location = "login.php";
                    } else {
                        $.post("addToCart.php", {
                            id: id,
                            amount
                        }, function(data, status) {
                            loaddd();
                        });
                    }
                };

                function addToCart5(id, amount) {
                    if (login == 0) {
                        alert('ກະລຸນາ Login ກ່ອນ')
                        window.location = "login.php";
                    } else {
                        $.post("addToCart.php", {
                            id: id,
                            amount
                        }, function(data, status) {
                            loaddd();
                        });
                    }
                };
            </script>
            <?php
            if ($page == 'sd' && $role = 'user') { ?>
                <h1 style="text-align: center;"> Gundam SD</h1>
                <br>
                <div class="center">
                    <form action="" method="POST">
                        <div class="form-group row">
                            <div class="col-xs-4">
                                <label for="">ຄົ້ນຫາສິນຄ້າ</label>
                                <input id="product_name" style="border-radius: 5px; width: 20rem; padding: 0.2rem;" type="text" name="product_name" value="<?php if (isset($_POST['product_name'])) {
                                                                                                                                                                echo $_POST['product_name'];
                                                                                                                                                            } ?>">

                                <input class="btn btn-info mx-2 gx-2" type="submit" name="search" value="Search">
                                <button onclick="cleartext()" class="btn btn-info mx-2 gx-2" name="refresh" value="Refresh">Refresh</button>
                            </div>
                        </div>
                        <script>
                            function cleartext() {
                                document.getElementById("product_name").value = "";
                            }
                        </script>
                    </form>
                    <hr>
                    <?php
                    if (isset($_POST['search'])) {
                        $product_name = $_POST['product_name'];
                        $sql_command = "SELECT * FROM tb_product WHERE name LIKE '%$product_name%'";
                        $sql_run = mysqli_query($conn, $sql_command);
                        $count = mysqli_num_rows($sql_run);
                        if ($count > 0) { ?>
                            <div class="row">
                                <?php
                                foreach ($sql_run as $row) { ?>

                                    <div class="col-md-3 my-2 position-static">
                                        <div class="card" style="width: 17rem;">
                                            <a href="productDetail.php?id=<?php echo $row['product_id'] ?>">
                                                <img src="upload/<?php echo $row['image'] ?>" style="height:320px; object-fit: fill;" class="card-img-top zoom" alt="<?php echo $row['image'] ?>">
                                            </a>
                                            <div class="card-body">
                                                <h5 class="card-title" style="height: 5rem;"><?php echo $row['name'] ?></h5>
                                                <h6 class="card-subtitle mb-2">Type: <?php if ($row['protype_id'] == 1) {
                                                                                            echo 'SD';
                                                                                        } else if ($row['protype_id'] == 2) {
                                                                                            echo 'HG';
                                                                                        } else if ($row['protype_id'] == 3) {
                                                                                            echo 'MG';
                                                                                        } else if ($row['protype_id'] == 4) {
                                                                                            echo 'RG';
                                                                                        } else if ($row['protype_id'] == 5) {
                                                                                            echo 'PG';
                                                                                        }
                                                                                        ?></h6>
                                                <h6 class="card-subtitle mb-2">Amount: <?php echo $row['amount'] ?></h6>
                                                <div class="float-start">
                                                    <h5 class="card-text text-start d-inline">Price: <h5 class="d-inline text-success"><?php echo number_format($row['price']) ?> Kip</h5>
                                                    </h5>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="d-grid gap-2 mx-auto">
                                                    <?php
                                                    if ($row['amount'] == 0) {

                                                    ?>
                                                        <a id="" style="float: right; font-size: 14px;" class="btn btn-secondary mt-3"><?php $row['product_id'] ?>Out of Stocks</a>
                                                        <?php } else {
                                                        if (@$_SESSION['role'] != 'admin') {
                                                        ?>
                                                            <a id="product_<?php echo $row['product_id'] ?>" href='productDetail.php?id=<?php echo $row['product_id'] ?>' style="font-size: 14px;" class="btn btn-info zoom"><?php $row['product_id'] ?><i class="fas fa-link"></i>View Detail</a>
                                                            <a id="product_<?php echo $row['product_id'] ?>" onclick="addToCart3(<?php echo $row['product_id'] ?>, 1)" style="font-size: 14px;" class="btn btn-danger zoom"><?php $row['product_id'] ?><i class="fas fa-shopping-cart"></i>Add to Cart</a>
                                                        <?php } else { ?>
                                                            <a href="productDetail.php?id=<?php echo $row['product_id'] ?>" style="font-size: 14px;" class="btn btn-info zoom"><?php $row['product_id'] ?><i class="fas fa-link"></i>View Detail</a>
                                                    <?php
                                                        }
                                                    } ?>
                                                    <!-- <a href="#" class="btn btn-warning rounded-3 zoom"><i class="fas fa-link"></i> ເບິ່ງລາຍລະອຽດ</a>
                                                    <a href="#" class="btn btn-danger rounded-3 zoom"><i class="fab fa-github"></i> ສັ່ງຊື້</a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php } ?>
                            </div>
                        <?php
                        } else {
                            echo "<h3 class='text-center'>ບໍ່ພົບສິນຄ້າ</h3>";
                        }
                    } else {
                        $sql_command = "SELECT * FROM tb_product WHERE protype_id = 1";
                        $sql_run = mysqli_query($conn, $sql_command);
                        $count = mysqli_num_rows($sql_run); ?>
                        <style>
                            .grid {
                                display: grid;
                                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                                grid-gap: 10px;
                            }
                        </style>
                        <div class="row">
                            <?php
                            foreach ($sql_run as $row) { ?>

                                <div class="col-md-3 my-2 position-static">
                                    <div class="card" style="width: 17rem;">
                                        <a href="productDetail.php?id=<?php echo $row['product_id'] ?>">
                                            <img src="upload/<?php echo $row['image'] ?>" style="height: 320px; object-fit: fill;" class="card-img-top zoom" alt="<?php echo $row['image'] ?>">
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title" style="height: 5rem;"><?php echo $row['name'] ?></h5>
                                            <h6 class="card-subtitle mb-2">Type: <?php if ($row['protype_id'] == 1) {
                                                                                        echo 'SD';
                                                                                    } else if ($row['protype_id'] == 2) {
                                                                                        echo 'HG';
                                                                                    } else if ($row['protype_id'] == 3) {
                                                                                        echo 'MG';
                                                                                    } else if ($row['protype_id'] == 4) {
                                                                                        echo 'RG';
                                                                                    } else if ($row['protype_id'] == 5) {
                                                                                        echo 'PG';
                                                                                    }
                                                                                    ?></h6>
                                            <h6 class="card-subtitle mb-2">Amount: <?php echo $row['amount'] ?></h6>
                                            <div class="float-start">
                                                <h5 class="card-text text-start d-inline">Price: <h5 class="d-inline text-success"><?php echo number_format($row['price']) ?> Kip</h5>
                                                </h5>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="d-grid gap-2 mx-auto">
                                                <?php
                                                if ($row['amount'] == 0) {

                                                ?>
                                                    <a id="" style="float: right; font-size: 14px;" class="btn btn-secondary mt-3"><?php $row['product_id'] ?>Out of Stocks</a>
                                                    <?php } else {
                                                    if (@$_SESSION['role'] != 'admin') {
                                                    ?>
                                                        <a id="product_<?php echo $row['product_id'] ?>" href='productDetail.php?id=<?php echo $row['product_id'] ?>' style="font-size: 14px;" class="btn btn-info zoom"><?php $row['product_id'] ?><i class="fas fa-link"></i>View Detail</a>
                                                        <a id="product_<?php echo $row['product_id'] ?>" onclick="addToCart3(<?php echo $row['product_id'] ?>, 1)" style="font-size: 14px;" class="btn btn-danger zoom"><?php $row['product_id'] ?><i class="fas fa-shopping-cart"></i>Add to Cart</a>
                                                    <?php } else { ?>
                                                        <a href="productDetail.php?id=<?php echo $row['product_id'] ?>" style="font-size: 14px;" class="btn btn-info zoom"><?php $row['product_id'] ?><i class="fas fa-link"></i>View Detail</a>
                                                <?php
                                                    }
                                                } ?>
                                                <!-- <a href="#" class="btn btn-warning rounded-3 zoom"><i class="fas fa-link"></i> ເບິ່ງລາຍລະອຽດ</a>
                                                    <a href="#" class="btn btn-danger rounded-3 zoom"><i class="fab fa-github"></i> ສັ່ງຊື້</a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        <?php }
                        } ?>
                        </div>
                </div>
                <br>
            <?php  } else if ($page == 'hg') { ?>
                <h1 style="text-align: center;"> Gundam HG</h1>
                <br>
                <div class="center">
                    <form action="" method="POST">
                        <div class="form-group row">
                            <div class="col-xs-4">
                                <label for="">ຄົ້ນຫາສິນຄ້າ</label>
                                <input id="product_name" style="border-radius: 5px; width: 20rem; padding: 0.2rem;" type="text" name="product_name" value="<?php if (isset($_POST['product_name'])) {
                                                                                                                                                                echo $_POST['product_name'];
                                                                                                                                                            } ?>">

                                <input class="btn btn-info mx-2 gx-2" type="submit" name="search" value="Search">
                                <button onclick="cleartext()" class="btn btn-info mx-2 gx-2" name="refresh" value="Refresh">Refresh</button>
                            </div>
                        </div>
                        <script>
                            function cleartext() {
                                document.getElementById("product_name").value = "";
                            }
                        </script>
                    </form>

                    <table cellpadding="0" cellspacing="0">
                        <hr>
                        <?php
                        if (isset($_POST['search'])) {
                            $product_name = $_POST['product_name'];
                            $sql_command = "SELECT * FROM tb_product WHERE name LIKE '%$product_name%'";
                            $sql_run = mysqli_query($conn, $sql_command);
                            $count = mysqli_num_rows($sql_run);
                            if ($count > 0) { ?>
                                <div class="row">
                                    <?php
                                    foreach ($sql_run as $row) { ?>

                                        <div class="col-md-3 my-2 position-static">
                                            <div class="card" style="width: 17rem;">
                                                <a href="productDetail.php?id=<?php echo $row['product_id'] ?>">
                                                    <img src="upload/<?php echo $row['image'] ?>" style="height: 320px; object-fit: fill;" class="card-img-top zoom" alt="<?php echo $row['image'] ?>">
                                                </a>
                                                <div class="card-body">
                                                    <h5 class="card-title" style="height: 5rem;"><?php echo $row['name'] ?></h5>
                                                    <h6 class="card-subtitle mb-2">Type: <?php if ($row['protype_id'] == 1) {
                                                                                                echo 'SD';
                                                                                            } else if ($row['protype_id'] == 2) {
                                                                                                echo 'HG';
                                                                                            } else if ($row['protype_id'] == 3) {
                                                                                                echo 'MG';
                                                                                            } else if ($row['protype_id'] == 4) {
                                                                                                echo 'RG';
                                                                                            } else if ($row['protype_id'] == 5) {
                                                                                                echo 'PG';
                                                                                            }
                                                                                            ?></h6>
                                                    <h6 class="card-subtitle mb-2">Amount: <?php echo $row['amount'] ?></h6>
                                                    <div class="float-start">
                                                        <h5 class="card-text text-start d-inline">Price: <h5 class="d-inline text-success"><?php echo number_format($row['price']) ?> Kip</h5>
                                                        </h5>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="d-grid gap-2 mx-auto">
                                                        <?php
                                                        if ($row['amount'] == 0) {

                                                        ?>
                                                            <a id="" style="float: right; font-size: 14px;" class="btn btn-secondary mt-3"><?php $row['product_id'] ?>Out of Stocks</a>
                                                            <?php } else {
                                                            if (@$_SESSION['role'] != 'admin') {
                                                            ?>
                                                                <a id="product_<?php echo $row['product_id'] ?>" href='productDetail.php?id=<?php echo $row['product_id'] ?>' style="font-size: 14px;" class="btn btn-info zoom"><?php $row['product_id'] ?><i class="fas fa-link"></i>View Detail</a> <a id="product_<?php echo $row['product_id'] ?>" onclick="addToCart3(<?php echo $row['product_id'] ?>, 1)" style="font-size: 14px;" class="btn btn-danger zoom"><?php $row['product_id'] ?><i class="fas fa-shopping-cart"></i>Add to Cart</a>
                                                            <?php } else { ?>
                                                                <a href="productDetail.php?id=<?php echo $row['product_id'] ?>" style="font-size: 14px;" class="btn btn-info zoom"><?php $row['product_id'] ?><i class="fas fa-link"></i>View Detail</a>
                                                        <?php
                                                            }
                                                        } ?>
                                                        <!-- <a href="#" class="btn btn-warning rounded-3 zoom"><i class="fas fa-link"></i> ເບິ່ງລາຍລະອຽດ</a>
                                                    <a href="#" class="btn btn-danger rounded-3 zoom"><i class="fab fa-github"></i> ສັ່ງຊື້</a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php }
                                    ?>
                                </div>
                            <?php
                            } else {
                                echo "<h3 class='text-center'>ບໍ່ພົບສິນຄ້າ</h3>";
                            }
                        } else {
                            $sql_command = "SELECT * FROM tb_product WHERE protype_id = 2";
                            $sql_run = mysqli_query($conn, $sql_command);
                            $count = mysqli_num_rows($sql_run); ?>
                            <div class="row">
                                <?php
                                foreach ($sql_run as $row) { ?>

                                    <div class="col-md-3 my-2 position-static">
                                        <div class="card" style="width: 17rem;">
                                            <a href="productDetail.php?id=<?php echo $row['product_id'] ?>">
                                                <img src="upload/<?php echo $row['image'] ?>" style="height: 320px; object-fit: fill;" class="card-img-top zoom" alt="<?php echo $row['image'] ?>">
                                            </a>
                                            <div class="card-body">
                                                <h5 class="card-title" style="height: 5rem;"><?php echo $row['name'] ?></h5>
                                                <h6 class="card-subtitle mb-2">Type: <?php if ($row['protype_id'] == 1) {
                                                                                            echo 'SD';
                                                                                        } else if ($row['protype_id'] == 2) {
                                                                                            echo 'HG';
                                                                                        } else if ($row['protype_id'] == 3) {
                                                                                            echo 'MG';
                                                                                        } else if ($row['protype_id'] == 4) {
                                                                                            echo 'RG';
                                                                                        } else if ($row['protype_id'] == 5) {
                                                                                            echo 'PG';
                                                                                        }
                                                                                        ?></h6>
                                                <h6 class="card-subtitle mb-2">Amount: <?php echo $row['amount'] ?></h6>
                                                <div class="float-start">
                                                    <h5 class="card-text text-start d-inline">Price: <h5 class="d-inline text-success"><?php echo number_format($row['price']) ?> Kip</h5>
                                                    </h5>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="d-grid gap-2 mx-auto">
                                                    <?php
                                                    if ($row['amount'] == 0) {

                                                    ?>
                                                        <a id="" style="float: right; font-size: 14px;" class="btn btn-secondary mt-3"><?php $row['product_id'] ?>Out of Stocks</a>
                                                        <?php } else {
                                                        if (@$_SESSION['role'] != 'admin') {
                                                        ?>
                                                            <a id="product_<?php echo $row['product_id'] ?>" href='productDetail.php?id=<?php echo $row['product_id'] ?>' style="font-size: 14px;" class="btn btn-info zoom"><?php $row['product_id'] ?><i class="fas fa-link"></i>View Detail</a>
                                                            <a id="product_<?php echo $row['product_id'] ?>" onclick="addToCart3(<?php echo $row['product_id'] ?>, 1)" style="font-size: 14px;" class="btn btn-danger zoom"><?php $row['product_id'] ?><i class="fas fa-shopping-cart"></i>Add to Cart</a>
                                                        <?php } else { ?>
                                                            <a href="productDetail.php?id=<?php echo $row['product_id'] ?>" style="font-size: 14px;" class="btn btn-info zoom"><?php $row['product_id'] ?><i class="fas fa-link"></i>View Detail</a>
                                                    <?php
                                                        }
                                                    } ?>
                                                    <!-- <a href="#" class="btn btn-warning rounded-3 zoom"><i class="fas fa-link"></i> ເບິ່ງລາຍລະອຽດ</a>
                                                    <a href="#" class="btn btn-danger rounded-3 zoom"><i class="fab fa-github"></i> ສັ່ງຊື້</a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            <?php }
                            } ?>
                            </div>
                    </table>
                </div>
                <br>
            <?php } else if ($page == 'mg') { ?>
                <h1 style="text-align: center;"> Gundam MG</h1>
                <br>
                <div class="center">
                    <form action="" method="POST">
                        <div class="form-group row">
                            <div class="col-xs-4">
                                <label for="">ຄົ້ນຫາສິນຄ້າ</label>
                                <input id="product_name" style="border-radius: 5px; width: 20rem; padding: 0.2rem;" type="text" name="product_name" value="<?php if (isset($_POST['product_name'])) {
                                                                                                                                                                echo $_POST['product_name'];
                                                                                                                                                            } ?>">

                                <input class="btn btn-info mx-2 gx-2" type="submit" name="search" value="Search">
                                <button onclick="cleartext()" class="btn btn-info mx-2 gx-2" name="refresh" value="Refresh">Refresh</button>
                            </div>
                        </div>
                        <script>
                            function cleartext() {
                                document.getElementById("product_name").value = "";
                            }
                        </script>
                    </form>

                    <table cellpadding="0" cellspacing="0">
                        <hr>
                        <?php
                        if (isset($_POST['search'])) {
                            $product_name = $_POST['product_name'];
                            $sql_command = "SELECT * FROM tb_product WHERE name LIKE '%$product_name%'";
                            $sql_run = mysqli_query($conn, $sql_command);
                            $count = mysqli_num_rows($sql_run);
                            if ($count > 0) { ?>
                                <div class="row">
                                    <?php
                                    foreach ($sql_run as $row) { ?>

                                        <div class="col-md-3 my-2 position-static">
                                            <div class="card" style="width: 17rem;">
                                                <a href="productDetail.php?id=<?php echo $row['product_id'] ?>">
                                                    <img src="upload/<?php echo $row['image'] ?>" style="height: 320px; object-fit: fill;" class="card-img-top zoom" alt="<?php echo $row['image'] ?>">
                                                </a>
                                                <div class="card-body">
                                                    <h5 class="card-title" style="height: 5rem;"><?php echo $row['name'] ?></h5>
                                                    <h6 class="card-subtitle mb-2">Type: <?php if ($row['protype_id'] == 1) {
                                                                                                echo 'SD';
                                                                                            } else if ($row['protype_id'] == 2) {
                                                                                                echo 'HG';
                                                                                            } else if ($row['protype_id'] == 3) {
                                                                                                echo 'MG';
                                                                                            } else if ($row['protype_id'] == 4) {
                                                                                                echo 'RG';
                                                                                            } else if ($row['protype_id'] == 5) {
                                                                                                echo 'PG';
                                                                                            }
                                                                                            ?></h6>
                                                    <h6 class="card-subtitle mb-2">Amount: <?php echo $row['amount'] ?></h6>
                                                    <div class="float-start">
                                                        <h5 class="card-text text-start d-inline">Price: <h5 class="d-inline text-success"><?php echo number_format($row['price']) ?> Kip</h5>
                                                        </h5>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="d-grid gap-2 mx-auto">
                                                        <?php
                                                        if ($row['amount'] == 0) {

                                                        ?>
                                                            <a id="" style="float: right; font-size: 14px;" class="btn btn-secondary mt-3"><?php $row['product_id'] ?>Out of Stocks</a>
                                                            <?php } else {
                                                            if (@$_SESSION['role'] != 'admin') {
                                                            ?>
                                                                <a id="product_<?php echo $row['product_id'] ?>" href='productDetail.php?id=<?php echo $row['product_id'] ?>' style="font-size: 14px;" class="btn btn-info zoom"><?php $row['product_id'] ?><i class="fas fa-link"></i>View Detail</a>
                                                                <a id="product_<?php echo $row['product_id'] ?>" onclick="addToCart3(<?php echo $row['product_id'] ?>, 1)" style="font-size: 14px;" class="btn btn-danger zoom"><?php $row['product_id'] ?><i class="fas fa-shopping-cart"></i>Add to Cart</a>
                                                            <?php } else { ?>
                                                                <a href="productDetail.php?id=<?php echo $row['product_id'] ?>" style="font-size: 14px;" class="btn btn-info zoom"><?php $row['product_id'] ?><i class="fas fa-link"></i>View Detail</a>
                                                        <?php
                                                            }
                                                        } ?>
                                                        <!-- <a href="#" class="btn btn-warning rounded-3 zoom"><i class="fas fa-link"></i> ເບິ່ງລາຍລະອຽດ</a>
                                                    <a href="#" class="btn btn-danger rounded-3 zoom"><i class="fab fa-github"></i> ສັ່ງຊື້</a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php }
                                    ?>
                                </div>
                            <?php
                            } else {
                                echo "<h3 class='text-center'>ບໍ່ພົບສິນຄ້າ</h3>";
                            }
                        } else {
                            $sql_command = "SELECT * FROM tb_product WHERE protype_id = 3";
                            $sql_run = mysqli_query($conn, $sql_command);
                            $count = mysqli_num_rows($sql_run); ?>
                            <div class="row">
                                <?php
                                foreach ($sql_run as $row) { ?>

                                    <div class="col-md-3 my-2 position-static">
                                        <div class="card" style="width: 17rem;">
                                            <a href="productDetail.php?id=<?php echo $row['product_id'] ?>">
                                                <img src="upload/<?php echo $row['image'] ?>" style="height: 320px; object-fit: fill;" class="card-img-top zoom" alt="<?php echo $row['image'] ?>">
                                            </a>
                                            <div class="card-body">
                                                <h5 class="card-title" style="height: 5rem;"><?php echo $row['name'] ?></h5>
                                                <h6 class="card-subtitle mb-2">Type: <?php if ($row['protype_id'] == 1) {
                                                                                            echo 'SD';
                                                                                        } else if ($row['protype_id'] == 2) {
                                                                                            echo 'HG';
                                                                                        } else if ($row['protype_id'] == 3) {
                                                                                            echo 'MG';
                                                                                        } else if ($row['protype_id'] == 4) {
                                                                                            echo 'RG';
                                                                                        } else if ($row['protype_id'] == 5) {
                                                                                            echo 'PG';
                                                                                        }
                                                                                        ?></h6>
                                                <h6 class="card-subtitle mb-2">Amount: <?php echo $row['amount'] ?></h6>
                                                <div class="float-start">
                                                    <h5 class="card-text text-start d-inline">Price: <h5 class="d-inline text-success"><?php echo number_format($row['price']) ?> Kip</h5>
                                                    </h5>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="d-grid gap-2 mx-auto">
                                                    <?php
                                                    if ($row['amount'] == 0) {

                                                    ?>
                                                        <a id="" style="float: right; font-size: 14px;" class="btn btn-secondary mt-3"><?php $row['product_id'] ?>Out of Stocks</a>
                                                        <?php } else {
                                                        if (@$_SESSION['role'] != 'admin') {
                                                        ?>
                                                            <a id="product_<?php echo $row['product_id'] ?>" href='productDetail.php?id=<?php echo $row['product_id'] ?>' style="font-size: 14px;" class="btn btn-info zoom"><?php $row['product_id'] ?><i class="fas fa-link"></i>View Detail</a>
                                                            <a id="product_<?php echo $row['product_id'] ?>" onclick="addToCart3(<?php echo $row['product_id'] ?>, 1)" style="font-size: 14px;" class="btn btn-danger zoom"><?php $row['product_id'] ?><i class="fas fa-shopping-cart"></i>Add to Cart</a>
                                                        <?php } else { ?>
                                                            <a href="productDetail.php?id=<?php echo $row['product_id'] ?>" style="font-size: 14px;" class="btn btn-info zoom"><?php $row['product_id'] ?><i class="fas fa-link"></i>View Detail</a>
                                                    <?php
                                                        }
                                                    } ?>
                                                    <!-- <a href="#" class="btn btn-warning rounded-3 zoom"><i class="fas fa-link"></i> ເບິ່ງລາຍລະອຽດ</a>
                                                    <a href="#" class="btn btn-danger rounded-3 zoom"><i class="fab fa-github"></i> ສັ່ງຊື້</a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            <?php }
                            } ?>
                            </div>
                    </table>
                </div>
                <br>
            <?php } else if ($page == 'rg') { ?>
                <h1 style="text-align: center;"> Gundam RG</h1>
                <br>
                <div class="center">
                    <form action="" method="POST">
                        <div class="form-group row">
                            <div class="col-xs-4">
                                <label for="">ຄົ້ນຫາສິນຄ້າ</label>
                                <input id="product_name" style="border-radius: 5px; width: 20rem; padding: 0.2rem;" type="text" name="product_name" value="<?php if (isset($_POST['product_name'])) {
                                                                                                                                                                echo $_POST['product_name'];
                                                                                                                                                            } ?>">

                                <input class="btn btn-info mx-2 gx-2" type="submit" name="search" value="Search">
                                <button onclick="cleartext()" class="btn btn-info mx-2 gx-2" name="refresh" value="Refresh">Refresh</button>
                            </div>
                        </div>
                        <script>
                            function cleartext() {
                                document.getElementById("product_name").value = "";
                            }
                        </script>
                    </form>

                    <table cellpadding="0" cellspacing="0">
                        <hr>
                        <?php
                        if (isset($_POST['search'])) {
                            $product_name = $_POST['product_name'];
                            $sql_command = "SELECT * FROM tb_product WHERE name LIKE '%$product_name%'";
                            $sql_run = mysqli_query($conn, $sql_command);
                            $count = mysqli_num_rows($sql_run);
                            if ($count > 0) { ?>
                                <div class="row">
                                    <?php
                                    foreach ($sql_run as $row) { ?>

                                        <div class="col-md-3 my-2 position-static">
                                            <div class="card" style="width: 17rem;">
                                                <a href="productDetail.php?id=<?php echo $row['product_id'] ?>">
                                                    <img src="upload/<?php echo $row['image'] ?>" style="height: 320px; object-fit: fill;" class="card-img-top zoom" alt="<?php echo $row['image'] ?>">
                                                </a>
                                                <div class="card-body">
                                                    <h5 class="card-title" style="height: 5rem;"><?php echo $row['name'] ?></h5>
                                                    <h6 class="card-subtitle mb-2">Type: <?php if ($row['protype_id'] == 1) {
                                                                                                echo 'SD';
                                                                                            } else if ($row['protype_id'] == 2) {
                                                                                                echo 'HG';
                                                                                            } else if ($row['protype_id'] == 3) {
                                                                                                echo 'MG';
                                                                                            } else if ($row['protype_id'] == 4) {
                                                                                                echo 'RG';
                                                                                            } else if ($row['protype_id'] == 5) {
                                                                                                echo 'PG';
                                                                                            }
                                                                                            ?></h6>
                                                    <h6 class="card-subtitle mb-2">Amount: <?php echo $row['amount'] ?></h6>
                                                    <div class="float-start">
                                                        <h5 class="card-text text-start d-inline">Price: <h5 class="d-inline text-success"><?php echo number_format($row['price']) ?> Kip</h5>
                                                        </h5>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="d-grid gap-2 mx-auto">
                                                        <?php
                                                        if ($row['amount'] == 0) {

                                                        ?>
                                                            <a id="" style="float: right; font-size: 14px;" class="btn btn-secondary mt-3"><?php $row['product_id'] ?>Out of Stocks</a>
                                                            <?php } else {
                                                            if (@$_SESSION['role'] != 'admin') {
                                                            ?>
                                                                <a id="product_<?php echo $row['product_id'] ?>" href='productDetail.php?id=<?php echo $row['product_id'] ?>' style="font-size: 14px;" class="btn btn-info zoom"><?php $row['product_id'] ?><i class="fas fa-link"></i>View Detail</a>
                                                                <a id="product_<?php echo $row['product_id'] ?>" onclick="addToCart3(<?php echo $row['product_id'] ?>, 1)" style="font-size: 14px;" class="btn btn-danger zoom"><?php $row['product_id'] ?><i class="fas fa-shopping-cart"></i>Add to Cart</a>
                                                            <?php } else { ?>
                                                                <a href="productDetail.php?id=<?php echo $row['product_id'] ?>" style="font-size: 14px;" class="btn btn-info zoom"><?php $row['product_id'] ?><i class="fas fa-link"></i>View Detail</a>
                                                        <?php
                                                            }
                                                        } ?>
                                                        <!-- <a href="#" class="btn btn-warning rounded-3 zoom"><i class="fas fa-link"></i> ເບິ່ງລາຍລະອຽດ</a>
                                                    <a href="#" class="btn btn-danger rounded-3 zoom"><i class="fab fa-github"></i> ສັ່ງຊື້</a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php }
                                    ?>
                                </div>
                            <?php
                            } else {
                                echo "<h3 class='text-center'>ບໍ່ພົບສິນຄ້າ</h3>";
                            }
                        } else {
                            $sql_command = "SELECT * FROM tb_product WHERE protype_id = 4";
                            $sql_run = mysqli_query($conn, $sql_command);
                            $count = mysqli_num_rows($sql_run); ?>
                            <div class="row">
                                <?php
                                foreach ($sql_run as $row) { ?>

                                    <div class="col-md-3 my-2 position-static">
                                        <div class="card" style="width: 17rem;">
                                            <a href="productDetail.php?id=<?php echo $row['product_id'] ?>">
                                                <img src="upload/<?php echo $row['image'] ?>" style="height: 320px; object-fit: fill;" class="card-img-top zoom" alt="<?php echo $row['image'] ?>">
                                            </a>
                                            <div class="card-body">
                                                <h5 class="card-title" style="height: 5rem;"><?php echo $row['name'] ?></h5>
                                                <h6 class="card-subtitle mb-2">Type: <?php if ($row['protype_id'] == 1) {
                                                                                            echo 'SD';
                                                                                        } else if ($row['protype_id'] == 2) {
                                                                                            echo 'HG';
                                                                                        } else if ($row['protype_id'] == 3) {
                                                                                            echo 'MG';
                                                                                        } else if ($row['protype_id'] == 4) {
                                                                                            echo 'RG';
                                                                                        } else if ($row['protype_id'] == 5) {
                                                                                            echo 'PG';
                                                                                        }
                                                                                        ?></h6>
                                                <h6 class="card-subtitle mb-2">Amount: <?php echo $row['amount'] ?></h6>
                                                <div class="float-start">
                                                    <h5 class="card-text text-start d-inline">Price: <h5 class="d-inline text-success"><?php echo number_format($row['price']) ?> Kip</h5>
                                                    </h5>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="d-grid gap-2 mx-auto">
                                                    <?php
                                                    if ($row['amount'] == 0) {

                                                    ?>
                                                        <a id="" style="float: right; font-size: 14px;" class="btn btn-secondary mt-3"><?php $row['product_id'] ?>Out of Stocks</a>
                                                        <?php } else {
                                                        if (@$_SESSION['role'] != 'admin') {
                                                        ?>
                                                            <a id="product_<?php echo $row['product_id'] ?>" href='productDetail.php?id=<?php echo $row['product_id'] ?>' style="font-size: 14px;" class="btn btn-info zoom"><?php $row['product_id'] ?><i class="fas fa-link"></i>View Detail</a>
                                                            <a id="product_<?php echo $row['product_id'] ?>" onclick="addToCart3(<?php echo $row['product_id'] ?>, 1)" style="font-size: 14px;" class="btn btn-danger zoom"><?php $row['product_id'] ?><i class="fas fa-shopping-cart"></i>Add to Cart</a>
                                                        <?php } else { ?>
                                                            <a href="productDetail.php?id=<?php echo $row['product_id'] ?>" style="font-size: 14px;" class="btn btn-info zoom"><?php $row['product_id'] ?><i class="fas fa-link"></i>View Detail</a>
                                                    <?php
                                                        }
                                                    } ?>
                                                    <!-- <a href="#" class="btn btn-warning rounded-3 zoom"><i class="fas fa-link"></i> ເບິ່ງລາຍລະອຽດ</a>
                                                    <a href="#" class="btn btn-danger rounded-3 zoom"><i class="fab fa-github"></i> ສັ່ງຊື້</a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            <?php }
                            } ?>
                            </div>
                            </form>
                </div>
                </div>

                </td>
                </tr>
            <?php } else if ($page == 'pg') { ?>
                <h1 style="text-align: center;"> Gundam PG</h1>
                <br>
                <div class="center">
                    <form action="" method="POST">
                        <div class="form-group row">
                            <div class="col-xs-4">
                                <label for="">ຄົ້ນຫາສິນຄ້າ</label>
                                <input id="product_name" style="border-radius: 5px; width: 20rem; padding: 0.2rem;" type="text" name="product_name" value="<?php if (isset($_POST['product_name'])) {
                                                                                                                                                                echo $_POST['product_name'];
                                                                                                                                                            } ?>">

                                <input class="btn btn-info mx-2 gx-2" type="submit" name="search" value="Search">
                                <button onclick="cleartext()" class="btn btn-info mx-2 gx-2" name="refresh" value="Refresh">Refresh</button>
                            </div>
                        </div>
                        <script>
                            function cleartext() {
                                document.getElementById("product_name").value = "";
                            }
                        </script>
                    </form>

                    <table cellpadding="0" cellspacing="0">
                        <hr>
                        <?php
                        if (isset($_POST['search'])) {
                            $product_name = $_POST['product_name'];
                            $sql_command = "SELECT * FROM tb_product WHERE name LIKE '%$product_name%'";
                            $sql_run = mysqli_query($conn, $sql_command);
                            $count = mysqli_num_rows($sql_run);
                            if ($count > 0) { ?>
                                <div class="row">
                                    <?php
                                    foreach ($sql_run as $row) { ?>

                                        <div class="col-md-3 my-2 position-static">
                                            <div class="card" style="width: 17rem;">
                                                <a href="productDetail.php?id=<?php echo $row['product_id'] ?>">
                                                    <img src="upload/<?php echo $row['image'] ?>" style="height: 320px; object-fit: fill;" class="card-img-top zoom" alt="<?php echo $row['image'] ?>">
                                                </a>
                                                <div class="card-body">
                                                    <h5 class="card-title" style="height: 5rem;"><?php echo $row['name'] ?></h5>
                                                    <h6 class="card-subtitle mb-2">Type: <?php if ($row['protype_id'] == 1) {
                                                                                                echo 'SD';
                                                                                            } else if ($row['protype_id'] == 2) {
                                                                                                echo 'HG';
                                                                                            } else if ($row['protype_id'] == 3) {
                                                                                                echo 'MG';
                                                                                            } else if ($row['protype_id'] == 4) {
                                                                                                echo 'RG';
                                                                                            } else if ($row['protype_id'] == 5) {
                                                                                                echo 'PG';
                                                                                            }
                                                                                            ?></h6>
                                                    <h6 class="card-subtitle mb-2">Amount: <?php echo $row['amount'] ?></h6>
                                                    <div class="float-start">
                                                        <h5 class="card-text text-start d-inline">Price: <h5 class="d-inline text-success"><?php echo number_format($row['price']) ?> Kip</h5>
                                                        </h5>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="d-grid gap-2 mx-auto">
                                                        <?php
                                                        if ($row['amount'] == 0) {

                                                        ?>
                                                            <a id="" style="float: right; font-size: 14px;" class="btn btn-secondary mt-3"><?php $row['product_id'] ?>Out of Stocks</a>
                                                            <?php } else {
                                                            if (@$_SESSION['role'] != 'admin') {
                                                            ?>
                                                                <a id="product_<?php echo $row['product_id'] ?>" href='productDetail.php?id=<?php echo $row['product_id'] ?>' style="font-size: 14px;" class="btn btn-info zoom"><?php $row['product_id'] ?><i class="fas fa-link"></i>View Detail</a>
                                                                <a id="product_<?php echo $row['product_id'] ?>" onclick="addToCart3(<?php echo $row['product_id'] ?>, 1)" style="font-size: 14px;" class="btn btn-danger zoom"><?php $row['product_id'] ?><i class="fas fa-shopping-cart"></i>Add to Cart</a>
                                                            <?php } else { ?>
                                                                <a href="productDetail.php?id=<?php echo $row['product_id'] ?>" style="font-size: 14px;" class="btn btn-info zoom"><?php $row['product_id'] ?><i class="fas fa-link"></i>View Detail</a>
                                                        <?php
                                                            }
                                                        } ?>
                                                        <!-- <a href="#" class="btn btn-warning rounded-3 zoom"><i class="fas fa-link"></i> ເບິ່ງລາຍລະອຽດ</a>
                                                    <a href="#" class="btn btn-danger rounded-3 zoom"><i class="fab fa-github"></i> ສັ່ງຊື້</a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>
                                </div>
                            <?php
                            } else {
                                echo "<h3 class='text-center'>ບໍ່ພົບສິນຄ້າ</h3>";
                            }
                        } else {
                            $sql_command = "SELECT * FROM tb_product WHERE protype_id = 5";
                            $sql_run = mysqli_query($conn, $sql_command);
                            $count = mysqli_num_rows($sql_run); ?>
                            <div class="row">
                                <?php
                                foreach ($sql_run as $row) { ?>

                                    <div class="col-md-3 my-2 position-static">
                                        <div class="card" style="width: 17rem;">
                                            <a href="productDetail.php?id=<?php echo $row['product_id'] ?>">
                                                <img src="upload/<?php echo $row['image'] ?>" style="height: 320px; object-fit: fill;" class="card-img-top zoom" alt="<?php echo $row['image'] ?>">
                                            </a>
                                            <div class="card-body">
                                                <h5 class="card-title" style="height: 5rem;"><?php echo $row['name'] ?></h5>
                                                <h6 class="card-subtitle mb-2">Type: <?php if ($row['protype_id'] == 1) {
                                                                                            echo 'SD';
                                                                                        } else if ($row['protype_id'] == 2) {
                                                                                            echo 'HG';
                                                                                        } else if ($row['protype_id'] == 3) {
                                                                                            echo 'MG';
                                                                                        } else if ($row['protype_id'] == 4) {
                                                                                            echo 'RG';
                                                                                        } else if ($row['protype_id'] == 5) {
                                                                                            echo 'PG';
                                                                                        }
                                                                                        ?></h6>
                                                <h6 class="card-subtitle mb-2">Amount: <?php echo $row['amount'] ?></h6>
                                                <div class="float-start">
                                                    <h5 class="card-text text-start d-inline">Price: <h5 class="d-inline text-success"><?php echo number_format($row['price']) ?> Kip</h5>
                                                    </h5>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="d-grid gap-2 mx-auto">
                                                    <?php
                                                    if ($row['amount'] == 0) {

                                                    ?>
                                                        <a id="" style="float: right; font-size: 14px;" class="btn btn-secondary mt-3"><?php $row['product_id'] ?>Out of Stocks</a>
                                                        <?php } else {
                                                        if (@$_SESSION['role'] != 'admin') {
                                                        ?>
                                                            <a id="product_<?php echo $row['product_id'] ?>" href='productDetail.php?id=<?php echo $row['product_id'] ?>' style="font-size: 14px;" class="btn btn-info zoom"><?php $row['product_id'] ?><i class="fas fa-link"></i>View Detail</a>
                                                            <a id="product_<?php echo $row['product_id'] ?>" onclick="addToCart3(<?php echo $row['product_id'] ?>, 1)" style="font-size: 14px;" class="btn btn-danger zoom"><?php $row['product_id'] ?><i class="fas fa-shopping-cart"></i>Add to Cart</a>
                                                        <?php } else { ?>
                                                            <a href="productDetail.php?id=<?php echo $row['product_id'] ?>" style="font-size: 14px;" class="btn btn-info zoom"><?php $row['product_id'] ?><i class="fas fa-link"></i>View Detail</a>
                                                    <?php
                                                        }
                                                    } ?>
                                                    <!-- <a href="#" class="btn btn-warning rounded-3 zoom"><i class="fas fa-link"></i> ເບິ່ງລາຍລະອຽດ</a>
                                                    <a href="#" class="btn btn-danger rounded-3 zoom"><i class="fab fa-github"></i> ສັ່ງຊື້</a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                        <?php }
                            }
                        }
                        ?>
                            </div>
                    </table>
                </div>
                <br>
        </main>

        <footer style="width:100%;" id="footer" class="text-center text-lg-start bg-light text-muted footer">
            <?php include('footer.php');
            ob_end_flush();
            ?>
        </footer>
    </body>
    <script src="Resources/js/server.js"></script>
    <script src="Resources/js/flyToCart.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    </html>