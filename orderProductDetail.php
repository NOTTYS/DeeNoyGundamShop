<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>

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
    <link rel="icon" type="image/png, image/jpg, image/jpeg" href="Resources/images/02.png">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao&display=swap" rel="stylesheet">
    
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
        <h1 class="text-center fw-bold" style="font-family: 'Noto Sans Lao', sans-serif;">ລາຍການສັ່ງຊື້ສິນຄ້າເຂົ້າຮ້ານ</h1>
        <br>
        <div class="container">
            <table id="mytable" class="table table-bordered table-striped">
                <thead style="background-color: pink;">
                    <th class="text-center" style="font-family: 'Noto Sans Lao', sans-serif;">ລະຫັດໃບສັ່ງຊື້</th>
                    <th class="text-center" style="font-family: 'Noto Sans Lao', sans-serif;">ວັນທີເດືອນປີສັ່ງຊື້</th>
                    <th class="text-center" style="font-family: 'Noto Sans Lao', sans-serif;">ສະຖານະ</th>
                    <th class="text-center" style="font-family: 'Noto Sans Lao', sans-serif;">ຜູ້ສັ່ງຊື້</th>
                    <th class="text-center" style="font-family: 'Noto Sans Lao', sans-serif;">ຜູ້ສະໜອງ</th>
                    <th class="text-center" style="font-family: 'Noto Sans Lao', sans-serif;">ລາຍລະອຽດ</th>
                </thead>
                <tbody>
                    <?php
                    $fetchdata = new DB_con();
                    $user_id = $_SESSION['customerid'];
                    $sql = "SELECT * FROM tb_orderproduct ORDER BY order_date DESC";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <?php
                            ?>
                            <td style="width: 2rem;" valign=middle class="text-center"><?php echo $row['order_id'] ?></td>
                            <td style="width: 8rem;" valign=middle class="text-center"><?php echo $row['order_date'] ?></td>
                            
                            <td id="read" style="width: 5rem;" valign=middle class="text-center">
                                <p><?php
                                    if ($row['status'] == "0") { ?>
                                        <p style="font-family: 'Noto Sans Lao', sans-serif;">ກຳລັງລໍຖ້າການຕອບຮັບ</p>
                                        <?php
                                    } else if ($row['status'] == "1") { ?>
                                        <p style="color: green; font-family: 'Noto Sans Lao', sans-serif;">ການສັ່ງຊື້ສຳເລັດ</p>
                                        <?php
                                    } else if ($row['status'] == "2") { ?>
                                        <p style="color: red; font-family: 'Noto Sans Lao', sans-serif;">ການສັ່ງຊື້ບໍ່ສຳເລັດ</p>
                                        <?php
                                    } ?></p>
                            </td>
                            <td style="width: 8rem;" valign=middle class="text-center"><?php $employee_id = $row['employee_id']; $emp = "SELECT firstname, lastname FROM tb_customer WHERE customer_id = $employee_id"; $emp_run = mysqli_query($conn, $emp); $emp_row = mysqli_fetch_array($emp_run); echo $emp_row['firstname'].' '.$emp_row['lastname']; ?></td>
                            <td style="width: 8rem;" valign=middle class="text-center"><?php $supplier_id = $row['supplier_id']; $sup = "SELECT companyname FROM tb_supplier WHERE supplier_id = $supplier_id"; $sup_run = mysqli_query($conn, $sup); $sup_row = mysqli_fetch_array($sup_run); echo $sup_row['companyname']; ?></td>
                            <td style="width: 5rem;" valign=middle class="text-center"><a href="showProductDetail.php?id=<?php echo $row['order_id'] ?>" name="submit" id="action_<?php echo $row['order_id'] ?>" type="button" class="btn btn-primary">View</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Order Detail</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                    </div>
                                    <div class="modal-footer">
                                        <button onclick="refresh()" id="refresh" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        // function changeContent(id) {
                        //     var orderid = id
                        //     $.ajax("ShowProductDetail.php", {
                        //             type: 'POST',
                        //             data: {
                        //                 id: orderid
                        //             },
                        //             success: function(data, status) {
                        //                 $(".modal-body").html(data);
                        //             }

                        //         },
                        //         )
                        // };

                        // function refresh() {
                        //     setTimeout(function() {
                        //         window.location.reload();
                        //     }, 300);
                        // }
                        // function orderDetail(id) {
                        //     $.get("orderDetail.php", {
                        //         id: id,
                        //     }, function(data, status) {});

                        // };
                    </script>
                    <?php
                    $sql2 = "SELECT sum(price) FROM tb_cart WHERE user_id = $user_id";
                    $sql3 = "SELECT sum(amount) FROM tb_cart WHERE user_id = $user_id";
                    $result = mysqli_query($conn, $sql2);
                    $result2 = mysqli_query($conn, $sql3);
                    $row = mysqli_fetch_array($result);
                    $row2 = mysqli_fetch_array($result2);
                    ?>

                </tbody>
            </table>
            <?php if (!$count) {
                echo '<h3 class="text-center">ບໍ່ມີຂໍ້ມູນການສັ່ງຊື້</h3>';
            } ?>
        </div>
    </main>
    <div class="mt-5"></div>
    <footer id="footer" class="text-center text-lg-start bg-light text-muted footer">
        <?php include('footer.php'); ?>
    </footer>
</body>

</html>
</head>

</html>