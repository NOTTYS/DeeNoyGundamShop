<!doctype html>
<html lang="en">

<head>
    <?php
    session_start();
    include_once('Database/db.con.php');
    include_once('functions.php');
    $fetchdata = new DB_con();
    @$userid = $_SESSION['customerid'];
    $sql = $fetchdata->fetchonerecord($userid);
    ?>
    <?php
    include('supplier_check.php');

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
</head>

<body>
    <header>
        <?php include('headerForSupplier.php') ?>
    </header>

    <main>
        <br>
        <h1 class="text-center fw-bold">ແຈ້ງເຕືອນການສັ່ງຊື້ສິນຄ້າ</h1>
        <br>
        <div class="container">
            <table id="mytable" class="table table-bordered table-striped">
                <thead style="background-color: pink;">
                    <th class="text-center">ເລກໃບບິນ</th>
                    <th class="text-center">ວັນທີເດືອນປີສັ່ງຊື້</th>
                    <th class="text-center">ລາຍລະອຽດ</th>
                    <th class="text-center">ສະຖານະຂໍ້ຄວາມ</th>
                    <th class="text-center">ສະຖານະການສັ່ງຊື້</th>
                </thead>
                <tbody>
                    <?php
                    $fetchdata = new DB_con();
                    $user_id = $_SESSION['customerid'];
                    $sql = "SELECT * FROM tb_orderproduct ORDER BY order_id DESC";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <?php
                            ?>
                            <form action="POST">
                                <td style="width: 2rem;" valign=middle class="text-center"><?php echo $row['order_id'] ?></td>
                                <td style="width: 8rem;" valign=middle class="text-center"><?php echo $row['order_date'] ?></td>
                                <td style="width: 5rem;" valign=middle class="text-center"><a href="exportDetail.php?id=<?php echo $row['order_id'] ?>" name="submit" type="button" style="background-color: orange; text-decoration: none; border-color: orange;" class="btn btn-primary">View</a></td>
                                <td id="read" style="width: 5rem;" valign=middle class="text-center">
                                    <p><?php
                                        if ($row['readStatus'] == "0") {
                                            echo "<p style='color: red'>ຍັງບໍ່ອ່ານ</p>";
                                        } else if ($row['readStatus'] == "1") {
                                            echo "<p style='color: green'>ອ່ານແລ້ວ</p>";
                                        } ?></p>
                                        
                                </td>
                                <td id="read" style="width: 5rem;" valign=middle class="text-center">
                                    <p><?php
                                        if ($row['status'] == 0) {
                                            echo "ກຳລັງລໍຖ້າການຕອບກັບ";
                                        } else if ($row['status'] == 1) {
                                            echo "ຕົກລົງການສັ່ງຊື້";
                                        } else if ($row['status'] == 2) {
                                            echo "ຍົກເລີກການສັ່ງຊື້";
                                        }?></p>
                                        
                                </td>
                            </form>
                        </tr>
                    <?php
                    }
                    ?>
                    
                    <script>
                        // function send(id, answer) {
                        //     var orderid = id
                        //     $.ajax("Response.php", {
                        //         type: 'POST',
                        //         data: {
                        //             id: orderid, answer
                        //         },
                        //         success: function(data, status) {
                                    
                        //         }
                        //     }, )
                        //     refresh()
                        // };

                        // function changeContent(id) {
                        //     var orderid = id
                        //     $.ajax("exportDetail.php", {
                        //         type: 'POST',
                        //         data: {
                        //             id: orderid
                        //         },
                        //         success: function(data, status) {
                        //             $(".modal-body").html(data);
                        //         }
                        //     }, )
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
                </tbody>
            </table>
            <?php if (!$count) {
                echo '<h3 class="text-center">ບໍ່ມີຂໍ້ມູນການສັ່ງຊື້</h3>';
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