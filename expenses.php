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
    <link rel="icon" type="image/png, image/jpg, image/jpeg" href="Resources/images/02.png">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao&display=swap" rel="stylesheet">

</head>
<style>

</style>

<body>
    <header id="header">
        <?php include('headerForAdmin.php'); ?>
    </header>
    <main id="main">
        <br>
        <h1 style="font-family: 'Noto Sans Lao', sans-serif;" class="text-center fw-bold">ລາຍຈ່າຍ</h1>
        <br>
        <div class="container">
            <hr>
            <form action="" method="POST">
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
                        <a href="print/printExpenses.php?from_date=<?php if (isset($_POST['from_date'])) {
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
                        <label for="">ເລກໃບສັ່ງຊື້</label>
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
            <table id="mytable" class="table table-bordered table-striped">
                <thead style="background-color: pink;">
                    <th class="text-center">ເລກທີໃບສັ່ງຊື້</th>
                    <th class="text-center">ວັນທີເດືອນປີນຳເຂົ້າ</th>
                    <th class="text-center">ລາຍລະອຽດ</th>
                </thead>
                <tbody>
                    <script>
                        function clearform() {
                            document.getElementById("from_date").value = "";
                            document.getElementById("to_date").value = "";
                            document.getElementById("number").value = "";
                        }
                    </script>
                    <br>
                    <?php
                    $totalOfIncome = 0;
                    if (isset($_POST['submit'])) {
                        $fetchdata = new DB_con();
                        if (!@$_POST['form_date'] && !@$_POST['to_date']) {
                            echo "<script>alert('ກະລຸນາເລືອກວັນເດືຶອນປີ')
                            window.location.href = 'expenses.php'
                            </script>";
                        }
                        $user_id = $_SESSION['customerid'];
                        $from_date = $_POST['from_date'];
                        $to_date = $_POST['to_date'];
                        $sql = "SELECT * FROM tb_import INNER JOIN tb_import_detail ON tb_import.import_id=tb_import_detail.import_id WHERE import_date BETWEEN '$from_date' AND '$to_date' GROUP BY tb_import.order_id ORDER BY import_date ASC;";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);

                        $total = "SELECT SUM(price) FROM tb_import INNER JOIN tb_import_detail ON tb_import.import_id=tb_import_detail.import_id WHERE import_date BETWEEN '$from_date' AND '$to_date'";
                        $total_run = mysqli_query($conn, $total);
                        $total_fetch = mysqli_fetch_array($total_run);
                        // $sql2 = "SELECT total_price FROM tb_orderproduct_detail";
                        // $result2 = mysqli_query($conn, $sql2);
                        if ($count > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                    ?>
                                <tr>
                                    <?php
                                    ?>
                                    <td style="width: 2rem;" valign=middle class="text-center"><?php echo $row['order_id'] ?></td>
                                    <td style="width: 8rem;" valign=middle class="text-center"><?php echo $row['import_date'] ?></td>
                                    <!-- <td style="width: 8rem;" valign=middle class="text-center"></td> -->
                                    <td style="width: 5rem;" valign=middle class="text-center"><a onclick="changeContent(<?php echo $row['order_id'] ?>)" name="submit" id="action_<?php echo $row['order_id'] ?>" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">View</a></td>
                                </tr>
                            <?php
                            } 
                            $sql3 = "SELECT SUM(salary) FROM tb_employee WHERE NOT position = 'Manager'";
                            $result3 = mysqli_query($conn, $sql3);
                            $fetch = mysqli_fetch_array($result3);
                            ?>
                            <h3 style='color: black; font-family: "Noto Sans Lao", sans-serif;' class='text-center'>ສິນຄ້ານຳເຂົ້າໃນຊ່ວງເວລາ <?php echo $from_date . ' ຫາ ' . $to_date . ' = ' . number_format($total_fetch[0]) ?> ກີບ</h3>
                            <h3 style='color: black; font-family: "Noto Sans Lao", sans-serif;' class='text-center'>ເງິນເດືອນພະນັກງານທີ່ຕ້ອງຈ່າຍ <?php echo number_format($fetch[0]) ?> ກີບ</h3>
                            <h3 id="focus" style='color: red; font-family: "Noto Sans Lao", sans-serif;' class='text-center'>ລວມລາຍຈ່າຍທັງໝົດ: - <?php echo number_format($total_fetch[0] + $fetch[0]) ?> ກີບ</h3>
                            <script>
                                var el2 = document.getElementById('focus');
                                el2.scrollIntoView(true);
                            </script>
                            <?php
                        } else {
                            echo "ບໍ່ພົບຂໍ້ມູນ";
                        }
                    } else if (isset($_POST['go'])) {
                        @$number = $_POST['number'];
                        @$commandd = "SELECT * FROM tb_import INNER JOIN tb_import_detail ON tb_import.import_id=tb_import_detail.import_id WHERE tb_import.order_id = '$number' GROUP BY tb_import.order_id";
                        @$sql_runn = mysqli_query($conn, $commandd);
                        $countt =  mysqli_num_rows($sql_runn);
                        if ($countt > 0) {
                            while ($row = mysqli_fetch_array($sql_runn)) {
                            ?>
                                <tr>
                                    <?php
                                    ?>
                                    <td style="width: 2rem;" valign=middle class="text-center"><?php echo $row['order_id'] ?></td>
                                    <td style="width: 8rem;" valign=middle class="text-center"><?php echo $row['import_date'] ?></td>
                                    <!-- <td style="width: 8rem;" valign=middle class="text-center"></td> -->
                                    <td style="width: 5rem;" valign=middle class="text-center"><a onclick="changeContent(<?php echo $row['order_id'] ?>)" name="submit" id="action_<?php echo $row['order_id'] ?>" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">View</a></td>
                                </tr>
                            <?php
                            }
                        } else {
                            echo "<h3 style='color: white; font-family: 'Noto Sans Lao', sans-serif;' class='text-center'>ບໍ່ພົບຂໍ້ມູນ</h3>";
                        }
                    } else {
                        $fetchdata = new DB_con();
                        $user_id = $_SESSION['customerid'];
                        @$from_date = $_POST['from_date'];
                        @$to_date = $_POST['to_date'];
                        $sql = "SELECT * FROM tb_import INNER JOIN tb_import_detail ON tb_import.import_id=tb_import_detail.import_id GROUP BY tb_import_detail.import_id ORDER BY import_date ASC";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        // $sql2 = "SELECT total_price FROM tb_orderproduct_detail";
                        // $result2 = mysqli_query($conn, $sql2);

                        if ($count > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <td style="width: 2rem;" valign=middle class="text-center"><?php echo $row['order_id'] ?></td>
                                    <td style="width: 8rem;" valign=middle class="text-center"><?php echo $row['import_date'] ?></td>
                                    <!-- <td style="width: 8rem;" valign=middle class="text-center"></td> -->
                                    <td style="width: 5rem;" valign=middle class="text-center"><a onclick="changeContent(<?php echo $row['order_id'] ?>)" name="submit" id="action_<?php echo $row['order_id'] ?>" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">View</a></td>
                                </tr>
                    <?php
                            }
                        }
                    }
                    ?>
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
                        function changeContent(id) {
                            var orderid = id
                            $.ajax("expensesDetail.php", {
                                type: 'POST',
                                data: {
                                    id: orderid
                                },
                                success: function(data, status) {
                                    $(".modal-body").html(data);
                                }

                            }, )
                        };

                        function refresh() {
                            setTimeout(function() {
                                window.location.reload();
                            }, 300);
                        }
                        // function orderDetail(id) {
                        //     $.get("orderDetail.php", {
                        //         id: id,
                        //     }, function(data, status) {});

                        // };
                    </script>

                </tbody>
            </table>
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