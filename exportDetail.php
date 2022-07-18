<?php
session_start();
ob_start();
include_once('Database/db.con.php');
include_once('functions.php');
@$user_id = $_SESSION['customerid'];
if (!isset($user_id)) {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="Resources/css/style.css">
    <link rel="stylesheet" href="Resources/css/zoom.css">
    <link rel="icon" type="image/png, image/jpg, image/jpeg" href="Resources/images/02.png">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>
<style>

</style>
<?php
$order_id = $_GET['id'];

date_default_timezone_set("Asia/Bangkok");
$order_date = date("Y-m-d H:i:s");
// $timestamp = strtotime($date);
// $order_date = date("d-m-Y H:i:s", $timestamp);
$update = "UPDATE tb_orderproduct SET readStatus = 1 WHERE order_id = $order_id";
$perform = mysqli_query($conn, $update);
?>

<body>
    <header id="header">
        <?php include('headerForSupplier.php'); ?>
    </header>

    <main id="main">
        <br>
        <h1 class="text-center fw-bold">Import Product</h1>
        <br>

        <div class="container">
            <style>
                .row {
                    display: -ms-flexbox;
                    /* IE10 */
                    display: flex;
                    -ms-flex-wrap: wrap;
                    /* IE10 */
                    flex-wrap: wrap;
                    margin: 0 -16px;
                }

                .col-25 {
                    -ms-flex: 25%;
                    /* IE10 */
                    flex: 25%;
                }

                .col-50 {
                    -ms-flex: 50%;
                    /* IE10 */
                    flex: 50%;
                }

                .col-75 {
                    -ms-flex: 75%;
                    /* IE10 */
                    flex: 75%;
                }

                .col-25,
                .col-50,
                .col-75 {
                    padding: 0 16px;
                }

                .container2 {
                    background-color: #f2f2f2;
                    padding: 5px 20px 15px 20px;
                    border: 1px solid lightgrey;
                    border-radius: 3px;
                }

                input[type=text] {
                    width: 100%;
                    margin-bottom: 20px;
                    padding: 12px;
                    border: 1px solid #ccc;
                    border-radius: 3px;
                }

                label {
                    margin-bottom: 10px;
                    display: block;
                }

                .icon-container2 {
                    margin-bottom: 20px;
                    padding: 7px 0;
                    font-size: 24px;
                }

                hr {
                    border: 1px solid lightgrey;
                }

                span.price {
                    float: right;
                    color: grey;
                }

                /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
                @media (max-width: 800px) {
                    .row {
                        flex-direction: column-reverse;
                    }

                    .col-25 {
                        margin-bottom: 20px;
                    }
                }
            </style>
            </head>

            <body>
                <?php
                $sql = "SELECT * FROM tb_orderproduct_detail WHERE order_id = $order_id";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($query);
                ?>
                <div class="row">
                    <div class="col-75">
                        <div class="container2">
                            <form method="POST">
                                <div class="row">
                                    <div class="col-50">
                                        <h3 style="font-family: 'Noto Sans Lao', sans-serif;" class="text-center">ໃບສັ່ງຊື້ສິນຄ້າ</h3>
                                        <p style="font-family: 'Noto Sans Lao', sans-serif;" class='text-center'>ໄອດີການສັ່ງຊື້: <?php echo $order_id ?></p>
                                        <label style="font-family: 'Noto Sans Lao', sans-serif;" for="fname"><i class="fa fa-user"></i> ຊື່ຜູ້ສັ່ງຊື້</label>
                                        <input type="text" id="fname" name="owner" placeholder="" value="<?php echo $row['owner_name'] ?>" disabled>
                                        <label style="font-family: 'Noto Sans Lao', sans-serif;" for="email"><i class="fa fa-phone"></i> ເບີໂທຕິດຕໍ່ຜູ້ສັ່ງຊື້</label>
                                        <input type="text" id="email" name="phone_number" placeholder="ເບີໂທ ຫຼື ເບີວອດແອັບ" value="<?php echo $row['phone_number'] ?>" disabled>
                                        <label style="font-family: 'Noto Sans Lao', sans-serif;" for="adr"><i class="fa fa-address-card-o"></i> ທີ່ຢູ່ຂອງລູກຄ້າ</label>
                                        <input type="text" id="adr" name="address" placeholder="ໃສ່ຊື່ເມືອງ ແລະ ຊື່ບ້ານ ຫຼື ລິ້ງ Google Map" value="<?php echo $row['address'] ?>" disabled>
                                        <label style="font-family: 'Noto Sans Lao', sans-serif;" for="fname"> ຊື່ຜູ້ສະໜອງ</label>
                                        <input type="text" id="fname" name="supplier" placeholder="" value="<?php echo $row['supplier_name'] ?>" disabled>
                                        <label style="font-family: 'Noto Sans Lao', sans-serif;" for="city"><i class="fa fa-institution"></i> ສິນຄ້າທີ່ຈະນຳເຂົ້າຮ້ານ</label>
                                        <textarea class="form-control message" rows="6" cols="50" type="text" id="city" name="order_list" placeholder="" required><?php echo $row['order_list'] ?></textarea>
                                        <label style="font-family: 'Noto Sans Lao', sans-serif;" for="fname"> ລວມລາຄາທັງໝົດ</label>
                                        <input class="form-control" type="number" id="fname" name="total_price" placeholder="" value="0">
                                        <label style="font-family: 'Noto Sans Lao', sans-serif;" for="city"><i class="fa fa-institution"></i> Comment</label>
                                        <textarea class="form-control message" rows="6" cols="50" type="text" id="city" name="comment" placeholder=""></textarea>
                                        <script>
                                            $('.message').keypress(function(event) {
                                                if (event.which == 13) {
                                                    event.preventDefault();
                                                    this.value = this.value + "<br/>";
                                                }
                                            });
                                        </script>
                                    </div>

                                </div>
                                <label>
                                </label>
                                <p align="right">
                                    <input type=submit href="" name="accept" class="btn btn-success text-uppercase mr-2 px-4" value="Accept"></i>
                                    <input type=submit href="" name="cancel" class="btn btn-danger text-uppercase mr-2 px-4" value="Cancel Order"></i>
                                </p>
                                <?php
                                if (isset($_POST['accept'])) {
                                    $order_list = $_POST['order_list'];
                                    $total = $_POST['total_price'];
                                    $comment = $_POST['comment'];

                                    $update2 = "UPDATE tb_orderproduct SET order_date = '$order_date', status = 1, readStatus = 1, adminRead = 1 WHERE order_id = $order_id";
                                    $perform2 = mysqli_query($conn, $update2);

                                    $update3 = "UPDATE tb_orderproduct_detail SET order_list = '$order_list', total_price = $total, comment = '$comment' WHERE order_id = $order_id";
                                    $perform3 = mysqli_query($conn, $update3);
                                    if ($perform2 && $perform3) {
                                        $update2 = "INSERT INTO tb_import (import_date, order_id) VALUES ('$order_date', $order_id)";
                                    $perform2 = mysqli_query($conn, $update2);

                                    $SelectDetail = "SELECT import_id FROM tb_import ORDER BY import_id DESC";
                                    $queryDetail = mysqli_query($conn, $SelectDetail);
                                    $D = mysqli_fetch_array($queryDetail);
                                    $import_id = $D['import_id'];

                                    $update3 = "INSERT INTO tb_import_detail (import_id, order_list, price, comment) VALUES ($import_id, '$order_list', $total, '$comment')";
                                    $perform3 = mysqli_query($conn, $update3);
                                        echo '<script>alert("ຕົກລົງການສັ່ງຊື້ສຳເລັດ")</script>';
                                        echo '<p style="font-family: "Noto Sans Lao", sans-serif;" align="right">ຕົກລົງການສັ່ງຊື້ສຳເລັດ</p>';
                                        header("location: Export.php");
                                    }
                                }
                                if (isset($_POST['cancel'])) {
                                    $order_list = $_POST['order_list'];
                                    $total = $_POST['total_price'];
                                    $comment = $_POST['comment'];

                                    $update4 = "UPDATE tb_orderproduct SET order_date = '$order_date', status = 2, readStatus = 1, adminRead = 1 WHERE order_id = $order_id";
                                    $perform4 = mysqli_query($conn, $update4);

                                    $update5 = "UPDATE tb_orderproduct_detail SET order_list = '$order_list', total_price = $total, comment = '$comment' WHERE order_id = $order_id";
                                    $perform5 = mysqli_query($conn, $update5);
                                    if ($perform4 && $perform5) {
                                        echo '<script>alert("ຍົກເລີກການສັ່ງຊື້ສຳເລັດ")</script>';
                                        echo '<p style="font-family: "Noto Sans Lao", sans-serif;" align="right">ຍົກເລີກການສັ່ງຊື້ສຳເລັດ</p>';
                                        header("location: Export.php");
                                    }
                                }
                                ?>
                            </form>

                        </div>
                    </div>

                </div>
        </div>

    </main>

    <div class="mt-5"></div>
    <footer id="footer" class="text-center text-lg-start bg-light text-muted footer">
        <?php include('footer.php'); ?>
    </footer>
</body>
</head>

</html>
<?php
ob_end_flush();
?>