<!DOCTYPE html>
<html lang="en">
<?php
session_start();
ob_start();
include_once('Database/db.con.php');
include_once('functions.php');
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
    <link rel="stylesheet" href="Resources/css/style.css">
    <link rel="stylesheet" href="Resources/css/zoom.css">
    <link rel="icon" type="image/png, image/jpg, image/jpeg" href="Resources/images/02.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>

<script>
    function deleteProduct(id) {
        var product_id = id;
        $.post("addToCart.php", {
            id: id
        }, function(data, status) {
            loaddd();
        });
    };
</script>

<body>
    <header id="header">
        <?php include('header.php'); ?>
    </header>

    <main id="main">

        <h1 class="text-center fw-bold">Shopping-Cart</h1>
        <br>
        <div class="container">
            <form action="cart.php" method="POST">
                <button style="font-family: 'Noto Sans Lao', sans-serif;" name="deleteAll" class="btn btn-danger my-1 float-end">ລຶບທັງໝົດ</button>
            </form>
            <?php
            if (isset($_POST['deleteAll'])) {
                $delete = "DELETE FROM tb_cart";
                $delete_run = mysqli_query($conn, $delete);
            }
            ?>
            <table id="mytable" class="table table-bordered table-striped">
                <thead style="background-color: pink;">
                    <th style="font-family: 'Noto Sans Lao', sans-serif;" class="text-center">#</th>
                    <th style="font-family: 'Noto Sans Lao', sans-serif;" class="text-center">ສິນຄ້າ</th>
                    <th style="font-family: 'Noto Sans Lao', sans-serif;" class="text-center">ຊື່</th>
                    <th style="font-family: 'Noto Sans Lao', sans-serif;" class="text-center">ຈຳນວນ</th>
                    <th style="font-family: 'Noto Sans Lao', sans-serif;" class="text-center">ປະເພດສິນຄ້າ</th>
                    <th style="font-family: 'Noto Sans Lao', sans-serif;" class="text-center">ລາຄາ</th>
                    <th style="font-family: 'Noto Sans Lao', sans-serif;" class="text-center">ລົບ</th>
                </thead>
                <tbody>
                    <?php
                    if (@$_SESSION['role'] == 'supplier') {
                        header("location: supplyer.php");
                    }
                    @$i = 0;
                    $total = 0;
                    $fetchdata = new DB_con();
                    $user_id = $_SESSION['customerid'];
                    $sql = $fetchdata->fetchCart($user_id);
                    while ($row = mysqli_fetch_array($sql)) {
                    ?>
                        <tr>
                            <?php
                            $price = $row['price'];
                            $amount = $row['amount'];
                            $sum = $price * $amount;
                            $total += $sum;
                            ?>
                            <td style="width: 2rem;" valign=middle class="text-center"><?php echo @++$i; ?></td>
                            <td style="width: 8rem;"><a href="productDetail.php?id=<?php echo @$row['product_id'] ?>"><img class="zoom" style="display: block; margin: 0 auto; height: 100px; width: 100px;" src="upload/<?php echo $row['image'] ?>" height="150" alt="<?php echo @$row['image'] ?>"></a></td>
                            <td style="width: 15rem;" valign=middle class="text-center"><?php echo $row['product_name'] ?></td>
                            <td style="width: 5rem;" valign=middle class="text-center"><input class="text-center" type="number" value="<?php echo @$row['amount'] ?>" style="border-radius: 5px; width: 3rem;" disabled></td>

                            <td style="width: 10rem;" valign=middle class="text-center"><?php if (@$row['protype_id'] == 1) {
                                                                                            echo 'SD';
                                                                                        } else if (@$row['protype_id'] == 2) {
                                                                                            echo 'HG';
                                                                                        } else if (@$row['protype_id'] == 3) {
                                                                                            echo 'MG';
                                                                                        } else if (@$row['protype_id'] == 4) {
                                                                                            echo 'RG';
                                                                                        } else if (@$row['protype_id'] == 5) {
                                                                                            echo 'PG';
                                                                                        }
                                                                                        ?></td>
                            <td style="width: 14rem;" valign=middle class="text-center"><?php echo number_format($sum) . ' Kip' ?></td>
                            <td style="width: 5rem;" valign=middle class="text-center"><a href="delete.php?page=cart&id=<?php echo @$row['product_id']; ?>&user_id=<?php echo $user_id ?>" class="btn btn-danger zoom text-center"><i class="fa fa-trash text-center" aria-hidden="true"></i></a></td>
                        </tr>
                    <?php
                    }
                    ?>
                    <?php
                    $sql3 = "SELECT sum(amount) FROM tb_cart WHERE user_id = $user_id";
                    $result2 = mysqli_query($conn, $sql3);
                    $row2 = mysqli_fetch_array($result2);
                    ?>

                </tbody>
            </table>
            <?php if ($i == 0) { ?>

            <?php } else {

            ?>
                <div class="shadow-4" align="right">
                    <h3 style="display: inline-block;">Total: <h3 style="display: inline-block;" class="text-success"> <?php echo '&nbsp';
                                                                                                                        echo number_format($total) . ' Kip'; ?></h3>
                    </h3>
                    <h3 style="font-family: 'Noto Sans Lao', sans-serif;">ຈຳນວນ: <?php echo ($row2[0]) . ' ກ່ອງ'; ?></h3>
                    <a href="payment.php" class="btn btn-success zoom text-center">
                        <i class="fa fa-credit-card fs-5 fw-normal" aria-hidden="true"> Check Out</i>
                    </a>
                </div>
            <?php } ?>
            <?php if (!$i) { ?>
                <h3 style="font-family: 'Noto Sans Lao', sans-serif;" class="text-center">ບໍ່ມີສິນຄ້າໃນກະຕ່າ</h3>
            <?php
            }

            ?>
        </div>

    </main>

    <div class="mt-5"></div>
    <footer id="footer" class="text-center text-lg-start bg-light text-muted footer">
        <?php include('footer.php');
        ob_end_flush(); ?>
    </footer>
</body>
</head>

</html>

<script>

</script>