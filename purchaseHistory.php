<!DOCTYPE html>
<html lang="en">
<?php session_start();
if (!isset($_SESSION['customerid'])) {
    echo "<script>alert('ກະລຸນາ Login ກ່ອນ')
    window.location.href='login.php'</script>";
}
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
    <link rel="icon" type="image/png, image/jpg, image/jpeg" href="Resources/images/02.png">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>
<style>

</style>

<body>
    <header id="header">
        <?php include('header.php'); ?>
    </header>

    <main id="main">
        <h1 style="font-family: 'Noto Sans Lao', sans-serif;" class="text-center fw-bold my-3">ປະຫວັດການສັ່ງຊື້</h1>
        <br>
        <div class="container">
            <table id="mytable" class="table table-bordered table-striped">
                <thead style="background-color: pink;">
                    <th style="font-family: 'Noto Sans Lao', sans-serif;" class="text-center">ເລກທີໃບບິນ</th>
                    <th style="font-family: 'Noto Sans Lao', sans-serif;" class="text-center">ວັນທີເດືອນປີສັ່ງຊື້</th>
                    <th style="font-family: 'Noto Sans Lao', sans-serif;" class="text-center">ຍອດລວມ</th>
                    <th style="font-family: 'Noto Sans Lao', sans-serif;" class="text-center">ລາຍລະອຽດ</th>
                    <th style="font-family: 'Noto Sans Lao', sans-serif;" class="text-center">ພິມໃບບິນ</th>
                </thead>
                <tbody>
                    <?php
                    $fetchdata = new DB_con();
                    $user_id = $_SESSION['customerid'];
                    $sql = "SELECT * FROM tb_order WHERE customer_id = $user_id ORDER BY order_date DESC";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <?php
                            ?>
                            <td style="width: 2rem;" valign=middle class="text-center"><?php echo $row['order_id'] ?></td>
                            <td style="width: 8rem;" valign=middle class="text-center"><?php echo $row['order_date'] ?></td>
                            <td style="width: 15rem;" valign=middle class="text-center"><?php echo number_format($row['total_price']) ?></td>
                            <td style="width: 5rem;" valign=middle class="text-center"><a onclick="changeContent(<?php echo $row['order_id'] ?>, <?php echo $user_id ?>)" name="submit" id="action_<?php echo $row['order_id'] ?>" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">View</a></td>
                            <td style="width: 5rem;" valign=middle class="text-center"><a href="invoice.php?id=<?php echo $row['order_id'] ?>" class="btn btn-secondary">Print</a></td>

                        </tr>
                    <?php
                    }
                    ?>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <button id="refresh" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="demo"></div>
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