<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/png, image/jpg, image/jpeg" href="Resources/images/02.png">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>

    <div class="container">

        <?php
        session_start();
        include('Database/db.con.php');
        include('functions.php');
        $order_id = $_GET['id'];

        $sql = "SELECT * FROM tb_orderproduct_detail INNER JOIN tb_orderproduct ON tb_orderproduct_detail.order_id=tb_orderproduct.order_id WHERE tb_orderproduct_detail.order_id = $order_id";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);
        $count = mysqli_num_rows($query);
        if ($count == 0) {
            echo '<a href="orderProductDetail.php" class="btn btn-primary my-4">Back</a>';
            echo "ບໍ່ມີສິນຄ້າ";
            $delete = "DELETE FROM tb_orderproduct WHERE order_id = $order_id";
            $query = mysqli_query($conn, $delete);
        } else if ($count > 0 && $row['status'] == 0) {
        ?>
            <a href="orderProductDetail.php" class="btn btn-primary my-4">Back</a>
            <h4 style="font-family: 'Noto Sans Lao', sans-serif;" class=''>ໃບສັ່ງຊື້ເລກທີ: <?php echo $order_id ?></h4>
            <h4 style="font-family: 'Noto Sans Lao', sans-serif;" class=''>ຊື່ຜູ້ສັ່ງຊື້: <?php $employee_id = $row['employee_id'];
                                                                                            $emp = "SELECT firstname, lastname FROM tb_customer WHERE customer_id = $employee_id";
                                                                                            $emp_run = mysqli_query($conn, $emp);
                                                                                            $emp_row = mysqli_fetch_array($emp_run);
                                                                                            echo $emp_row['firstname'] . ' ' . $emp_row['lastname']; ?></h4>
            <h4 style="font-family: 'Noto Sans Lao', sans-serif;" class=''>ຊື່ຜູ້ສະໜອງ: <?php $supplier_id = $row['supplier_id'];
                                                                                        $sup = "SELECT companyname FROM tb_supplier WHERE supplier_id = $supplier_id";
                                                                                        $sup_run = mysqli_query($conn, $sup);
                                                                                        $sup_row = mysqli_fetch_array($sup_run);
                                                                                        echo $sup_row['companyname']; ?></h4>
            <h4 style="font-family: 'Noto Sans Lao', sans-serif;" class=''>ສິນຄ້າທີ່ສັ່ງຊື້:</h4>
            <table class="table-responsive">
                <?php
                foreach ($query as $product) {
                    $pro_id = $product['product_id'];
                ?>
                    <tr>
                        <div class="row d-inline-flex">
                            <div class="col">
                                <form action="" method="POST">
                                    <label style="font-family: 'Noto Sans Lao', sans-serif;" for="">ລະຫັດສິນຄ້າ</label>
                                    <input class="form-control" type="text" name="txtID[]" value="<?php echo $product['product_id'] ?>" required="">
                            </div>
                            <div class="col">
                                <label style="font-family: 'Noto Sans Lao', sans-serif;" for="">ຊື່ສິນຄ້າ</label>
                                <input class="w-auto form-control" id="typing" class="form-control" type="text" value="<?php $pro_name = "SELECT * FROM tb_product WHERE product_id = $pro_id";
                                                                                                                        $pro_name_run = mysqli_query($conn, $pro_name);
                                                                                                                        $pro_name_show = mysqli_fetch_array($pro_name_run);
                                                                                                                        echo $pro_name_show['name']; ?>" name="txtProductName[]" required="" disabled>
                            </div>
                            <div class="col">
                                <label style="font-family: 'Noto Sans Lao', sans-serif;" for="">ປະເພດສິນຄ້າ</label>
                                <input class="form-control" type="text" name="txtProductType[]" value="<?php $pro_type = "SELECT * FROM tb_product WHERE product_id = $pro_id";
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
                                                                                                        } ?>" required="" disabled>
                            </div>
                            <div class="col">
                                <label style="font-family: 'Noto Sans Lao', sans-serif;" for="">ຈຳນວນ</label>
                                <input class="form-control" type="text" id="amount" name="txtAmount[]" value="<?php echo @$product['amount'] ?>" required="">
                            </div>
                            <div class="col">
                                <label style="font-family: 'Noto Sans Lao', sans-serif;" for="">ລາຄາຊື້</label>

                                <div class="d-flex">
                                    <input style="width: 150px;" class="form-control" id="price" type="number" name="txtPrice[]" value="" min="0" required="">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label style="font-family: 'Noto Sans Lao', sans-serif;" for="">ລາຄາຊື້</label>
                                    &nbsp;
                                    <input style="width: 150px; font-family: 'Noto Sans Lao', sans-serif;" class="form-control" id="priceforsale" type="number" name="txtPriceforsale[]" min="0" value="<?php $pro_price = $conn->query("SELECT * FROM tb_product WHERE product_id = $pro_id");
                                                                                                                                                                                                        $pro_price_show = mysqli_fetch_array($pro_price);
                                                                                                                                                                                                        echo $pro_price_show['price']; ?>" placeholder="ລາຄາຂາຍ">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a class="btn btn-danger" href="delete.php?id=<?php echo @$product['orderprodetail_id'] ?>&page=import" type="button" name="cancel" id="cancel_<?php echo @$product['orderprodetail_id'] ?>" value="">Delete</a>

                                </div>
                            </div>
                        </div>
                    </tr>
    </div>
<?php
                }
