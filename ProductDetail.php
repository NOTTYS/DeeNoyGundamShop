<!doctype html>
<html lang="en">
<?php session_start(); 
ob_start();
?>
<head>
    <?php
    include('Database/db.con.php');
    if (!isset($_SESSION['customerid'])) {
        $login = 0;
    } else {
        $login = 1;
    }
    @$role1 = $_SESSION['role'];
    @$role = $_GET['role'];
    @$id = $_GET['id'];
    @$userid = $_SESSION['customerid'];
    $amount = 1;
    ?>
    <title>Product view</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Resources/css/rainbow.css">
    <link rel="stylesheet" href="Resources/css/increase_btn.css">
    <link rel="stylesheet" href="Resources/css/slider.css">
    <link rel="stylesheet" href="Resources/css/gundamFont.css">
    <link rel="stylesheet" href="Resources/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="Resources/js/btn-number.js"></script>
    <link rel="icon" type="image/png, image/jpg, image/jpeg" href="Resources/images/02.png">
    <script src="Resources/js/btn-number.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao&display=swap" rel="stylesheet">


</head>
<style>
    h4 {
        font-family: 'Noto Sans Lao', sans-serif;
    }
</style>

<body>
    <header>

        <?php
        if (@$_SESSION['role'] == 'admin') {
            include('headerForAdmin.php');
        } else {
            include('header.php');
        }
        ?>
    </header>

    <main>
        <?php
        $sql = "SELECT * FROM tb_product WHERE product_id = $id";
        $result = mysqli_query($conn, $sql);
        $amount = 1;
        ?>
        <?php
        foreach ($result as $row) { ?>
            <div class="container mt-5 mb-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="images p-3">
                                        <div class="text-center p-4"> <img name="img" style="height: 500px; width: 500px; object-fit: contain;" id="main-image" src="upload/<?php echo $row['image'] ?>" /> </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="product p-4">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i> <span class="ml-1"><button style="background-color: transparent; color: black; border-radius: 10px;" onclick="back()">Back</button></span> </div>
                                        </div>
                                        <form action="" method="POST">
                                            <div class="mt-4 mb-3">
                                                <h3 name="name" class="text-uppercase"><?php echo $row['name'] ?></h3>
                                                <div class="price d-flex flex-row align-items-center">
                                                    <h5 class="act-price">Price: <h4 name="price" style="color: green;"><?php echo '&nbsp';
                                                                                                                        echo number_format($row['price']) . ' ກີບ' ?></h4>
                                                    </h5>
                                                </div>
                                                <div class="price d-flex flex-row align-items-center">
                                                    <h5 name="grade" class="act-price">Grade: <?php if ($row['protype_id'] == 1) {
                                                                                                    echo 'SD';
                                                                                                } else if ($row['protype_id'] == 2) {
                                                                                                    echo 'HG';
                                                                                                } else if ($row['protype_id'] == 3) {
                                                                                                    echo 'RG';
                                                                                                } else if ($row['protype_id'] == 4) {
                                                                                                    echo 'PG';
                                                                                                }
                                                                                                ?></h5>
                                                </div>
                                                <div class="price d-flex flex-row align-items-center">
                                                    <h5 class="act-price">ຈຳນວນສິນຄ້າ: <?php echo $row['amount'] ?></h5>
                                                </div>
                                            </div>
                                            <div class="sizes mt-6">
                                                <div class="center" style="display: inline-block;">
                                                    <h4 class="text-uppercase">ເພິ່ມຈຳນວນ</h4>

                                                    <!-- <button type="button" class="decrease" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</button> -->
                                                    <input name="amount" type="number" id="number" value="1" min="1" max="<?php echo $row['amount'] ?>">
                                                    <!-- <button type="button" class="increase" id="increase" onclick="increaseValue()" value="Increase Value">+</button> -->
                                                    <br>
                                                    <br>
                                                    <?php
                                                    if ($row['amount'] == 0) {

                                                    ?>
                                                        <input type="button" style="padding: 8px" class="btn btn-secondary text-uppercase mr-2 px-4 fa" value="Out of Stock" disabled>
                                                    <?php } else {

                                                    ?>
                                                        <input type="submit" name="addToCart" style="padding: 8px" class="btn btn-danger text-uppercase mr-2 px-4 fa" value="Add to cart">
                                                    <?php } ?>

                                        </form>
                                        <?php if (isset($_POST['addToCart'])) {
                                            if($login == 1) {
                                            $InsertToCart = new DB_con();
                                            $updateToCart = new DB_con();
                                            $product_id = $row['product_id'];
                                            $img = $row['image'];
                                            $name = $row['name'];
                                            $price = $row['price'];
                                            $grade = $row['protype_id'];
                                            $amount = $_POST['amount'];
                                            $datetime = date("Y-m-d H:i:s");
                                            $sql2 = "SELECT * FROM tb_cart WHERE user_id = $userid AND product_id = $product_id AND product_name = '$name'";
                                            $result = mysqli_query($conn, $sql2);
                                            $cart = mysqli_fetch_assoc($result);

                                            if ($name === @$cart['product_name'] && $product_id == @$cart['product_id']) {
                                                $sql2 = $updateToCart->updateToCart($userid, $product_id, $img, $name, $grade, $amount, $price, $datetime);
                                                header("location: cart.php");
                                            } else {
                                                $sql3 = $InsertToCart->addToCart($userid, $product_id, $img, $name, $grade, $amount, $price, $datetime);
                                                header("location: cart.php");
                                            }
                                        } else {
                                            echo "<script>alert('ກະລຸນາ Login ກ່ອນ')
                                            window.location = 'login.php';
                                            </script>";
                                        }
                                        } ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>
        <?php } ?>
    </main>
    <style>
        .decrease {
            background-color: red;
            border-radius: 5px;
            width: 3rem;
            color: white;
        }

        .increase {
            background-color: green;
            border-radius: 5px;
            width: 3rem;
            color: white;
        }

        input {
            width: auto;
            text-align: center;
        }
    </style>
    <footer id="footer" class="text-center text-lg-start bg-light text-muted footer">
        <?php include('footer.php'); ?>
    </footer>
</body>
<script src="Resources/js/increase_btn.js"></script>

</html>
<script>
    var number = "<?php echo $amount ?>"
    var login = "<?php echo $login ?>"

    function loaddd() {
        $.get("cartItem.php?id=" + "<?php echo $userid ?>", function(data, status) {
            $("#cart_item").html(data)
        })
    }

    function addToCartt(id, amount) {
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

    function back() {
        history.back();
        
    }
</script>
<?php
ob_end_flush();
?>