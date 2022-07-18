<!doctype html>
<html lang="en">

<head>
    <?php
    session_start();
    include_once('Database/db.con.php');
    include_once('functions.php');
    $fetchdata = new DB_con();
    @$userid = $_SESSION['customerid'];
    $status = $_GET['status'];
    $sql = $fetchdata->fetchonerecord($userid);
    ?>
    <?php
    include('admin_check.php');

    ?>
    <title>DeeNoy Gundam Shop</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="icon" type="image/png, image/jpg, image/jpeg" href="Resources/images/02.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="Resources/css/gundamFont.css">
    <link rel="stylesheet" href="Resources/css/rainbow.css">
    <link rel="stylesheet" href="Resources/css/zoom.css">
    <link rel="stylesheet" href="Resources/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Armata&display=swap" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao&display=swap" rel="stylesheet">

</head>

<body>
    <header>
        <?php include('headerForAdmin.php') ?>
    </header>

    <main>
        <br>
        <h1 class="text-center fw-bold" style="font-family: 'Noto Sans Lao', sans-serif;">ແຈ້ງເຕືອນການສັ່ງຊື້ສິນຄ້າຈາກລູກຄ້າ</h1>
        <br>
        <div class="container">
            <table id="mytable" class="table table-bordered table-striped">
                <thead style="background-color: pink;">
                    <th class="text-center" style="font-family: 'Noto Sans Lao', sans-serif;">ເລກໃບບິນ</th>
                    <th class="text-center" style="font-family: 'Noto Sans Lao', sans-serif;">ວັນທີເດືອນປີສັ່ງຊື້</th>
                    <th class="text-center" style="font-family: 'Noto Sans Lao', sans-serif;">ລາຄາ</th>
                    <th class="text-center" style="font-family: 'Noto Sans Lao', sans-serif;">ລາຍລະອຽດ</th>
                    <th class="text-center" style="font-family: 'Noto Sans Lao', sans-serif;">ສະຖານະຂໍ້ຄວາມ</th>
                </thead>
                <tbody>
                    <?php

                    $fetchdata = new DB_con();
                    $user_id = $_SESSION['customerid'];
                    $sql = "SELECT * FROM tb_order WHERE readStatus = 0 ORDER BY order_date DESC";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);
                    if ($count > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <?php
                                ?>
                                <td style="width: 2rem;" valign=middle class="text-center"><?php echo $row['order_id'] ?></td>
                                <td style="width: 8rem;" valign=middle class="text-center"><?php echo $row['order_date'] ?></td>
                                <td style="width: 15rem;" valign=middle class="text-center"><?php echo number_format($row['total_price']) ?></td>
                                <td style="width: 5rem;" valign=middle class="text-center"><a onclick="changeContent(<?php echo $row['order_id'] ?>, <?php echo $user_id ?>)" name="submit" id="action_<?php echo $row['order_id'] ?>" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">View</a></td>
                                <td id="read" style="width: 5rem;" valign=middle class="text-center">
                                    <p><?php
                                        if ($row['readStatus'] == "0") { ?>
                                    <p style="color: red; font-family: 'Noto Sans Lao', sans-serif;">ຍັງບໍ່ໄດ້ອ່ານ</p>
                                <?php
                                        } else if ($row['readStatus'] == "1") { ?>
                                    <p style="color: red; font-family: 'Noto Sans Lao', sans-serif;">ອ່ານແລ້ວ</p>
                                <?php
                                        } ?></p>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                    <!-- Button trigger modal -->

                    <!-- Modal -->
                    <div onclick="refresh()" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
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
                        function changeContent(id, user_id) {
                            var orderid = id
                            $.ajax("orderDetail.php", {
                                type: 'POST',
                                data: {
                                    id: orderid,
                                    user_id
                                },
                                success: function(data, status) {
                                    $(".modal-body").html(data);
                                }
                            }, )
                        };

                        // function orderDetail(id) {
                        //     $.get("orderDetail.php", {
                        //         id: id,
                        //     }, function(data, status) {});

                        // };

                        function refresh() {
                            setTimeout(function() {
                                window.location.reload();
                            }, 300);
                        }
                    </script>
                </tbody>
            </table>
            <?php if (!$count) { ?>
                <h3 class="text-center" style="font-family: 'Noto Sans Lao', sans-serif;">ບໍ່ມີຂໍ້ມູນການສັ່ງຊື້</h3>
            <?php
            } ?>
        </div>
    </main>
    <br>
    <br>
    <!-- Bootstrap JavaScript Libraries -->
    <footer class="text-center text-lg-start bg-light text-muted footer">
        <?php include('footer.php'); ?>
    </footer>
</body>

</html>