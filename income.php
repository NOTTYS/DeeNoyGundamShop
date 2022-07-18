<!DOCTYPE html>
<html lang="en">
<?php session_start();
include('admin_check.php');
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
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png, image/jpg, image/jpeg" href="Resources/images/02.png">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>
<style>

</style>

<body>
    <header id="header">
        <?php include('headerForAdmin.php'); ?>
    </header>
    <?php
    $sql_command = "SELECT SUM(total_price) FROM tb_order";
    $run = mysqli_query($conn, $sql_command);
    $fetch = mysqli_fetch_array($run);

    $sql_command3 = "SELECT * FROM tb_order";
    $run3 = mysqli_query($conn, $sql_command3);
    $countRow = mysqli_num_rows($run3);

    $sql_command4 = "SELECT SUM(amount) FROM tb_orderdetail";
    $run4 = mysqli_query($conn, $sql_command4);
    $fetch4 = mysqli_fetch_array($run4);

    $sql_command5 = "SELECT * FROM tb_orderdetail";
    $run5 = mysqli_query($conn, $sql_command5);
    $fetch5 = mysqli_fetch_array($run5);
    ?>
    <main id="main">
        <h1 style="font-family: 'Noto Sans Lao', sans-serif;" class="text-center fw-bold">ລາຍຮັບ</h1>
        <br>
        <div class="container">
            <form action="" method="POST">
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">From Date</label>
                            <input id="from_date" type="date" name="from_date" class="form-control" value="<?php if (isset($_POST['from_date'])) {
                                                                                                                echo $_POST['from_date'];
                                                                                                            } ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">To Date</label>
                            <input id="to_date" type="date" name="to_date" class="form-control" value="<?php if (isset($_POST['to_date'])) {
                                                                                                            echo $_POST['to_date'];
                                                                                                        } ?>">
                            <br>
                        </div>
                    </div>

                    <br>
                    <div align="right">
                        <button type="submit" name="submit" class="btn btn-success">Filter</button>
                        <button onclick="clearform()" class="btn btn-warning">Clear Inputs</button>
                        <a href="print/printIncome.php?from_date=<?php if (isset($_POST['from_date'])) {
                                                                        echo $_POST['from_date'];
                                                                    } ?>&to_date=<?php if (isset($_POST['to_date'])) {
                                                                                        echo $_POST['to_date'];
                                                                                    } ?>" class="btn btn-primary">Print</a>
                    </div>

                </div>
            </form>
            <form action="" method="post">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">ເລກໃບບິນ</label>
                        <input required id="from_date" type="number" name="number" class="form-control" value="<?php if (isset($_POST['number'])) {
                                                                                                                    echo $_POST['number'];
                                                                                                                } ?>">
                        <br>
                        <div>
                            <input type="submit" name="go" value="search" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </form>
            <br>
            <table id="mytable" class="table table-bordered table-striped">
                <thead style="background-color: pink;">
                    <th class="text-center">ເລກທີໃບບິນ</th>
                    <th class="text-center">ຊື່ລູກຄ້າ</th>
                    <th class="text-center">ປີ/ເດືອນ/ວັນທີສັ່ງຊື້</th>
                    <th class="text-center">ລາຄາ</th>
                    <th class="text-center">ລາຍລະອຽດ</th>
                    <th class="text-center">Print</th>
                    <th class="text-center">Delete</th>
                </thead>
                <tbody>
                    <script>
                        function clearform() {
                            document.getElementById("from_date").value = "";
                            document.getElementById("to_date").value = "";
                            document.getElementById("number").value = "";
                        }
                    </script>
                    <?php
                    if (isset($_POST['submit'])) {
                        if (!@$_POST['form_date'] && !@$_POST['to_date']) {
                            echo "<script>alert('ກະລຸນາເລືອກວັນເດືຶອນປີ')
                            window.location.href = 'income.php'
                            </script>";
                        }
                        // } else {

                        $fetchdata = new DB_con();
                        $user_id = $_SESSION['customerid'];
                        $from_date = $_POST['from_date'];
                        $to_date = $_POST['to_date'];
                        // $totalOfExpenses = $_POST['$totalOfExpenses'];
                        // $totalOfEarning = $_POST['$totalOfEarning'];
                        $sql = "SELECT * FROM tb_order INNER JOIN tb_orderdetail ON tb_order.order_id=tb_orderdetail.order_id WHERE order_date BETWEEN '$from_date' AND '$to_date' GROUP BY tb_orderdetail.order_id ORDER BY order_date DESC";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        $totalOfIncome = 0;
                        if ($count > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                    ?>
                                <tr>
                                    <?php
                                    $totalOfIncome = $totalOfIncome + $row['total_price'];
                                    ?>
                                    <td autofocus="autofocus" style="width: 2rem;" valign=middle class="text-center"><?php echo $row['order_id'] ?></td>
                                    <td style="width: 8rem;" valign=middle class="text-center"><?php echo $row['firstname'] . ' ' . $row['lastname'] ?></td>
                                    <td style="width: 8rem;" valign=middle class="text-center"><?php echo $row['order_date'] ?></td>
                                    <td style="width: 15rem;" valign=middle class="text-center"><?php echo number_format($row['total_price']) ?></td>
                                    <td style="width: 5rem;" valign=middle class="text-center"><a onclick="changeContent(<?php echo $row['order_id'] ?>)" name="submit" id="action_<?php echo $row['order_id'] ?>" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">View</a></td>
                                    <td style="width: 5rem;" valign=middle class="text-center"><a href="invoice.php?id=<?php echo $row['order_id'] ?>" class="btn btn-primary">Print</a></td>
                                    <td style="width: 5rem;" valign=middle class="text-center"><a href="invoiceDelete.php?id=<?php echo $row['order_id'] ?>" class="btn btn-danger">Delete</a></td>
                                </tr>

                            <?php
                            }

                            ?>

                            <h3 id="data" style='color: black; font-family: "Noto Sans Lao", sans-serif;' class='text-center'>ລາຍຮັບຊ່ວງເວລາ <?php echo $from_date . ' ຫາ ' . $to_date . ' ໃດ້ ' . number_format($totalOfIncome) ?> ກີບ</h3>
                            <script>
                                var el = document.getElementById('data');
                                el.scrollIntoView(true);
                            </script>
                        <?php
                        } else if ($count == 0) { ?>
                            <h3 style="color: white; font-family: 'Noto Sans Lao', sans-serif;" class='text-center'>ບໍ່ພົບຂໍ້ມູນ</h3>
                            <?php
                        }
                        // }
                    } else if (isset($_POST['go'])) {
                        @$number = $_POST['number'];
                        @$commandd = "SELECT * FROM tb_order INNER JOIN tb_orderdetail ON tb_order.order_id=tb_orderdetail.order_id WHERE tb_orderdetail.order_id = $number GROUP BY tb_orderdetail.order_id";
                        @$sql_runn = mysqli_query($conn, $commandd);
                        $countt =  mysqli_num_rows($sql_runn);
                        if ($countt > 0) {
                            while ($row = mysqli_fetch_array($sql_runn)) {
                            ?>
                                <tr id="focus">
                                    <?php
                                    ?>
                                    <td style="width: 2rem;" valign=middle class="text-center"><?php echo $row['order_id'] ?></td>
                                    <td style="width: 8rem;" valign=middle class="text-center"><?php echo $row['firstname'] . ' ' . $row['lastname'] ?></td>
                                    <td style="width: 8rem;" valign=middle class="text-center"><?php echo $row['order_date'] ?></td>
                                    <td style="width: 15rem;" valign=middle class="text-center"><?php echo number_format($row['total_price']) ?></td>
                                    <td style="width: 5rem;" valign=middle class="text-center"><a onclick="changeContent(<?php echo $row['order_id'] ?>)" name="submit" id="action_<?php echo $row['order_id'] ?>" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">View</a></td>
                                    <td style="width: 5rem;" valign=middle class="text-center"><a href="invoice.php?id=<?php echo $row['order_id'] ?>" class="btn btn-primary">Print</a></td>
                                    <td style="width: 5rem;" valign=middle class="text-center"><a href="invoiceDelete.php?id=<?php echo $row['order_id'] ?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                            <?php
                            } ?>
                            <script>
                                var el2 = document.getElementById('focus');
                                el2.scrollIntoView(true);
                            </script>
                            <?php
                        } else {
                            echo "<h3 style='color: white; font-family: 'Noto Sans Lao', sans-serif;' class='text-center'>ບໍ່ພົບຂໍ້ມູນ</h3>";
                        }
                    } else {
                        $fetchdata = new DB_con();
                        $user_id = $_SESSION['customerid'];
                        @$from_date = $_POST['from_date'];
                        @$to_date = $_POST['to_date'];
                        $sql = "SELECT * FROM tb_order INNER JOIN tb_orderdetail ON tb_order.order_id=tb_orderdetail.order_id GROUP BY tb_orderdetail.order_id ORDER BY order_date DESC";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <?php
                                    ?>
                                    <td style="width: 2rem;" valign=middle class="text-center"><?php echo $row['order_id'] ?></td>
                                    <td style="width: 8rem;" valign=middle class="text-center"><?php echo $row['firstname'] . ' ' . $row['lastname'] ?></td>
                                    <td style="width: 8rem;" valign=middle class="text-center"><?php echo $row['order_date'] ?></td>
                                    <td style="width: 15rem;" valign=middle class="text-center"><?php echo number_format($row['total_price']) ?></td>
                                    <td style="width: 5rem;" valign=middle class="text-center"><a onclick="changeContent(<?php echo $row['order_id'] ?>)" name="submit" id="action_<?php echo $row['order_id'] ?>" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">View</a></td>
                                    <td style="width: 5rem;" valign=middle class="text-center"><a href="invoice.php?id=<?php echo $row['order_id'] ?>" class="btn btn-primary">Print</a></td>
                                    <td style="width: 5rem;" valign=middle class="text-center"><a href="invoiceDelete.php?id=<?php echo $row['order_id'] ?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                    <?php
                            }
                        }
                    }

                    ?>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style='color: black; font-family: "Noto Sans Lao", sans-serif;' class="modal-title" id="exampleModalLabel">ລາຍລະອຽດການສັ່ງຊື້</h5>
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
                    <script>
                        function changeContent(id) {
                            var orderid = id
                            $.ajax("orderDetail.php", {
                                type: 'POST',
                                data: {
                                    id: orderid
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

                </tbody>
            </table>
        </div>
        <div style="height: 300px;">

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