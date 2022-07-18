<?php
session_start();
ob_start();
include_once('Database/db.con.php');
include_once('functions.php');
include('admin_check.php');
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
    <link rel="stylesheet" href="Resources/css/dropdown.css">
    <link rel="icon" type="image/png, image/jpg, image/jpeg" href="Resources/images/02.png">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>
<style>

</style>

<body>
    <header id="header">
        <?php include('headerForAdmin.php');
        include('admin_check.php');
        ?>
    </header>

    <main id="main">
        <br>
        <h1 style="font-family: 'Noto Sans Lao', sans-serif;" class="text-center fw-bold">ສັ່ງຊື້ສິນຄ້າເຂົ້າຮ້ານ</h1>
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
                <div class="row">
                    <div class="col-75">
                        <div class="container2">
                            <form method="POST">
                                <div class="row">
                                    <div class="col-50">
                                        <hr>
                                        <?php
                                        $sql_command = "SELECT * FROM tb_product WHERE amount <= 5";
                                        $sql_run = mysqli_query($conn, $sql_command);
                                        $count = mysqli_num_rows($sql_run);
                                        if ($count > 0) {
                                        ?>
                                            <h2 class="text-center" style="font-family: 'Noto Sans Lao', sans-serif;">ສິນຄ້າທີ່ກຳລັງໝົດສະຕ໋ອກ</h2>

                                            <div class="row">
                                                <?php
                                                foreach ($sql_run as $row) { ?>

                                                    <div class="col-md-3 my-2 position-static">
                                                        <div class="card" style="width: 17rem;">
                                                            <a>
                                                                <img src="upload/<?php echo $row['image'] ?>" style="height: 320px; object-fit: fill;" class="card-img-top zoom" alt="<?php echo $row['image'] ?>">
                                                            </a>
                                                            <div class="card-body">
                                                                <h5 class="card-title" style="height: 5rem;"><?php echo $row['name'] ?></h5>
                                                                <h5 class="card-subtitle mb-2">ID: <?php echo $row['product_id'] ?></h6>
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
                                                                        <!-- <a id="product_<?php echo $row['product_id'] ?>" onclick="addToCart3(<?php echo $row['product_id'] ?>, <?php echo $row['name'] ?>, <?php echo $row['protype_id'] ?>)" style="font-size: 14px;" class="btn btn-info zoom"><?php $row['product_id'] ?><i class="fas fa-shopping-cart"></i>Add to Stock</a> -->
                                                                        <!-- <a href="#" class="btn btn-warning rounded-3 zoom"><i class="fas fa-link"></i> ເບິ່ງລາຍລະອຽດ</a>
                                                    <a href="#" class="btn btn-danger rounded-3 zoom"><i class="fab fa-github"></i> ສັ່ງຊື້</a> -->
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <hr>
                                        <?php
                                        }
                                        ?>
                                        <!-- </div> -->
                                        <h3 style="font-family: 'Noto Sans Lao', sans-serif;" class="text-center">ຟອມເພິ່ມສິນຄ້າທີ່ຈະສັ່ງຊື້</h3>
                                        <!-- <div class="custom-select" style="width:200px;"> -->

                                        <div class="row justify-content-start">
                                            <div class="col-2">
                                                <label for="">ຜູ້ສະໜອງ</label>
                                                <select class="form-select" name="supplier_id">
                                                    <?php
                                                    $supplier = "SELECT * FROM tb_supplier";
                                                    $summon2 = mysqli_query($conn, $supplier);
                                                    while ($pro_type_show = mysqli_fetch_array($summon2)) {
                                                    ?>
                                                        <option value="<?php echo $pro_type_show['supplier_id'] ?>"><?php echo $pro_type_show['companyname'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="input-field">
                                            <table class="table table-bordered" id="table_field">
                                                <tr>
                                                    <th style="font-family: 'Noto Sans Lao', sans-serif;">ລະຫັດສິນຄ້າ</th>
                                                    <th style="font-family: 'Noto Sans Lao', sans-serif;">ຈຳນວນ</th>
                                                    <th style="font-family: 'Noto Sans Lao', sans-serif;" valign=middle class="text-center">ເພິ່ມ ແລະ ລົບ</th>
                                                </tr>
                                                <tr>

                                                    <td valign=middle class="text-center">
                                                        <input class="form-control" name='txtID[]' list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                                                        <datalist id="datalistOptions">
                                                            <?php
                                                            $supplier = "SELECT * FROM tb_product";
                                                            $summon2 = mysqli_query($conn, $supplier);
                                                            while ($pro_type_show = mysqli_fetch_array($summon2)) {
                                                            ?>
                                                                <option value="<?php echo $pro_type_show['product_id'] ?>">ID: <?php echo $pro_type_show['product_id'] ?> <?php echo $pro_type_show['name'] ?> Type: <?php if ($pro_type_show['protype_id'] == 1) {
                                                                                                                                                                                                                            echo "SD";
                                                                                                                                                                                                                        }
                                                                                                                                                                                                                        if ($pro_type_show['protype_id'] == 2) {
                                                                                                                                                                                                                            echo "HG";
                                                                                                                                                                                                                        }
                                                                                                                                                                                                                        if ($pro_type_show['protype_id'] == 3) {
                                                                                                                                                                                                                            echo "MG";
                                                                                                                                                                                                                        }
                                                                                                                                                                                                                        if ($pro_type_show['protype_id'] == 4) {
                                                                                                                                                                                                                            echo "RG";
                                                                                                                                                                                                                        }
                                                                                                                                                                                                                        if ($pro_type_show['protype_id'] == 5) {
                                                                                                                                                                                                                            echo "PG";
                                                                                                                                                                                                                        } ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </datalist>

                                                    </td>
                                                    <td valign=middle class='text-center'><input class='form-control' type='text' name='txtAmount[]' required=''></td>
                                                    <td valign=middle class='text-center'><input class='btn btn-primary' type='button' name='add' id='add' value='Add'></td>
                                                </tr>

                                            </table>
                                        </div>
                                        <!-- <label style="font-family: 'Noto Sans Lao', sans-serif;" for="fname"><i class="fa fa-user"></i> ຊື່ສິນຄ້າ</label>
                                        <input type="text" id="fname" name="owner" placeholder="" required>
                                        <label style="font-family: 'Noto Sans Lao', sans-serif;" for="email"><i class="fa fa-phone"></i> ປະເພດສິນຄ້າ</label>
                                        <input type="text" id="email" name="phone_number" placeholder="ເບີໂທ ຫຼື ເບີວອດແອັບ" required>
                                        <label style="font-family: 'Noto Sans Lao', sans-serif;" for="adr"><i class="fa fa-address-card-o"></i> ຈຳນວນ</label>
                                        <input type="text" id="adr" name="address" placeholder="ໃສ່ຊື່ເມືອງ ແລະ ຊື່ບ້ານ ຫຼື ລິ້ງ Google Map" required>
                                        <label style="font-family: 'Noto Sans Lao', sans-serif;" for="fname"> ຊື່ຜູ້ສະໜອງ</label> -->
                                        <!-- <script>
                                            $('.message').keypress(function(event) {
                                                if (event.which == 13) {
                                                    event.preventDefault();
                                                    this.value = this.value + "<br/>";
                                                }
                                            });
                                        </script> -->
                                    </div>
                                </div>
                                <label>
                                </label>
                                <input type="submit" href="" name="submit" style="width: 100%;" class="btn btn-success text-uppercase mr-2 px-4" value="Purchase"></i>
                            </form>
                            <?php
                            $tr = "<tr><td valign=middle class='text-center'><input class='form-control' list='datalistOptions' name='txtID[]' id='exampleDataList' placeholder='Type to search...'><datalist id='datalistOptions'></option>  </datalist></td><td valign=middle class='text-center'><input class='form-control' type='text' name='txtAmount[]' required=''></td><td valign=middle class='text-center'><input class='btn btn-danger' type='button' name='remove' id='remove' value='Remove'></td></tr>";
                            ?>
                            <script type="text/javascript">
                                $(document).ready(function() {
                                    var html = "<?php echo $tr ?>";
                                    $("#add").click(function() {
                                        $("#table_field").append(html);
                                    });

                                    $("#table_field").on('click', '#remove', function() {
                                        $(this).closest("tr").remove();
                                    });

                                });
                            </script>
                            <?php if (isset($_POST['submit'])) {
                                $supplier_id = $_POST['supplier_id'];
                                $product_id = $_POST['txtID'];
                                $txtAmount = $_POST['txtAmount'];

                                date_default_timezone_set("Asia/Bangkok");
                                $order_date = date("Y-m-d H:i:s");
                                $purchase = "INSERT INTO tb_orderproduct (supplier_id ,employee_id ,order_date, status) VALUES ($supplier_id ,$user_id ,'$order_date', 0)";
                                $save = mysqli_query($conn, $purchase);
                                $data = "SELECT order_id FROM tb_orderproduct ORDER BY order_id DESC";
                                $drag = mysqli_query($conn, $data);
                                $fetch = mysqli_fetch_array($drag);
                                $order_id = $fetch['order_id'];
                                foreach ($product_id as $key => $value) {
                                    $insert = "INSERT INTO tb_orderproduct_detail (order_id, product_id , amount) VALUES ('" . $order_id . "', '" . $product_id[$key] . "', '" . $txtAmount[$key] . "')";
                                    $add = mysqli_query($conn, $insert);
                                }
                                if ($purchase && $insert) {
                                    echo "<script>alert('Success')
                                    location.href='orderProduct.php';</script>";
                                }
                            }
                            ?>
                        </div>
                    </div>

                </div>
                <br>
                <?php
                $data2 = "SELECT * FROM tb_orderproduct_detail INNER JOIN tb_orderproduct ON tb_orderproduct.order_id=tb_orderproduct_detail.order_id WHERE tb_orderproduct.status = 0 ORDER BY tb_orderproduct_detail.order_id DESC";
                $drag2 = mysqli_query($conn, $data2);
                $count = mysqli_num_rows($drag2);
                if ($count > 0) {
                ?>
                    <a href="print/printOrderProduct.php" class="btn btn-primary float-end my-3">Print</a>
                    <div>
                        <table class="table table-hover table-bordered" id="table_field">
                            <thead>
                                <th valign=middle class="text-center">ເລກໃບບິນ</th>
                                <th valign=middle class="text-center">ລະຫັດສິນຄ້າ</th>
                                <th valign=middle class="text-center">ຊື່ສິນຄ້າ</th>
                                <th valign=middle class="text-center">ປະເພດສິນຄ້າ</th>
                                <th valign=middle class="text-center">ຈຳນວນ</th>
                            </thead>
                            <tbody>
                                <?php
                                while ($fetch2 = mysqli_fetch_array($drag2)) {
                                    $pro_id = $fetch2['product_id'];
                                ?>
                                    <tr>
                                        <td valign=middle class="text-center"><?php echo $fetch2['order_id'] ?></td>
                                        <td valign=middle class="text-center"><?php echo $fetch2['product_id'] ?></td>
                                        <td valign=middle class="text-center"><?php $pro_name = "SELECT * FROM tb_product WHERE product_id = $pro_id";
                                                                                $pro_name_run = mysqli_query($conn, $pro_name);
                                                                                $pro_name_show = mysqli_fetch_array($pro_name_run);
                                                                                echo $pro_name_show['name'];
                                                                                ?></td>
                                        <td valign=middle class="text-center"><?php $pro_type = "SELECT * FROM tb_product WHERE product_id = $pro_id";
                                                                                $pro_type_run = mysqli_query($conn, $pro_type);
                                                                                $pro_type_show = mysqli_fetch_array($pro_type_run);
                                                                                if ($pro_type_show['protype_id'] == 1) {
                                                                                    echo "SD";
                                                                                }
                                                                                if ($pro_type_show['protype_id'] == 2) {
                                                                                    echo "HG";
                                                                                }
                                                                                if ($pro_type_show['protype_id'] == 3) {
                                                                                    echo "MG";
                                                                                }
                                                                                if ($pro_type_show['protype_id'] == 4) {
                                                                                    echo "RG";
                                                                                }
                                                                                if ($pro_type_show['protype_id'] == 5) {
                                                                                    echo "PG";
                                                                                } ?></td>
                                        <td valign=middle class="text-center"><?php echo $fetch2['amount'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <?php  } ?>
        </div>
    </main>
    <?php

    // if (isset($_POST[''])) {
    //     $ownername = $_POST['owner'];
    //     $phone_number = $_POST['phone_number'];
    //     $address = $_POST['address'];
    //     $supplier = $_POST['supplier'];
    //     $product = $_POST['product'];
    //     date_default_timezone_set("Asia/Bangkok");
    //     $order_date = date("Y-m-d H:i:s");
    //     // $timestamp = strtotime($date);
    //     // $order_date = date("d-m-Y H:i:s", $timestamp);
    //     $amount;
    //     echo $ownername, $phone_number, $address, $supplier, $product;
    //     $sql = "INSERT INTO tb_orderproduct (status, order_date, readStatus) VALUES (0, '$order_date', 0)";
    //     $query = mysqli_query($conn, $sql);

    //     $SelectDetail = "SELECT order_id FROM tb_orderProduct ORDER BY order_id DESC";
    //     $queryDetail = mysqli_query($conn, $SelectDetail);
    //     $D = mysqli_fetch_array($queryDetail);
    //     $order_id = $D['order_id'];

    //     $sql2 = "INSERT INTO tb_orderproduct_detail (order_id, order_list, owner_name, phone_number, address, supplier_name) VALUES ($order_id, '$product', '$ownername', '$phone_number', '$address', '$supplier')";
    //     $query2 = mysqli_query($conn, $sql2);

    //     if ($query && $query2) {
    //         header("location: CompletePayment.php?role=admin");
    //     }
    // $sql2 = "INSERT INTO tb_orderproduct_detail (order_date, customer_id, status, readStatus) VALUES ('$order_date', $user_id, 0, 0)";
    // $query2 = mysqli_query($conn, $sql2);


    // $detail = "INSERT INTO tb_productDetail (order_id, product_name, price, amount, firstname, lastname, phone_number, address, house_id) VALUES ($order_id, '$product_name', $price, $amount, '$firstname', '$lastname', '$phone_number', '$address', $house_id)";
    // $addDetail = mysqli_query($conn, $detail);
    // if ($query && $insertDetail) {
    //     $sql3 = "SELECT * FROM tb_cart WHERE user_id = $user_id";
    //     $check = mysqli_query($conn, $sql3);
    //     // echo [$_SESSION['tb_cart']];
    //     foreach ($check as $update) {
    //         $p_quantity = $update['amount'];
    //         $p_id = $update['product_id'];
    //         $sql4 = "UPDATE tb_product SET amount = amount - $p_quantity WHERE product_id = $p_id";
    //         $q1 = mysqli_query($conn, $sql4);
    //     }

    //     $delete = "DELETE FROM tb_cart WHERE user_id = $user_id";
    //     $perform = mysqli_query($conn, $delete);
    //     header("location: CompletePayment.php");
    // $stock = "UPDATE tb_product SET amount - $quantity WHERE product_id = $product_id";
    // }
    // }

    ?>
    <div class="mt-5"></div>
    <footer>

    </footer>
</body>
</head>
<script src="Resources/js/dropdown.js"></script>

</html>
<?php
ob_end_flush();
?>