?>
</table>
<div class="text-center my-3">
    <input type="submit" name="submit" class="btn btn-success px-4" value="Import">
    <input type="submit" name="submit2" class="btn btn-danger mx-3 px-4" value="Cancel Order">
</div>
</form>
</div>
<?php
        } else { ?>
    <a href="orderProductDetail.php" class="btn btn-primary my-4">Back</a>
    <div class="d-flex">
        <h3 style="font-family: 'Noto Sans Lao', sans-serif;" class=''>ສະຖານະ: <?php if ($row['status'] == 1) { ?>
                &nbsp;<h3 style="font-family: 'Noto Sans Lao', sans-serif; color:green">ການສັ່ງຊື້ສຳເລັດ</h3>
            <?php  } else if ($row['status'] == 2) { ?>
                &nbsp;<h3 style="font-family: 'Noto Sans Lao', sans-serif; color:red">ການສັ່ງຊື້ບໍ່ສຳເລັດ</h3>
            <?php } ?></h3>
    </div>
    <h4 style="font-family: 'Noto Sans Lao', sans-serif;" class=''>ໃບສັ່ງຊື້ເລກທີ: <?php echo $order_id ?></h4>
    <h4 style="font-family: 'Noto Sans Lao', sans-serif;" class=''>ຊື່ຜູ້ສັ່ງຊື້: <?php $employee_id = $row['employee_id'];
                                                                                    $emp = "SELECT firstname, lastname FROM tb_customer WHERE customer_id = $employee_id";
                                                                                    $emp_run = mysqli_query($conn, $emp);
                                                                                    $emp_row = mysqli_fetch_array($emp_run);
                                                                                    echo $emp_row['firstname'] . ' ' . $emp_row['lastname']; ?></h4>
    <h4 style="font-family: 'Noto Sans Lao', sans-serif;" class=''>ຊື່ຜູ້ສະໜອງ: <?php $supplier_id = $row['supplier_id'];
                                                                                $sup = "SELECT companyname FROM tb_supplier WHERE supplier_id = $supplier_id";
                                                                                $sup_run = mysqli_query($conn, $sup);
                                                                                $sup_row = mysqli_fetch_array($sup_run);
                                                                                echo $sup_row['companyname']; ?></h4>
    <h4 style="font-family: 'Noto Sans Lao', sans-serif;" class=''>ສິນຄ້າທີ່ສັ່ງຊື້:</h4>
    <table class="table-responsive">
        <?php
            foreach ($query as $product) {
                $pro_id = $product['product_id'];
        ?>
            <tr>
                <div class="row d-inline-flex">
                    <div class="col">
                        <form action="" method="POST">
                            <label style="font-family: 'Noto Sans Lao', sans-serif;" for="">ລະຫັດສິນຄ້າ</label>
                            <input class="form-control" type="text" name="txtID[]" value="<?php echo $product['product_id'] ?>" required="" disabled>
                    </div>
                    <div class="col">
                        <label style="font-family: 'Noto Sans Lao', sans-serif;" for="">ຊື່ສິນຄ້າ</label>
                        <input class="w-auto form-control" id="typing" class="form-control" type="text" value="<?php $pro_name = "SELECT * FROM tb_product WHERE product_id = $pro_id";
                                                                                                                $pro_name_run = mysqli_query($conn, $pro_name);
                                                                                                                $pro_name_show = mysqli_fetch_array($pro_name_run);
                                                                                                                echo $pro_name_show['name']; ?>" name="txtProductName[]" required="" disabled>
                    </div>
                    <div class="col">
                        <label style="font-family: 'Noto Sans Lao', sans-serif;" for="">ປະເພດສິນຄ້າ</label>
                        <input class="form-control" type="text" name="txtProductType[]" value="<?php $pro_type = "SELECT * FROM tb_product WHERE product_id = $pro_id";
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
                                                                                                }  ?>" required="" disabled>
                    </div>
                    <div class="col">
                        <label style="font-family: 'Noto Sans Lao', sans-serif;" for="">ຈຳນວນ</label>
                        <input class="form-control" type="text" id="amount" name="txtAmount[]" value="<?php echo @$product['amount'] ?>" required="" disabled>
                    </div>
                    <div class="col">
                        <label style="font-family: 'Noto Sans Lao', sans-serif;" for="">ລາຄາຊື້</label>

                        <div class="d-flex">
                            <input style="width: 150px;" class="form-control" id="price" type="number" name="txtPrice[]" value="<?php $buy = "SELECT * FROM tb_import_detail WHERE product_id = $pro_id";
                                                                                                                                $buy_run = mysqli_query($conn, $buy);
                                                                                                                                $buy_run_show = mysqli_fetch_array($buy_run);
                                                                                                                                echo $buy_run_show['price']; ?>" required="" disabled>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label style="font-family: 'Noto Sans Lao', sans-serif;" for="">ລາຄາຂາຍ</label>
                            &nbsp;
                            <input style="width: 150px; font-family: 'Noto Sans Lao', sans-serif;" class="form-control" id="priceforsale" type="number" name="txtPriceforsale[]" value="<?php $sell = "SELECT * FROM tb_product WHERE product_id = $pro_id";
                                                                                                                                                                                        $sell_run = mysqli_query($conn, $sell);
                                                                                                                                                                                        $sell_run_show = mysqli_fetch_array($sell_run);
                                                                                                                                                                                        echo $sell_run_show['price']; ?>" placeholder="ລາຄາຂາຍ" disabled>
                    <?php
                }
            }
            if (isset($_POST['submit'])) {

                //Insert to tb_import
                date_default_timezone_set("Asia/Bangkok");
                $import_date = date("Y-m-d H:i:s");
                @$import = "INSERT INTO tb_import (import_date, order_id) VALUES ('$import_date', $order_id)";
                @$import_run = mysqli_query($conn, $import);
                //Fetch import_id from tb_import
                $import2 = "SELECT import_id from tb_import ORDER BY import_id DESC";
                $import_run2 = mysqli_query($conn, $import2);
                $import_fetch = mysqli_fetch_array($import_run2);
                $import_id = $import_fetch['import_id'];



                //Insert to tb_import_detail
                foreach ($query as $key => $value) {
                    $product_id = $_POST['txtID'];
                    $product_amount = $_POST['txtAmount'];
                    $product_price = $_POST['txtPrice'];
                    $product_priceforsale = $_POST['txtPriceforsale'];

                    $import_detail = "INSERT INTO tb_import_detail (import_id, product_id, amount, price) VALUES ('" . $import_id . "', '" . $product_id[$key] . "', '" . $product_amount[$key] . "', '" . $product_price[$key] . "')";
                    $import_detail_run = mysqli_query($conn, $import_detail);

                    $pro = "SELECT product_id, amount FROM tb_product WHERE product_id = '" . $product_id[$key] . "'";
                    $pro_run = mysqli_query($conn, $pro);
                    $pro_fetch = mysqli_fetch_array($pro_run);
                    $pro_id = $pro_fetch['product_id'];

                    $update_orderproduct = "UPDATE tb_orderproduct SET status = 1 WHERE order_id = $order_id";
                    $update_orderproduct_run = mysqli_query($conn, $update_orderproduct);

                    if ($pro_id == $product_id[$key]) {
                        $update_amount = "UPDATE tb_product SET amount = amount + '" . $product_amount[$key] . "' WHERE product_id = '" . $product_id[$key] . "'";
                        $update_amount_run = mysqli_query($conn, $update_amount);
                        if ($product_priceforsale[$key] > 0) {
                            $update_price = "UPDATE tb_product SET price = '" . $product_priceforsale[$key] . "' WHERE product_id = '" . $product_id[$key] . "'";
                            $update_price_run = mysqli_query($conn, $update_price);
                            if ($update_price_run) {
                                echo "<script>alert('ເພິ່ມສະຕ໋ອກສຳລັດ')
            window.location.href='orderProductDetail.php'</script>";
                            }
                        } else {
                            echo "<script>alert('ເພິ່ມສະຕ໋ອກສຳລັດ')
            window.location.href='orderProductDetail.php'</script>";
                        }
                    }
                }
            }
            if (isset($_POST['submit2'])) {
                $update_orderproduct = "UPDATE tb_orderproduct SET status = 2 WHERE order_id = $order_id";
                $update_orderproduct_run = mysqli_query($conn, $update_orderproduct);
                echo "<script>alert('ຍົກເລີກສຳເລັດ')
            window.location.href='orderProductDetail.php'</script>";
            }
                    ?>
                    <script>
                        // function deleteImport(id, page) {
                        //     $.get("delete.php", {
                        //         id: id,
                        //         page
                        //     }, function(data, status) {
                        //         loaddd();
                        //         alert('ລົບຂໍ້ມູນສຳເລັດ')
                        //         window.location.href = 'ShowPr';
                        //     });

                        // };
                    </script>

</body>

</html>